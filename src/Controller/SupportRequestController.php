<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SupportRequest;
use App\Repository\SupportRequestRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SupportRequestController extends AbstractController
{
    /**
     * @Route("/support/request", name="support_request", methods="GET")
     */
    public function index()
    {
        $discounts = $this->getDoctrine()->getRepository(SupportRequest::class)->findBy(['status' =>"1"]);
        $json = $this->get("serializer")->serialize($discounts, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/support/request/naujas", methods="POST")
     */
    public function new(Request $request)
    {
        $data = json_decode($request->getContent());
        $discount = new SupportRequest();
        $discount->setMessage($data->message);
        $discount->setUsername($data->username);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($discount);
        $entityManager->flush();
        return new JsonResponse(
            [
                'status' => 'ok'
            ],
            JsonResponse::HTTP_CREATED
        );
    }

    /**
     * @Route("/support/request/answer", methods="POST")
     */
    public function answer(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $data = $request->getContent();
        $data = json_decode($data, true);

        $discounts = $this->getDoctrine()->getRepository(SupportRequest::class)->find($data['id']);
        
        $discounts->setStatus(2);

        $entityManager->persist($discounts);
        $entityManager->flush();

        return new Response(200);
    }
}
