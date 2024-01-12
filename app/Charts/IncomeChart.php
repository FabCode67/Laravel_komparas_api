<?php
namespace App\Charts;
use ArielMejiaDev\LarapexCharts\LarapexChart;
class IncomeChart
{
    protected $chart;
    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('My Monthly Income')
            ->setSubtitle('July Income')
            ->addData([400, 500,700, 300])
            ->setLabels(['income1', 'income2', 'income3']);
    }
}