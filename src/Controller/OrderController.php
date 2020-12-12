<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractController
{
    /**
     * @Route("/mokejimai/visi", methods="GET")
     */
    public function index()
    {
        $discounts = $this->getDoctrine()->getRepository(Order::class)->findAll();
        $json = $this->get("serializer")->serialize($discounts, 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
