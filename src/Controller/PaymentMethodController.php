<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PaymentMethod;
use App\Repository\PaymentMethodRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class PaymentMethodController extends AbstractController
{
    /**
     * @Route("/payment/method", name="payment_method")
     */
    public function index(): Response
    {
        return $this->render('payment_method/index.html.twig', [
            'controller_name' => 'PaymentMethodController',
        ]);
    }

    /**
     * @Route("/mokejimuikai", methods="GET")
     */
    public function getAllPaymentMethods()
    {
        $paymentMethod = $this->getDoctrine()->getRepository(PaymentMethod::class)->findAll();
        $json = $this->get("serializer")->serialize($paymentMethod, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
    * @Route("/payment/method/sukurti", methods="POST")
    */
    public function addPaymentMethod(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $data = $request->getContent();
        $data = json_decode($data, true);

        $product = new PaymentMethod();
        $product->setName($data['name']);

        $entityManager->persist($product);
        $entityManager->flush();
        return new Response(200);
    }

}
