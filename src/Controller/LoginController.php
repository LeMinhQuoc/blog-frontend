<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\HomeController;
use App\Helper\APIHelper;
class LoginController extends AbstractController

{
    #[Route('/security_login ', name: 'login', methods: ['POST'])]
    public function login(APIHelper $helper,Request $input) {
        $_SESSION["token"]="";
        $username = $input->get('username');
        $password = $input->get('password');
        $helper->getLogin($username,$password);
        return $this->redirect($this->generateUrl('app_home'));

    }
}
