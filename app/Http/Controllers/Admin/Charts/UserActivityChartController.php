<?php

namespace App\Http\Controllers\Admin\Charts;

use App\GameUser;
use App\User;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class UserActivityChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserActivityChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $labels = [];
        for ($days_backwards = 14; $days_backwards >= 0; $days_backwards--) {
            if ($days_backwards == 1) {
                $labels[] = $days_backwards.' день назад';
            } else if ($days_backwards == 0) {
                $labels[] = 'cьогодні';
            } else {
                $labels[] = $days_backwards.' днів тому';
            }
        }
        $this->chart->labels($labels);

        $this->chart->load(backpack_url('charts/user-activity'));

        $this->chart->minimalist(false);
        $this->chart->displayLegend(false);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    public function data()
    {
        for ($days_backwards = 14; $days_backwards >= 0; $days_backwards--) {
            // Could also be an array_push if using an array rather than a collection.
            $users[] = User::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();
            $purchase_count[] = GameUser::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();
            /*$categories[] = Category::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();
            $tags[] = Tag::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();*/
        }

        $this->chart->dataset('Користувачі', 'line', $users)
            ->color('rgb(77, 189, 116)')
            ->backgroundColor('rgba(77, 189, 116, 0.4)');

        $this->chart->dataset('Продано ігор', 'line', $purchase_count)
            ->color('rgb(96, 92, 168)')
            ->backgroundColor('rgba(96, 92, 168, 0.4)');

        /*$this->chart->dataset('Categories', 'line', $categories)
            ->color('rgb(255, 193, 7)')
            ->backgroundColor('rgba(255, 193, 7, 0.4)');

        $this->chart->dataset('Tags', 'line', $tags)
            ->color('rgba(70, 127, 208, 1)')
            ->backgroundColor('rgba(70, 127, 208, 0.4)');*/
    }
}