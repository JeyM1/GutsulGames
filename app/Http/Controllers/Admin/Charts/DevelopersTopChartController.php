<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Game;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

/**
 * Class DevelopersTopChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DevelopersTopChartController extends ChartController
{
    public function setup()
    {
        

        $this->chart = new Chart();

        $topdevs = Game::groupBy('developer')
                            ->select('developer', DB::raw('count(*) as total'))
                            ->orderBy('total', 'DESC')
                            ->take(10)
                            ->get();
        $devnames = [];
        $devgamescount = [];
        $colors = [
            'rgb(239, 83, 80)',
            'rgb(136, 14, 79)',
            'rgb(156, 39, 176)',
            'rgb(149, 117, 205)',
            'rgb(63, 81, 181)',
            'rgb(33, 150, 243)',
            'rgb(67, 160, 71)',
            'rgb(255, 179, 0)',
            'rgb(239, 108, 0)',
            'rgb(239, 83, 80)',
        ];
        $backgroundColors = [
            'rgba(239, 83, 80, 0.4)',
            'rgba(136, 14, 79, 0.4)',
            'rgba(156, 39, 176, 0.4)',
            'rgba(149, 117, 205, 0.4)',
            'rgba(63, 81, 181, 0.4)',
            'rgba(33, 150, 243, 0.4)',
            'rgba(67, 160, 71, 0.4)',
            'rgba(255, 179, 0, 0.4)',
            'rgba(239, 108, 0, 0.4)',
            'rgba(239, 83, 80, 0.4)',
        ];
        foreach ($topdevs as $item) {
            $devnames[] = $item->developer;
            $devgamescount[] = $item->total;
        }
        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels($devnames);
        
        $this->chart->dataset('Кількість ігор', 'bar', $devgamescount)
                                        ->color($colors)
                                        ->backgroundColor($backgroundColors);
        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        //$this->chart->load(backpack_url('charts/developers-top'));

        // OPTIONAL
        $this->chart->minimalist(false);
        $this->chart->displayLegend(false);

    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    // public function data()
    // {
    //     $users_created_today = \App\User::whereDate('created_at', today())->count();

    //     $this->chart->dataset('Users Created', 'bar', [
    //                 $users_created_today,
    //             ])
    //         ->color('rgba(205, 32, 31, 1)')
    //         ->backgroundColor('rgba(205, 32, 31, 0.4)');
    // }
}