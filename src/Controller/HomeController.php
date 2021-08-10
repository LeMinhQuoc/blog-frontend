<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Helper\APIHelper;
class HomeController extends AbstractController
{
    /**
     * @Route("", name="app_home")
     */
    public function index(APIHelper $client): Response
    {
        $response = $client -> get('api/blogs') ;
        return $this -> render('home/index.twig', array('listBlog'=>$response));
    }


}
