<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\District;
use App\Models\Shareholder;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $shareholders = Shareholder::count();

        $subscribedTotal = Shareholder::sum('shares');
        $paidTotal = Shareholder::sum('sharesPaid');

        // Fetch the number of branches per district using a join
        $branchesPerDistrict = Branch::select('districtCode', DB::raw('count(*) as total_branches'))
            ->groupBy('districtCode')
            ->get();

        $districts = District::count();
        $branches = Branch::count();

        return view('dashboard', compact(
            'shareholders',
            'districts',
            'branches',
            'subscribedTotal',
            'paidTotal',
            'branchesPerDistrict'
        ));
    }
}
