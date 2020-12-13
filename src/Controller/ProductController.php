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
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
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

    /**
    * @Route("/pdf", methods="POST")
    * @param $request
    */
    public function pdf()
    {
        $pdf = new Tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 002');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', 'BI', 20);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $txt = <<<EOD
        TCPDF Example 002

        Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
        EOD;

        // print a block of text using Write()
        $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

        return new StreamedResponse(function () use ($pdf) {
            $pdf->Output('filename.pdf', 'I');
        });
    }
}
