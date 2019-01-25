<?php

namespace App\Controller;

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
     * @Route("/botman")
     */
    public function index(): Response
    {
        DriverManager::loadDriver(WebDriver::class);

        $botMan = BotManFactory::create([]);

        $botMan->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello yourself.');
        });

        $botMan->fallback(function (BotMan $bot) {
            $bot->reply('Sorry, I don\'t understand!');
        });

        $botMan->listen();

        return new Response();
    }
}
