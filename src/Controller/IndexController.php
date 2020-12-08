<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\PriceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class IndexController extends AbstractController
{

    private PriceService $priceService;

    public function __construct(PriceService $priceService){
        $this->priceService = $priceService;
    }
    /**
     * @Route(path="/", name="app_index")
     */
    public function __invoke(): Response
    {
        // dump($this->priceService->getPrice());die;
        return $this->render('Index/view.html.twig', []);
    }
}
