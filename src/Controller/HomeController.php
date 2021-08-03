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
    public function index(): Response
    {
        $client = new APIHelper();
        $response = $client -> get() -> request('GET', '/api/blogs', [
            'query' => [
                'page' => '1',
            ]
        ]);;
        $body = $response -> getBody() -> getContents();
        $arr= json_decode($body,true);
        return $this -> render('home/index.twig', array('listBlog'=>$arr));
    }
}
