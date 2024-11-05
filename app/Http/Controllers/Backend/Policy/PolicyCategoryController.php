<?php

namespace App\Http\Controllers\Backend\Policy;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\PolicyCategory;
use Illuminate\Http\Request;

class PolicyCategoryController extends Controller
{
    private function processPolicyCategories($policy_categories)
    {
        foreach($policy_categories as $policy_category) {
            $policy_category->action = '
            <a href="'. route('backend.policy-categories.edit', $policy_category->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$policy_category->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $policy_category->status = ($policy_category->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $policy_categories;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $policy_categories = PolicyCategory::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $policy_categories = $this->processPolicyCategories($policy_categories);

        return view('backend.policy-categories.index', [
            'policy_categories' => $policy_categories,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.policy-categories.create');
    }
                                                                              
    public function store(Request $request)
    {
        $policy_category = new PolicyCategory();
        $data = $request->all();
        $policy_category->create($data);

        return redirect()->route('backend.policy-categories.index')->with('success', 'Successfully created!');
    }

    public function edit(PolicyCategory $policy_category)
    {
        return view('backend.policy-categories.edit', [
            'policy_category' => $policy_category
        ]);
    }

    public function update(Request $request, PolicyCategory $policy_category)
    {
        $data = $request->all();
        $policy_category->fill($data)->save();
        
        return redirect()->route('backend.policy-categories.index')->with('success', "Successfully updated!");
    }

    public function destroy(PolicyCategory $policy_category)
    {
        $policies = Policy::where('policy_category_id', $policy_category->id)->where('status', '!=', '0')->get();

        if($policies) {
            foreach($policies as $policy) {
                $policy->status = '0';
                $policy->save();
            }
        }

        $policy_category->status = '0';
        $policy_category->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.policy-categories.index');
        }

        $name = $request->name;
        $language = $request->language;

        $policy_categories = PolicyCategory::where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $policy_categories->where('name', 'like', '%' . $name . '%');
        }

        if($language != 'All') {
            $policy_categories->where('language', $language);
        }

        $items = $request->items ?? 10;
        $policy_categories = $policy_categories->paginate($items);
        $policy_categories = $this->processPolicyCategories($policy_categories);

        return view('backend.policy-categories.index', [
            'policy_categories' => $policy_categories,
            'items' => $items,
            'name' => $name,
            'language' => $language
        ]);
    }
}