<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;

class BlogPostsChart extends LineChartWidget
{
    protected static ?int $sort = 4;
    protected static ?string $heading = 'Blog Creation';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Total Website Views',
                    'data' => [0, 10, 5, 29, 2, 32, 45, 5, 65, 4, 77, 43],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
