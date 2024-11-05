<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    { 
        $language = session('language', 'en');
        
        switch ($language) {
            case 'zh':
                $language_name = 'Chinese';
                $dashboard_text = [
                    'student_profile' => '学生档案',
                    'view_edit_profile' => '查看或编辑学生档案',
                    'change_password' => '更改密码',
                    'courses' => '课程',
                    'billing_center' => '账单中心',
                    'access_course_details' => '访问您的课程相关详细信息',
                    'view_edit_password' => '查看或编辑密码详情',
                    'billing_info' => '查看账单相关信息',
                ];
                break;
            case 'ja':
                $language_name = 'Japanese';
                $dashboard_text = [
                    'student_profile' => '学生プロフィール',
                    'view_edit_profile' => '学生プロフィールの詳細を表示または編集',
                    'change_password' => 'パスワードを変更する',
                    'courses' => 'コース',
                    'billing_center' => '請求センター',
                    'access_course_details' => 'コースの詳細にアクセスする',
                    'view_edit_password' => 'パスワードの詳細を表示または編集',
                    'billing_info' => '請求に関する情報を確認',
                ];
                break;
            case 'en':
            default:
                $language_name = 'English';
                $dashboard_text = [
                    'student_profile' => 'Student Profile',
                    'view_edit_profile' => 'View or edit student profile details',
                    'change_password' => 'Change Password',
                    'courses' => 'Courses',
                    'billing_center' => 'Billing Centre',
                    'access_course_details' => 'Access your course related details',
                    'view_edit_password' => 'View or edit password details',
                    'billing_info' => 'Checkout billing related info',
                ];
                break;
        }
    
        // Get current date in the format "January 18 2024"
        $current_date = Carbon::now()->format('F d Y');
    
        return view('frontend.student.dashboard', [
            'language' => $language,
            'dashboard_text' => $dashboard_text,
            'current_date' => $current_date
        ]);
    }
}