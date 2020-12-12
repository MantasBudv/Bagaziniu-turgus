<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Discount;
use App\Repository\DiscountRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class DiscountController extends AbstractController
{
    /**
     * @Route("/nuolaidos", name="nuolaidos", methods="GET")
     */
    public function index()
    {
        $discounts = $this->getDoctrine()->getRepository(Discount::class)->findAll();
        $serializer = $this->get('serializer');
        $json = $this->get("serializer")->serialize($discounts, 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
