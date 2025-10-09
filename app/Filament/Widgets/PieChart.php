<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PieChart extends ChartWidget
{
    protected ?string $heading = 'Pie Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                        ],
                    'hoverOffset' => 4,
                ],
            ],
            'labels' => [   
                'Red',
                'Blue',
                'Yellow'
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
