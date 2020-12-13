<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Discount;
use App\Repository\DiscountRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DiscountController extends AbstractController
{
    /**
     * @Route("/nuolaidos/visos", name="nuolaidos", methods="GET")
     */
    public function index()
    {
        $discounts = $this->getDoctrine()->getRepository(Discount::class)->findAll();
        $json = $this->get("serializer")->serialize($discounts, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/nuolaidos/trinti/{name}", methods="DELETE")
     * @param $request
     */
    public function delete($name)
    {
        $repository = $this->getDoctrine()->getRepository(Discount::class);
        $discount = $repository->findOneBy(['name' => $name]);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($discount);
        $entityManager->flush();
        return new Response(200);
    }

    /**
     * @Route("/nuolaidos/naujas", methods="POST")
     */
    public function new(Request $request)
    {
        $data = json_decode($request->getContent());
        $discount = new Discount();
        $discount->setName($data->name);
        $discount->setIsPercentile($data->is_percentile);
        if (isset($data->sum)) {
            $discount->setSum($data->sum);
        } else {
            $discount->setPercentile($data->percentile);
        }
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
}
