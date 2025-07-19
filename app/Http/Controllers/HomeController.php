<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Transaction;
use Morilog\Jalali\Jalalian;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    public function dashboard(): View
    {
        $month = 12;
        $status = 1;
        $successfulTransactions = Transaction::getData($month, $status)->get();
        $chartData = $this->chartData($successfulTransactions, $month);
        return view('dashboard', compact('chartData'));
    }

    public function chartData(Collection $data, int $month): array
    {
        $monthName = $data->map(function ($item) {
            return Jalalian::fromCarbon($item->created_at)->format('%B %Y');
        });

        $amount = $data->map(function ($item) {
            return $item->amount;
        });

        foreach ($amount as $i => $j) {
            if (!isset($result[$monthName[$i]])) {
                $result[$monthName[$i]] = 0;
            };
            $result[$monthName[$i]] += $j;
        };

        if (count($result) != $month) {
            $jalaliMonths[Jalalian::now()->format('%B %Y')] = 0;
            for ($i = 1; $i < $month; $i++) {
                $monthName = Jalalian::now()->subMonths($i)->format('%B %Y');
                $jalaliMonths[$monthName] = 0;
            };
            $result = array_merge($jalaliMonths, $result);
        };

        $finalResult = [];
        foreach ($result as $month => $val) {
            array_push($finalResult, ['month' => $month, 'value' => $val]);
        };
        return $finalResult;
    }
}
