<?php

namespace App\Http\Controllers\Backend\Administration;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $current_year = Carbon::now()->year;
        $last_year = $current_year - 1;

        $current_year_users = DB::table('users')
            ->select(DB::raw('COUNT(id) as user_count'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', $current_year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get()
            ->pluck('user_count', 'month');

        $last_year_users = DB::table('users')
            ->select(DB::raw('COUNT(id) as user_count'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', $last_year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get()
            ->pluck('user_count', 'month');

        $total_current_year_users = $current_year_users->sum();
        $total_last_year_users = $last_year_users->sum();

        if($total_current_year_users > $total_last_year_users) {
            $users_year_difference = '+' . $total_current_year_users - $total_last_year_users;
        }
        elseif($total_current_year_users == $total_last_year_users) {
            $users_year_difference = 0;
        }
        else {
            $users_year_difference = $total_current_year_users - $total_last_year_users;
        }

        $months = range(1, 12);
        $current_year_data = [];
        $last_year_data = [];

        foreach($months as $month) {
            $current_year_data[] = $current_year_users[$month] ?? 0;
            $last_year_data[] = $last_year_users[$month] ?? 0;
        }

        return view('backend.administrations.dashboard', [
            'months' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'current_year_data' => $current_year_data,
            'last_year_data' => $last_year_data,
            'users_year_difference' => $users_year_difference,
        ]);
    }
}