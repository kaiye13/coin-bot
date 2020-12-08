<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\PriceService;
use BotMan\BotMan\BotMan;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BotManController
{
    private Botman $botMan;
    private PriceService $priceService;

    public function __construct(BotMan $botMan, PriceService $priceService)
    {
        $this->botMan = $botMan;
        $this->priceService = $priceService;
    }

    /**
     * @Route(path="/botman", name="app_botman")
     */
    public function __invoke(): Response
    {
        $this->botMan->hears('Give me the bitcoin price',function (BotMan $botMan){
            $botMan->reply(sprintf('The current price is %s', $this->priceService->getPrice()));
        });

        $this->botMan->fallback(function (BotMan $bot) {
            $bot->reply('Wow don\'t say something crazy like that');
        });

        $this->botMan->listen();

        return new Response();
    }
}
