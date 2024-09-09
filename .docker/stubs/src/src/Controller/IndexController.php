<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public const CDEK_USERNAME = 'cdek-user-01';
    public const CDEK_PASSWORD = '123456789';
    public const FIVEPOST_API_KEY = '448ed7416fce2cb66c285d182b1ba3df1e90016d';

    #[Route('/delivery/cdek', name: 'cdek_delivery_stub', methods: 'POST', format: 'json')]
    public function deliveryCdek(Request $request): Response
    {
        $username = $request->getPayload()->get("username");
        $password = $request->getPayload()->get("password");
        $weight = $request->getPayload()->get("weight");
        
        if ($username != self::CDEK_USERNAME || $password != self::CDEK_PASSWORD) {
            return $this->json([
                'status' => false,
                'data' => [
                    'message' => "Неверный логин или пароль"
                ]
            ]);
        }

        if (!$this->checkWeight($weight)) {
            return $this->json([
                'status' => false,
                'data' => [
                    'message' => "Укажите вес заказа"
                ]
            ]);
        }

        $deliveryFrom = rand(1, 5);
        $deliveryTo = rand($deliveryFrom, $deliveryFrom + 10);
        
        return $this->json([
            'status' => true,
            'data' => [
                'message' => 'OK',
                'price' =>  $this->getPrice($weight),
                'delivery_from' => $deliveryFrom,
                'delivery_to' => $deliveryTo,
            ]
       ], Response::HTTP_OK);
    }



    #[Route('/delivery/fivepost', name: 'fivepost_delivery_stub', methods: 'POST', format: 'json')]
    public function deliveryFivepost(Request $request): Response
    {
        $weight = $request->getPayload()->get("weight");

        if ($request->headers->get('apiKey') != self::FIVEPOST_API_KEY) {
            return $this->json([
                'status' => Response::HTTP_FORBIDDEN,
                'data' => [
                    'message' => "Неверный apiKey"
                ]
            ], Response::HTTP_FORBIDDEN);
        }

        if (!$this->checkWeight($weight)) {
            return $this->json([
                'status' => false,
                'data' => [
                    'message' => "Укажите вес заказа"
                ]
            ], Response::HTTP_BAD_REQUEST);
        }

        $deliveryFrom = rand(2, 7);
        $deliveryTo = rand($deliveryFrom, $deliveryFrom + 20);

        return $this->json([
            'status' => Response::HTTP_OK,
            'data' => [
                'message' => Response::HTTP_OK,
                'price' => $this->getPrice($weight),
                'delivery_from' => $deliveryFrom,
                'delivery_to' => $deliveryTo,
            ]
       ]);
    }

    private function checkWeight(?int $weight) 
    {
        return $weight > 0;
    }

    private function getPrice(int $weight)
    {
        $price = 50;
        if ($weight > 10) {
            $price = 100;
        }

        return $weight;
    }
}