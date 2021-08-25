<?php


namespace App\Controller;

use App\Helper\APIHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentsController extends AbstractController
{

    #[Route('/comment/{id} ', name: 'comment', methods: ['POST'])]
    public function index(APIHelper $client,string $id, Request $input )
    {


        $token=$_SESSION["token"];
        $tokenParts = explode(".",$token);
        $tokenHeader = base64_decode($tokenParts[0]);
        $tokenPayload = base64_decode($tokenParts[1]);
        $jwtHeader = json_decode($tokenHeader);
        $jwtPayload = json_decode($tokenPayload);
        $uId=$jwtPayload->userId;
        $client->postComments($id,$token,$uId, $input->get("content"));

        return $this->redirect($this->generateUrl('post',[
            'id' => $id
        ]));

        return new JsonResponse(['success' => true]);


    }
}
