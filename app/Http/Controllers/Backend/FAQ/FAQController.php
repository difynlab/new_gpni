<?php

namespace App\Http\Controllers\Backend\FAQ;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FAQController extends Controller
{
    private function processFAQs($faqs)
    {
        foreach($faqs as $faq) {
            $faq->action = '
            <a href="'. route('backend.faqs.edit', $faq->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$faq->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $faq->status = ($faq->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $faqs;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $faqs = FAQ::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $faqs = $this->processFAQs($faqs);

        return view('backend.faqs.index', [
            'faqs' => $faqs,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.faqs.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'answer' => 'required',
        ], [
            'answer.required' => 'The answer field is required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        $faq = new FAQ();
        $data = $request->all();
        $faq->create($data);

        return redirect()->route('backend.faqs.index')->with('success', 'Successfully created!');
    }

    public function edit(FAQ $faq)
    {
        return view('backend.faqs.edit', [
            'faq' => $faq
        ]);
    }

    public function update(Request $request, FAQ $faq)
    {
        $validator = Validator::make($request->all(), [
            'answer' => 'required',
        ], [
            'answer.required' => 'The answer field is required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $data = $request->all();
        $faq->fill($data)->save();
        
        return redirect()->route('backend.faqs.index')->with('success', "Successfully updated!");
    }

    public function destroy(FAQ $faq)
    {
        $faq->status = '0';
        $faq->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.faqs.index');
        }

        $question = $request->question;
        $language = $request->language;

        $faqs = FAQ::where('status', '!=', '0')->orderBy('id', 'desc');

        if($question != null) {
            $faqs->where('question', 'like', '%' . $question . '%');
        }

        if($language != 'All') {
            $faqs->where('language', $language);
        }

        $items = $request->items ?? 10;
        $faqs = $faqs->paginate($items);
        $faqs = $this->processFAQs($faqs);

        return view('backend.faqs.index', [
            'faqs' => $faqs,
            'items' => $items,
            'question' => $question,
            'language' => $language
        ]);
    }
}