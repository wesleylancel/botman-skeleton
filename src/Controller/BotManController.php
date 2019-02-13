<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ColorProvider;
use App\Service\MessageHandler\ColorMessageHandler;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Web\WebDriver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BotManController extends AbstractController
{
    /**
     * @var ColorMessageHandler
     */
    private $colorMessageHandler;

    public function __construct(ColorMessageHandler $colorMessageHandler)
    {
        $this->colorMessageHandler = $colorMessageHandler;
    }

    /**
     * @Route("/botman")
     */
    public function index(): Response
    {
        DriverManager::loadDriver(WebDriver::class);

        $botMan = BotManFactory::create([]);

        $botMan->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello yourself.');
        });

        $botMan->hears('What\'s your favourite color\?', [$this->colorMessageHandler, 'handleMessage']);

        $botMan->fallback(function (BotMan $bot) {
            $bot->reply('Sorry, I don\'t understand!');
        });

        $botMan->listen();

        return new Response();
    }
}
