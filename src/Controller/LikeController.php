<?php


namespace App\Controller;

use App\Helper\APIHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{

    #[Route('/like/{id}', name: 'like')]
    public function index(APIHelper $client, string $id)
    {
        session_start();
        $token=$_SESSION["token"];
        $tokenParts = explode(".",$token);
        $tokenHeader = base64_decode($tokenParts[0]);
        $tokenPayload = base64_decode($tokenParts[1]);
        $jwtHeader = json_decode($tokenHeader);
        $jwtPayload = json_decode($tokenPayload);
        $uId=$jwtPayload->userId;
        $client->postLike($id,$token,$uId);

        return $this->redirect($this->generateUrl('app_home'));




    }
}
