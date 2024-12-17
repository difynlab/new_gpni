<?php

namespace App\Http\Controllers\Backend\Administration;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\GiftCardPurchase;
use App\Models\MaterialPurchase;
use App\Models\MembershipPurchase;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private function getRevenueData($model, $currency)
    {
        $query = $model->where('currency', $currency)->where('payment_status', 'Completed')->where('status', '1');

        return [
            'total_revenue' => $query->whereYear('created_at', Carbon::now()->year)->sum('amount_paid'),
            'this_month_revenue' => $query->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->sum('amount_paid'),
            'today_revenue' => $query->whereDate('created_at', Carbon::today())->sum('amount_paid')
        ];
    }

    public function index()
    {
        $current_year = Carbon::now()->year;
        $last_year = $current_year - 1;

        // Users chart
            $current_year_users = DB::table('users')
                ->select(DB::raw('COUNT(id) as user_count'), DB::raw('MONTH(created_at) as month'))
                ->whereYear('created_at', $current_year)
                ->where('role', 'student')
                ->where('status', '!=', '0')
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->orderBy(DB::raw('MONTH(created_at)'))
                ->get()
                ->pluck('user_count', 'month');

            $last_year_users = DB::table('users')
                ->select(DB::raw('COUNT(id) as user_count'), DB::raw('MONTH(created_at) as month'))
                ->whereYear('created_at', $last_year)
                ->where('role', 'student')
                ->where('status', '!=', '0')
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->orderBy(DB::raw('MONTH(created_at)'))
                ->get()
                ->pluck('user_count', 'month');

            $total_current_year_users = $current_year_users->sum();
            $total_last_year_users = $last_year_users->sum();
            $users_year_difference = $total_current_year_users - $total_last_year_users;

            if($total_current_year_users > $total_last_year_users) {
                $users_year_difference = '+' . $total_current_year_users - $total_last_year_users;

                if($total_last_year_users > 0) {
                    $users_percentage_increase = (($total_current_year_users - $total_last_year_users) / $total_last_year_users) * 100;
                    $users_percentage_increase = round($users_percentage_increase, 2); 
                    $users_percentage_increase = '+' . $users_percentage_increase . '%';
                }
                else {
                    $users_percentage_increase = 'N/A';
                }
                
            }
            elseif($total_current_year_users == $total_last_year_users) {
                $users_year_difference = 0;
                $users_percentage_increase = 0 . '%';
            }
            else {
                $users_year_difference = $total_current_year_users - $total_last_year_users;
                $users_percentage_increase = 0 . '%';
            }

            $months = range(1, 12);
            $current_year_user_data = [];
            $last_year_user_data = [];

            foreach($months as $month) {
                $current_year_user_data[] = $current_year_users[$month] ?? 0;
                $last_year_user_data[] = $last_year_users[$month] ?? 0;
            }
        // Users chart

        $total_registered_users = User::where('status', '!=', '0')->where('role', 'student')->count();
        $total_products = Product::where('status', '!=', '0')->count();
        $total_courses = Course::where('status', '!=', '0')->count();
        $total_affiliate_products = Product::where('type', 'Affiliate')->where('status', '!=', '0')->count();


        // Course purchases chart
            $current_year_course_purchases = DB::table('course_purchases')
                ->select(DB::raw('COUNT(id) as course_count'), DB::raw('MONTH(date) as month'))
                ->whereYear('date', $current_year)
                ->where('status', '!=', '0')
                ->groupBy(DB::raw('MONTH(date)'))
                ->orderBy(DB::raw('MONTH(date)'))
                ->get()
                ->pluck('course_count', 'month');

            $last_year_course_purchases = DB::table('course_purchases')
                ->select(DB::raw('COUNT(id) as course_count'), DB::raw('MONTH(date) as month'))
                ->whereYear('date', $last_year)
                ->where('status', '!=', '0')
                ->groupBy(DB::raw('MONTH(date)'))
                ->orderBy(DB::raw('MONTH(date)'))
                ->get()
                ->pluck('course_count', 'month');

            $total_current_year_course_purchases = $current_year_course_purchases->sum();
            $total_last_year_course_purchases = $last_year_course_purchases->sum();
            $course_purchases_year_difference = $total_current_year_course_purchases - $total_last_year_course_purchases;

            if($total_current_year_course_purchases > $total_last_year_course_purchases) {
                $course_purchases_year_difference = '+' . $total_current_year_course_purchases - $total_last_year_course_purchases;

                if($total_last_year_course_purchases > 0) {
                    $course_purchases_percentage_increase = (($total_current_year_course_purchases - $total_last_year_course_purchases) / $total_last_year_course_purchases) * 100;
                    $course_purchases_percentage_increase = round($course_purchases_percentage_increase, 2); 
                    $course_purchases_percentage_increase = '+' . $course_purchases_percentage_increase . '%';
                }
                else {
                    $course_purchases_percentage_increase = 'N/A';
                }
                
            }
            elseif($total_current_year_course_purchases == $total_last_year_course_purchases) {
                $course_purchases_year_difference = 0;
                $course_purchases_percentage_increase = 0 . '%';
            }
            else {
                $course_purchases_year_difference = $total_current_year_users - $total_last_year_users;
                $course_purchases_percentage_increase = 0 . '%';
            }

            $months = range(1, 12);
            $current_year_course_data = [];
            $last_year_course_data = [];

            foreach($months as $month) {
                $current_year_course_data[] = $current_year_course_purchases[$month] ?? 0;
                $last_year_course_data[] = $last_year_course_purchases[$month] ?? 0;
            }
        // Course purchases chart


        // User countries chart
            $current_year_user_countries = DB::table('users')
                ->select(DB::raw('COUNT(id) as user_count'), DB::raw('country'))
                ->whereYear('created_at', $current_year)
                ->where('role', 'student')
                ->where('status', '!=', '0')
                ->groupBy(DB::raw('country'))
                ->orderBy(DB::raw('country'))
                ->get()
                ->pluck('user_count', 'country');

            $target_countries = ['Japan', 'India', 'China', 'United Kingdom', 'Malaysia', 'United States', 'Taiwan', 'Canada'];
            $country_users = DB::table('users')
                ->select(DB::raw('country, COUNT(id) as user_count'))
                ->whereYear('created_at', $current_year)
                ->where('role', 'student')
                ->where('status', '!=', '0')
                ->whereIn('country', $target_countries)
                ->groupBy('country')
                ->pluck('user_count', 'country');

            $country_users_percentages = [];

            foreach($country_users as $country => $count) {
                $country_users_percentages[$country] = round(($count / $total_current_year_users) * 100, 2);
            }
        // User countries chart


        // Top courses
            $three_months_ago = Carbon::now()->subMonths(3);
            $high_sell_courses = DB::table('course_purchases')
                ->select('course_id', DB::raw('COUNT(id) as course_count'))
                ->where('date', '>=', $three_months_ago)
                ->where('payment_status', 'Completed')
                ->where('status', '!=', '0')
                ->groupBy('course_id')
                ->orderBy('course_count', 'DESC')
                ->take(5)
                ->get();

            foreach($high_sell_courses as $high_sell_course) {
                $high_sell_course->course_name = Course::find($high_sell_course->course_id)->title;
            }
        // Top courses

        // Top products
            $three_months_ago = Carbon::now()->subMonths(3);
            $last_3_month_orders = DB::table('product_orders')
                ->where('date', '>=', $three_months_ago)
                ->where('payment_status', 'Completed')
                ->where('status', '!=', '0')
                ->pluck('id');

            $high_sell_products = DB::table('product_order_details')
                ->select('product_id', DB::raw('SUM(quantity) as product_count'))
                ->whereIn('product_order_id', $last_3_month_orders)
                ->groupBy('product_id')
                ->orderByDesc('product_count')
                ->take(5)
                ->get();

            foreach($high_sell_products as $high_sell_product) {
                $high_sell_product->product_name = Product::find($high_sell_product->product_id)->name;
            }
        // Top products


        // Revenue
            $usd_gift_card_revenue = $this->getRevenueData(new GiftCardPurchase(), 'usd');
            $usd_material_revenue = $this->getRevenueData(new MaterialPurchase(), 'usd');
            $usd_course_revenue = $this->getRevenueData(new CoursePurchase(), 'usd');
            $usd_membership_revenue = $this->getRevenueData(new MembershipPurchase(), 'usd');
            $usd_product_order_revenue = $this->getRevenueData(new ProductOrder(), 'usd');

            $usd_total_revenue = $usd_gift_card_revenue['total_revenue'] + $usd_material_revenue['total_revenue'] + $usd_course_revenue['total_revenue'] + $usd_membership_revenue['total_revenue'] + $usd_product_order_revenue['total_revenue'];

            $usd_this_month_revenue = $usd_gift_card_revenue['this_month_revenue'] + $usd_material_revenue['this_month_revenue'] + $usd_course_revenue['this_month_revenue'] + $usd_membership_revenue['this_month_revenue'] + $usd_product_order_revenue['this_month_revenue'];

            $usd_today_revenue = $usd_gift_card_revenue['today_revenue'] + $usd_material_revenue['today_revenue'] + $usd_course_revenue['today_revenue'] + $usd_membership_revenue['today_revenue'] + $usd_product_order_revenue['today_revenue'];


            $cny_gift_card_revenue = $this->getRevenueData(new GiftCardPurchase(), 'cny');
            $cny_material_revenue = $this->getRevenueData(new MaterialPurchase(), 'cny');
            $cny_course_revenue = $this->getRevenueData(new CoursePurchase(), 'cny');
            $cny_membership_revenue = $this->getRevenueData(new MembershipPurchase(), 'cny');
            $cny_product_order_revenue = $this->getRevenueData(new ProductOrder(), 'cny');

            $cny_total_revenue = $cny_gift_card_revenue['total_revenue'] + $cny_material_revenue['total_revenue'] + $cny_course_revenue['total_revenue'] + $cny_membership_revenue['total_revenue'] + $cny_product_order_revenue['total_revenue'];

            $cny_this_month_revenue = $cny_gift_card_revenue['this_month_revenue'] + $cny_material_revenue['this_month_revenue'] + $cny_course_revenue['this_month_revenue'] + $cny_membership_revenue['this_month_revenue'] + $cny_product_order_revenue['this_month_revenue'];

            $cny_today_revenue = $cny_gift_card_revenue['today_revenue'] + $cny_material_revenue['today_revenue'] + $cny_course_revenue['today_revenue'] + $cny_membership_revenue['today_revenue'] + $cny_product_order_revenue['today_revenue'];

            $jpy_gift_card_revenue = $this->getRevenueData(new GiftCardPurchase(), 'jpy');
            $jpy_material_revenue = $this->getRevenueData(new MaterialPurchase(), 'jpy');
            $jpy_course_revenue = $this->getRevenueData(new CoursePurchase(), 'jpy');
            $jpy_membership_revenue = $this->getRevenueData(new MembershipPurchase(), 'jpy');
            $jpy_product_order_revenue = $this->getRevenueData(new ProductOrder(), 'jpy');

            $jpy_total_revenue = $jpy_gift_card_revenue['total_revenue'] + $jpy_material_revenue['total_revenue'] + $jpy_course_revenue['total_revenue'] + $jpy_membership_revenue['total_revenue'] + $jpy_product_order_revenue['total_revenue'];

            $jpy_this_month_revenue = $jpy_gift_card_revenue['this_month_revenue'] + $jpy_material_revenue['this_month_revenue'] + $jpy_course_revenue['this_month_revenue'] + $jpy_membership_revenue['this_month_revenue'] + $jpy_product_order_revenue['this_month_revenue'];

            $jpy_today_revenue = $jpy_gift_card_revenue['today_revenue'] + $jpy_material_revenue['today_revenue'] + $jpy_course_revenue['today_revenue'] + $jpy_membership_revenue['today_revenue'] + $jpy_product_order_revenue['today_revenue'];
        // Revenue

        return view('backend.administrations.dashboard', [
            'months' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'current_year_user_data' => $current_year_user_data,
            'last_year_user_data' => $last_year_user_data,
            'users_year_difference' => $users_year_difference,
            'current_year' => $current_year,

            'total_registered_users' => $total_registered_users,
            'users_percentage_increase' => $users_percentage_increase,
            'total_products' => $total_products,
            'total_courses' => $total_courses,
            'total_affiliate_products' => $total_affiliate_products,

            'current_year_course_data' => $current_year_course_data,
            'last_year_course_data' => $last_year_course_data,
            'course_purchases_year_difference' => $course_purchases_year_difference,

            'current_year_user_countries' => $current_year_user_countries,
            'country_users_percentages' => $country_users_percentages,

            'high_sell_courses' => $high_sell_courses,
            'high_sell_products' => $high_sell_products,

            'usd_total_revenue' => $usd_total_revenue,
            'usd_this_month_revenue' => $usd_this_month_revenue,
            'usd_today_revenue' => $usd_today_revenue,
            'cny_total_revenue' => $cny_total_revenue,
            'cny_this_month_revenue' => $cny_this_month_revenue,
            'cny_today_revenue' => $cny_today_revenue,
            'jpy_total_revenue' => $jpy_total_revenue,
            'jpy_this_month_revenue' => $jpy_this_month_revenue,
            'jpy_today_revenue' => $jpy_today_revenue
        ]);
    }
}