<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;

class StudentProfileController extends Controller
{
    public function index()
    {
        $language = session('language', 'en');
        
        switch ($language) {
            case 'zh':
                $language_text = [
                    'profile_header' => '学生档案',
                    'edit_profile' => '编辑档案详情',
                    'personal_details' => '个人资料',
                    'first_name' => '名字',
                    'last_name' => '姓氏',
                    'email_address' => '电子邮件地址',
                    'primary_language' => '主要语言',
                    'newsletter' => '订阅会员通讯',
                    'primary_practice' => '主要业务',
                    'business_name' => '公司名称',
                    'business_address' => '公司地址'
                ];
                break;
            case 'ja':
                $language_text = [
                    'profile_header' => '学生プロフィール',
                    'edit_profile' => 'プロフィールの編集',
                    'personal_details' => '個人情報',
                    'first_name' => '名前',
                    'last_name' => '苗字',
                    'email_address' => 'メールアドレス',
                    'primary_language' => '主な言語',
                    'newsletter' => 'メンバーのニュースレターを購読',
                    'primary_practice' => '主な業務',
                    'business_name' => '会社名',
                    'business_address' => '会社の住所'
                ];
                break;
            case 'en':
            default:
                $language_text = [
                    'profile_header' => 'Student Profile',
                    'edit_profile' => 'Edit profile details',
                    'personal_details' => 'Personal Details',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'email_address' => 'Email Address',
                    'primary_language' => 'Primary Language',
                    'newsletter' => 'Subscribed to Member newsletter',
                    'primary_practice' => 'Primary Practice',
                    'business_name' => 'Business Name',
                    'business_address' => 'Business Address'
                ];
                break;
        }
    
        return view('frontend.student.student-profile', [
            'language' => $language,
            'language_text' => $language_text
        ]);
    }
}