<?php

namespace App\Services;

use App\Enums\StatusOrderEnum;
use App\Models\SaleOrder;
use Illuminate\Support\Facades\DB;

class ChartsDashboardService
{
    public function getTotalAmountOrCountForEachMonthInYear($year,$type){

        $totalAmountByMonth = SaleOrder::where('status', StatusOrderEnum::COMPLETED->value)
        ->select(
            DB::raw("DATE_FORMAT(created_at, '%M') as month"),
            DB::raw($type == 'count' ? 'COUNT(id) as total_count' : 'SUM(app_commission_amount) as total_amount')
        )
        ->whereYear('created_at', $year)
        ->groupBy('month') 
        ->get();
        return $totalAmountByMonth;

    }

    public function getOrdersThroughMonthGroubByWeeks($q, $year, $month) {
        return $q
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->selectRaw('DAY(created_at) as day, COUNT(*) as count')
            ->groupBy('day') 
            ->get()
            ->map(function ($item) {
                $day = (int) $item->day;
                $weekNumber = ceil($day / 7);
                $item->week = $this->getNameOfWeekInMounth($weekNumber); 
                return $item;
            })->groupBy('week')
            ->map(function ($item) {
                return [
                    'week' => $item[0]->week,
                    'number' => $item->sum('count'),
                ];
            })->values();

 
    }
    public function getAppCommissionAmountThroughMonthGroubByWeeks($q, $year, $month) {
        return $q->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->selectRaw('DAY(created_at) as day, SUM(app_commission_amount) as amount')
            ->groupBy('day') 
            ->get()
            ->map(function ($item) {
                $day = (int) $item->day;
                $weekNumber = ceil($day / 7); 
                $item->week = $this->getNameOfWeekInMounth($weekNumber); 
                return $item;
            })
            ->groupBy('week')
            ->map(function ($item) {
                return [
                    'week' => $item[0]->week,
                    'number' => $item->sum('amount'), 
                ];
            })
            ->values();
    }
    
    public function getNameOfWeekInMounth($week_number) {
        switch(true) {
            case ($week_number <= 1):
                $week_name = 'First Week';
                break;
            case ($week_number <= 2):
                $week_name = 'Second Week';
                break;
            case ($week_number <= 3):
                $week_name = 'Third Week';
                break;
            case ($week_number <= 4):
                $week_name = 'Fourth Week';
                break;
            case ($week_number <= 5):
                $week_name = 'Fifth Week';
                break;
            default:
                $week_name = 'Unknown Week'; 
                break;
        }
        return $week_name;
    }}
