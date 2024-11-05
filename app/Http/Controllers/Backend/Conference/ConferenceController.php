<?php

namespace App\Http\Controllers\Backend\Conference;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    private function processConferences($conferences)
    {
        foreach($conferences as $conference) {
            $conference->action = '
            <a href="'. route('backend.conferences.edit', $conference->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$conference->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $conference->status = ($conference->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $conferences;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $conferences = Conference::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $conferences = $this->processConferences($conferences);

        return view('backend.conferences.index', [
            'conferences' => $conferences,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.conferences.create');
    }
    
    public function store(Request $request)
    {
        if($request->more_detail_titles != null) {
            $more_details = [];
            foreach($request->more_detail_titles as $key => $title) {
                array_push($more_details, [
                    'title' => $title,
                    'value' => $request->more_detail_values[$key]
                ]);
            }

            $more_details = json_encode($more_details);
        }
        else {
            $more_details = null;
        }

        if($request->price_detail_member_types != null) {
            $price_details = [];
            foreach($request->price_detail_member_types as $key => $member_type) {
                array_push($price_details, [
                    'member_type' => $member_type,
                    'early_registration_price' => $request->price_detail_early_registration_prices[$key],
                    'regular_registration_price' => $request->price_detail_regular_registration_prices[$key]
                ]);
            }

            $price_details = json_encode($price_details);
        }
        else {
            $price_details = null;
        }

        $conference = new Conference();
        $data = $request->except('more_detail_titles', 'more_detail_values', 'price_detail_member_types', 'price_detail_early_registration_prices', 'price_detail_regular_registration_prices');
        $data['more_details'] = $more_details;
        $data['price_details'] = $price_details;
        $conference->create($data);

        return redirect()->route('backend.conferences.index')->with('success', 'Successfully created!');
    }

    public function edit(Conference $conference)
    {
        return view('backend.conferences.edit', [
            'conference' => $conference
        ]);
    }

    public function update(Request $request, Conference $conference)
    {
        if($request->more_detail_titles != null) {
            $more_details = [];
            foreach($request->more_detail_titles as $key => $title) {
                array_push($more_details, [
                    'title' => $title,
                    'value' => $request->more_detail_values[$key]
                ]);
            }

            $more_details = json_encode($more_details);
        }
        else {
            $more_details = null;
        }

        if($request->price_detail_member_types != null) {
            $price_details = [];
            foreach($request->price_detail_member_types as $key => $member_type) {
                array_push($price_details, [
                    'member_type' => $member_type,
                    'early_registration_price' => $request->price_detail_early_registration_prices[$key],
                    'regular_registration_price' => $request->price_detail_regular_registration_prices[$key]
                ]);
            }

            $price_details = json_encode($price_details);
        }
        else {
            $price_details = null;
        }

        $data = $request->except('more_detail_titles', 'more_detail_values', 'price_detail_member_types', 'price_detail_early_registration_prices', 'price_detail_regular_registration_prices');
        $data['more_details'] = $more_details;
        $data['price_details'] = $price_details;
        $conference->fill($data)->save();
        
        return redirect()->route('backend.conferences.index')->with('success', "Successfully updated!");
    }

    public function destroy(Conference $conference)
    {
        $conference->status = '0';
        $conference->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.conferences.index');
        }

        $title = $request->title;
        $language = $request->language;

        $conferences = Conference::where('status', '!=', '0')->orderBy('id', 'desc');

        if($title != null) {
            $conferences->where('title', 'like', '%' . $title . '%');
        }

        if($language != 'All') {
            $conferences->where('language', $language);
        }

        $items = $request->items ?? 10;
        $conferences = $conferences->paginate($items);
        $conferences = $this->processConferences($conferences);

        return view('backend.conferences.index', [
            'conferences' => $conferences,
            'items' => $items,
            'title' => $title,
            'language' => $language
        ]);
    }
}