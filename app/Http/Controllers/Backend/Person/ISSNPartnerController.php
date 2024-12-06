<?php

namespace App\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use App\Models\ISSNPartner;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ISSNPartnerController extends Controller
{
    private function processISSNPartners($issn_partners)
    {
        foreach($issn_partners as $issn_partner) {
            $issn_partner->action = '
            <a href="'. route('backend.persons.issn-partners.edit', $issn_partner->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$issn_partner->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $issn_partner->image = $issn_partner->image != null ? '<img src="'. asset('storage/backend/persons/issn-partners/' . $issn_partner->image) .'" class="table-image">' : '<img src="'. asset('storage/backend/common/' . Setting::find(1)->no_image) .'" class="table-image">';

            $issn_partner->status = ($issn_partner->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $issn_partners;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $issn_partners = ISSNPartner::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $issn_partners = $this->processISSNPartners($issn_partners);

        return view('backend.persons.issn-partners.index', [
            'issn_partners' => $issn_partners,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.persons.issn-partners.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'required|max:5120'
        ], [
            'new_image.max' => 'The image must not be greater than 5 MB',
            'new_image.required' => 'The image field is required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image') != null) {
            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/issn-partners', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $issn_partner = new ISSNPartner();
        $data = $request->except('old_image', 'new_image');
        $data['image'] = $image_name;
        $issn_partner->create($data);

        return redirect()->route('backend.persons.issn-partners.index')->with('success', 'Successfully created!');
    }

    public function edit(ISSNPartner $issn_partner)
    {
        return view('backend.persons.issn-partners.edit', [
            'issn_partner' => $issn_partner
        ]);
    }

    public function update(Request $request, ISSNPartner $issn_partner)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'nullable|max:5120'
        ], [
            'new_image.max' => 'The image must not be greater than 5 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image') != null) {
            if($request->old_image) {
                Storage::delete('public/backend/persons/issn-partners/' . $request->old_image);
            }

            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/issn-partners', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $data = $request->except('old_image', 'new_image');
        $data['image'] = $image_name;
        $issn_partner->fill($data)->save();
        
        return redirect()->route('backend.persons.issn-partners.index')->with('success', "Successfully updated!");
    }

    public function destroy(ISSNPartner $issn_partner)
    {
        $issn_partner->status = '0';
        $issn_partner->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.persons.issn-partners.index');
        }

        $language = $request->language;

        $issn_partners = ISSNPartner::where('status', '!=', '0')->orderBy('id', 'desc');

        if($language != 'All') {
            $issn_partners->where('language', $language);
        }

        $items = $request->items ?? 10;
        $issn_partners = $issn_partners->paginate($items);
        $issn_partners = $this->processISSNPartners($issn_partners);

        return view('backend.persons.issn-partners.index', [
            'issn_partners' => $issn_partners,
            'items' => $items,
            'language' => $language
        ]);
    }
}