<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\User;
use App\Repository\UserRepository;
class UserController extends AbstractController
{
    /**
     * @Route("/klientai", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    /**
     * @Route("/klientai/trinti/{id}", methods="DELETE")
     * @param $request
     */
    public function delete($id)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);
        $response = new Response();
        if (isset($user)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
            $response->setStatusCode(200);
            return $response;
        }
        $response->setStatusCode(400);
        return $response;
    }
    /**
     * @Route("/prisijungimas", methods="POST")
     */
    public function login(Request $request) : Response
    {
        
        $data = $request->getContent();
        $data = json_decode($data, true);
        
        $depression = $this->getDoctrine()->getRepository(User::class)->findOneBy(['username' => $data['username']]);
        $json = $this->get("serializer")->serialize($depression, 'json');
        $user = json_decode($json);
        $response = new Response();
        if (isset($user)) {
            if ($data['password'] == $user->password){ 
                return new JsonResponse(
                    [
                        'user' => $user
                    ]
                );
            }
            else{
                $response->setStatusCode(400);
                return $response;
            }
        } else {
            $response->setStatusCode(400);
            return $response;
        }
        $response->setStatusCode(400);
        return $response;
    }
    /**
     * @Route("/klientai/redaguoti", methods="POST")
     */
    public function update(Request $request)
    {
        $data = json_decode($request->getContent());
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->find($data->id);
        $response = new Response();
        if (isset($user)) {
            $user->setName($data->name);
            $user->setSurname($data->surname);
            $user->setEmail($data->email);
            $user->setPhone($data->phone);
            $user->setPassword($data->password);
        } else {
            $response->setStatusCode(400);
            return $response;
        }
        $entityManager->flush();
        $response->setStatusCode(200);
        return $response;
    }
}
