<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\ExpensesChart;
use App\Charts\IncomeChart;

class DashboardController extends Controller
{
    public function index(Request $request, ExpensesChart $expensesChart, IncomeChart $incomeChart)
    {
        $data = [
            'title' => 'Dashboard',
            'expensesChart' => $expensesChart->build(),
            'incomeChart' => $incomeChart->build(),
        ];
        if ($request->routeIs('about')) {
            return view('about', $data);
        } elseif ($request->routeIs('dashboard')) {
            return view(
                'home',
                $data,
            );
        } elseif ($request->routeIs('dashboardProduct')) {
            return view('dashboardProduct', $data);
        }

        return view('home', $data);
    }
}
