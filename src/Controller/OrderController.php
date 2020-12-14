<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class OrderController extends AbstractController
{
    /**
     * @Route("/mokejimai/visi", methods="GET")
     */
    public function index(Request $request)
    {
        $orders = $this->getDoctrine()->getRepository(Order::class)->findBy(['user_id' => $request->get('id')]);
        $json = $this->get("serializer")->serialize($orders, 'json');
        return new JsonResponse($json, 200, [], true);
    }
    /**
     * @Route("/pirkti", methods="POST")
     */
    public function buy(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $data = $request->getContent();
        $data = json_decode($data, true);

        $order = new Order();
        $order->setTotal($data['sum']);
        $order->setCreationDate(new \DateTime("now"));
        $order->setUserId($data['user_id']);

        $entityManager->persist($order);
        $entityManager->flush();
        return new Response(200);
    }
    /**
     * @Route("/mokejimai/gautisaskaita", methods="GET")
     */
    public function getOrder (Request $request)
    {
        $order = $this->getDoctrine()->getRepository(Order::class)->find($request->get('id'));
        $json = $this->get("serializer")->serialize($order, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/mokejimai/aktyvus", methods="GET")
     */
    public function active()
    {
        $discounts = $this->getDoctrine()->getRepository(Order::class)->findBy(['status' =>"not completed"]);
        $json = $this->get("serializer")->serialize($discounts, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/uzsakymai/answer", methods="POST")
     */
    public function answer(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $data = $request->getContent();
        $data = json_decode($data, true);

        $discounts = $this->getDoctrine()->getRepository(Order::class)->find($data['id']);
        
        $discounts->setStatus("completed");

        $entityManager->persist($discounts);
        $entityManager->flush();

        return new Response(200);
    }
}
