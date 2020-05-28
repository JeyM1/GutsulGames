<?php

namespace App\Http\Controllers\Admin\Charts;

use App\GameType;
use App\Type;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

/**
 * Class GameTypesPieChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GameTypesPieChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        $res = GameType::groupBy('type_id')
                            ->select('type_id', DB::raw('count(*) as total'))
                            ->orderBy('total', 'DESC')
                            ->take(5)
                            ->get();
        $toptypes = collect([]);
        $allcount = 0;
        foreach ($res as $item) {
            $allcount += $item->total;
            $toptypes->add(Type::find($item->type_id)->name);
        }

        $percents = [];
        foreach ($res as $item) {
            $percents[] = round(($item->total * 100) / $allcount);
        }

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels($toptypes);

        $this->chart->dataset('Ігрові типи', 'pie', $percents)
                    ->backgroundColor([
                        'rgb(70, 127, 208)',
                        'rgb(77, 189, 116)',
                        'rgb(96, 92, 168)',
                        'rgb(255, 193, 7)',
                        'rgb(235, 164, 52)',
                    ]);
        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        // $this->chart->load(backpack_url('charts/game-types-pie'));

        // OPTIONAL
        $this->chart->minimalist(true);
        $this->chart->displayLegend(true);
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