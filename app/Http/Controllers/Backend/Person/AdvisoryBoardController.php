<?php

namespace App\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdvisoryBoardController extends Controller
{
    private function processAdvisoryBoards($advisory_boards)
    {
        foreach($advisory_boards as $advisory_board) {
            $advisory_board->action = '
            <a href="'. route('backend.persons.advisory-boards.edit', $advisory_board->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$advisory_board->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $advisory_board->image = $advisory_board->image != null ? '<img src="'. asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) .'" class="table-image">' : '<img src="'. asset('storage/backend/common/' . Setting::find(1)->no_image) .'" class="table-image">';

            $advisory_board->status = ($advisory_board->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $advisory_boards;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $advisory_boards = AdvisoryBoard::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $advisory_boards = $this->processAdvisoryBoards($advisory_boards);

        return view('backend.persons.advisory-boards.index', [
            'advisory_boards' => $advisory_boards,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.persons.advisory-boards.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'new_image' => 'required|max:5120'
        ], [
            'description.required' => 'The description field is required',
            'new_image.max' => 'The image must not be greater than 5 MB',
            'new_image.required' => 'The image field is required',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image') != null) {
            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/advisory-boards', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $advisory_board = new AdvisoryBoard();
        $data = $request->except('old_image', 'new_image');
        $data['image'] = $image_name;
        $advisory_board->create($data);

        return redirect()->route('backend.persons.advisory-boards.index')->with('success', 'Successfully created!');
    }

    public function edit(AdvisoryBoard $advisory_board)
    {
        return view('backend.persons.advisory-boards.edit', [
            'advisory_board' => $advisory_board
        ]);
    }

    public function update(Request $request, AdvisoryBoard $advisory_board)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'new_image' => 'nullable|max:5120'
        ], [
            'description.required' => 'The description field is required',
            'new_image.max' => 'The image must not be greater than 5 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image') != null) {
            if($request->old_image) {
                Storage::delete('public/backend/persons/advisory-boards/' . $request->old_image);
            }

            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/advisory-boards', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $data = $request->except('old_image', 'new_image');
        $data['image'] = $image_name;
        $advisory_board->fill($data)->save();
        
        return redirect()->route('backend.persons.advisory-boards.index')->with('success', "Successfully updated!");
    }

    public function destroy(AdvisoryBoard $advisory_board)
    {
        $advisory_board->status = '0';
        $advisory_board->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.persons.advisory-boards.index');
        }

        $name = $request->name;
        $language = $request->language;

        $advisory_boards = AdvisoryBoard::where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $advisory_boards->where('name', 'like', '%' . $name . '%');
        }

        if($language != 'All') {
            $advisory_boards->where('language', $language);
        }

        $items = $request->items ?? 10;
        $advisory_boards = $advisory_boards->paginate($items);
        $advisory_boards = $this->processAdvisoryBoards($advisory_boards);

        return view('backend.persons.advisory-boards.index', [
            'advisory_boards' => $advisory_boards,
            'items' => $items,
            'name' => $name,
            'language' => $language
        ]);
    }
}