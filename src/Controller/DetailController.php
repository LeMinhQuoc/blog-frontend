<?php

namespace App\Controller;

use App\Helper\APIHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/post/{id}", name="app_post")
     */
    public function index(APIHelper $client,string $id): Response
    {
        $response = $client->get('api/blogs/'.$id) ;
        return $this->render('detail/index.twig', array('blogDetail'=>$response));
    }
}
