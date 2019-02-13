<?php

declare(strict_types=1);

namespace App\Service\MessageHandler;

use App\Service\Provider\ColorProvider;
use BotMan\BotMan\BotMan;

class ColorMessageHandler
{
    /**
     * @var ColorProvider
     */
    private $colorProvider;

    public function __construct(ColorProvider $colorProvider)
    {
        $this->colorProvider = $colorProvider;
    }

    public function handleMessage(BotMan $bot): void
    {
        $bot->reply(sprintf(
            'My favourite color is %s',
            $this->colorProvider->randomColor()
        ));
    }
}
