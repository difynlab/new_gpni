<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\ContactUsContent;
use App\Models\Setting;
use App\Models\Connection;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contents = ContactUsContent::find(1);
        $settings = Setting::find(1);

        return view('frontend.pages.contact-us', [
            'contents' => $contents,
            'settings' => $settings
        ]);
    }

    public function store(Request $request)
    {
        $connection = new Connection();
        $data = $request->except('middleware_language', 'middleware_language_name');
        $data['status'] = '1';
        $connection->create($data);

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
