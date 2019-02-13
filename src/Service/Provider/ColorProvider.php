<?php

declare(strict_types=1);

namespace App\Service\Provider;

class ColorProvider
{
    private const COLORS = [
        'red',
        'green',
        'blue',
    ];

    public function randomColor(): string
    {
        return self::COLORS[array_rand(self::COLORS)];
    }
}
