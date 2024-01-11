<?php

namespace App\Filament\Resources\PostResource\Widgets;

use Filament\Widgets\BubbleChartWidget;

class BlogPostsChart extends BubbleChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }
}
