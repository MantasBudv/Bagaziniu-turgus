<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\StreamedResponse;
use TCPDF;

class ProductController extends AbstractController
{
    /**
    * @Route("/product", name="product")
    */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
    * @Route("/produktai/visi", methods="GET")
    */
    public function getAllProducts()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findBy(
            array(),
            array('price' => 'DESC')
        );
        $json = $this->get("serializer")->serialize($products, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
    * @Route("/gautiProdukta", methods="GET")
    */
    public function getProductById(Request $request)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($request->get('id'));
        $json = $this->get("serializer")->serialize($product, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
    * @Route("/keistiProdukta", methods="POST")
    */
    public function changeProduct(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $data = $request->getContent();
        $data = json_decode($data, true);

        $product = $this->getDoctrine()->getRepository(Product::class)->find($data['id']);
        $product->setName($data['name']);
        $product->setFullDescription($data['fullDescription']);
        $product->setShortDescription($data['shortDescription']);
        $product->setPrice($data['price']);
        $product->setManufacturer($data['manufacturer']);
        $product->setCountryOfOrigin($data['countryOfOrigin']);
        $product->setQuantity($data['quantity']);

        $entityManager->flush();
        return new Response("Edited product");
    }

    /**
    * @Route("/preke/sukurti", methods="POST")
    */
    public function addProduct(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $data = $request->getContent();
        $data = json_decode($data, true);

        $product = new Product();
        $product->setName($data['name']);
        $product->setFullDescription($data['fullDescription']);
        $product->setShortDescription($data['shortDescription']);
        $product->setPrice($data['price']);
        $product->setManufacturer($data['manufacturer']);
        $product->setCountryOfOrigin($data['countryOfOrigin']);
        $product->setQuantity($data['quantity']);
        $product->setDateAdded(new \DateTime("now"));
        $entityManager->persist($product);
        $entityManager->flush();
        return new Response(200);
    }

    /**
     * @Route("/preke/trinti/{id}", methods="DELETE")
     * @param $request
     */
    public function delete($id)
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $repository->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();
        return new Response(200);
    }
}
