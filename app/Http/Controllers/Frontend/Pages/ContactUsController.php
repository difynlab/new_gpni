<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        $language = session('language', 'en');

        switch ($language) {
            case 'en':
                $title = 'Connect with us';
                $description = 'Whether you have a question about our courses, need technical support, or just want to say hello, we\'d love to hear from you.';
                $form_labels = [
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'email' => 'Email',
                    'phone' => 'Phone Number',
                    'reason' => 'Reason',
                    'comments' => 'Comments',
                    'submit' => 'Submit',
                ];
                $contact_info = [
                    'email' => 'info@thegpni.com',
                    'phone' => '+1 567 666 1234',
                    'fax' => '+1 567 666 1234',
                ];
                break;
            case 'zh':
                $title = '联系我们';
                $description = '无论您有关于课程的问题、需要技术支持，还是只是想打个招呼，我们很乐意听到您的声音。';
                $form_labels = [
                    'first_name' => '名',
                    'last_name' => '姓',
                    'email' => '电子邮件',
                    'phone' => '电话号码',
                    'reason' => '原因',
                    'comments' => '评论',
                    'submit' => '提交',
                ];
                $contact_info = [
                    'email' => 'info@thegpni.com',
                    'phone' => '+1 567 666 1234',
                    'fax' => '+1 567 666 1234',
                ];
                break;
            case 'ja':
                $title = 'お問い合わせ';
                $description = 'コースに関する質問がある場合、技術サポートが必要な場合、または単に挨拶したい場合は、お気軽にご連絡ください。';
                $form_labels = [
                    'first_name' => '名',
                    'last_name' => '姓',
                    'email' => 'メールアドレス',
                    'phone' => '電話番号',
                    'reason' => '理由',
                    'comments' => 'コメント',
                    'submit' => '送信',
                ];
                $contact_info = [
                    'email' => 'info@thegpni.com',
                    'phone' => '+1 567 666 1234',
                    'fax' => '+1 567 666 1234',
                ];
                break;
            default:
                $title = 'Connect with us';
                $description = 'Whether you have a question about our courses, need technical support, or just want to say hello, we\'d love to hear from you.';
                $form_labels = [
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'email' => 'Email',
                    'phone' => 'Phone Number',
                    'reason' => 'Reason',
                    'comments' => 'Comments',
                    'submit' => 'Submit',
                ];
                $contact_info = [
                    'email' => 'info@thegpni.com',
                    'phone' => '+1 567 666 1234',
                    'fax' => '+1 567 666 1234',
                ];
                break;
        }

        return view('frontend.pages.contact-us', [
            'language' => $language,
            'title' => $title,
            'description' => $description,
            'form_labels' => $form_labels,
            'contact_info' => $contact_info,
        ]);
    }
}
