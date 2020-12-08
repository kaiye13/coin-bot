<?php

declare(strict_types=1);

namespace App\Controller;

use BotMan\BotMan\BotMan;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BotManController
{
    private Botman $botMan;

    public function __construct(BotMan $botMan)
    {
        $this->botMan = $botMan;
    }

    /**
     * @Route(path="/botman", name="app_botman")
     */
    public function __invoke(): Response
    {
        $this->botMan->hears('Hello', function ($bot) {
            $bot->reply('Hello there');
        });

        $this->botMan->hears('What should we do?', function ($bot) {
            $bot->reply('Give Corona partiese');
        });

        $this->botMan->hears('nope', function ($bot) {
            $bot->reply('ooohhnnn why not? :(');
        });

        $this->botMan->hears('because we are decent people', function ($bot) {
            $bot->reply('maybe you are');
        });

        $this->botMan->hears('my name is {name}', function ($bot, $name) {
            $bot->reply(sprintf('Hello %s', ucwords($name)));
        });

        $this->botMan->fallback(function (BotMan $bot) {
            $bot->reply('Wow don\'t say something crazy like that');
        });

        $this->botMan->listen();

        return new Response();
    }
}
