<?php

namespace App\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use App\Models\GlobalEducationPartner;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GlobalEducationPartnerController extends Controller
{
    private function processGlobalEducationPartners($global_education_partners)
    {
        foreach($global_education_partners as $global_education_partner) {
            $global_education_partner->action = '
            <a href="'. route('backend.persons.global-education-partners.edit', $global_education_partner->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$global_education_partner->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $global_education_partner->image = $global_education_partner->image != null ? '<img src="'. asset('storage/backend/persons/global-education-partners/' . $global_education_partner->image) .'" class="table-image">' : '<img src="'. asset('storage/backend/common/' . Setting::find(1)->no_image) .'" class="table-image">';

            $global_education_partner->status = ($global_education_partner->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $global_education_partners;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $global_education_partners = GlobalEducationPartner::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $global_education_partners = $this->processGlobalEducationPartners($global_education_partners);

        return view('backend.persons.global-education-partners.index', [
            'global_education_partners' => $global_education_partners,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.persons.global-education-partners.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'required|max:30720'
        ], [
            'new_image.max' => 'The image must not be greater than 30 MB',
            'new_image.required' => 'The image field is required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image') != null) {
            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/global-education-partners', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $global_education_partner = new GlobalEducationPartner();
        $data = $request->except('old_image', 'new_image');
        $data['image'] = $image_name;
        $global_education_partner->create($data);

        return redirect()->route('backend.persons.global-education-partners.index')->with('success', 'Successfully created!');
    }

    public function edit(GlobalEducationPartner $global_education_partner)
    {
        return view('backend.persons.global-education-partners.edit', [
            'global_education_partner' => $global_education_partner
        ]);
    }

    public function update(Request $request, GlobalEducationPartner $global_education_partner)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'nullable|max:30720'
        ], [
            'new_image.max' => 'The image must not be greater than 30 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image') != null) {
            if($request->old_image) {
                Storage::delete('public/backend/persons/global-education-partners/' . $request->old_image);
            }

            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/global-education-partners', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $data = $request->except('old_image', 'new_image');
        $data['image'] = $image_name;
        $global_education_partner->fill($data)->save();
        
        return redirect()->route('backend.persons.global-education-partners.index')->with('success', "Successfully updated!");
    }

    public function destroy(GlobalEducationPartner $global_education_partner)
    {
        $global_education_partner->status = '0';
        $global_education_partner->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.persons.global-education-partners.index');
        }

        $language = $request->language;

        $global_education_partners = GlobalEducationPartner::where('status', '!=', '0')->orderBy('id', 'desc');

        if($language != 'All') {
            $global_education_partners->where('language', $language);
        }

        $items = $request->items ?? 10;
        $global_education_partners = $global_education_partners->paginate($items);
        $global_education_partners = $this->processGlobalEducationPartners($global_education_partners);

        return view('backend.persons.global-education-partners.index', [
            'global_education_partners' => $global_education_partners,
            'items' => $items,
            'language' => $language
        ]);
    }
}