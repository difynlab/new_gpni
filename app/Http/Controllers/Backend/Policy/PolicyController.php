<?php

namespace App\Http\Controllers\Backend\Policy;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\PolicyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PolicyController extends Controller
{
    private function processPolicies($policies)
    {
        foreach($policies as $policy) {
            $policy->action = '
            <a href="'. route('backend.policies.edit', $policy->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$policy->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $policy->policy_category = PolicyCategory::find($policy->policy_category_id)->name;

            $policy->status = ($policy->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $policies;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $policies = Policy::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $policies = $this->processPolicies($policies);

        return view('backend.policies.index', [
            'policies' => $policies,
            'items' => $items
        ]);
    }

    public function create()
    {
        $policy_categories = PolicyCategory::where('status', '1')->get();

        return view('backend.policies.create', [
            'policy_categories' => $policy_categories
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ], [
            'content.required' => 'This field is required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        $policy = new Policy();
        $data = $request->all();
        $policy->create($data);

        return redirect()->route('backend.policies.index')->with('success', 'Successfully created!');
    }

    public function edit(Policy $policy)
    {
        $policy_categories = PolicyCategory::where('status', '1')->get();

        return view('backend.policies.edit', [
            'policy' => $policy,
            'policy_categories' => $policy_categories
        ]);
    }

    public function update(Request $request, Policy $policy)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ], [
            'content.required' => 'This field is required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $data = $request->all();
        $policy->fill($data)->save();
        
        return redirect()->route('backend.policies.index')->with('success', "Successfully updated!");
    }

    public function destroy(Policy $policy)
    {
        $policy->status = '0';
        $policy->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.policies.index');
        }

        $title = $request->title;
        $language = $request->language;

        $policies = Policy::where('status', '!=', '0')->orderBy('id', 'desc');

        if($title != null) {
            $policies->where('title', 'like', '%' . $title . '%');
        }

        if($language != 'All') {
            $policies->where('language', $language);
        }

        $items = $request->items ?? 10;
        $policies = $policies->paginate($items);
        $policies = $this->processPolicies($policies);

        return view('backend.policies.index', [
            'policies' => $policies,
            'items' => $items,
            'title' => $title,
            'language' => $language
        ]);
    }
}