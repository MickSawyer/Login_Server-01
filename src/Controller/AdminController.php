<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"}, name="admin")
    **/
    public function index()
    {
        return new Response('Hello World');
    }

    /**
     * @Route("/users", methods={"GET", "POST"}, name="admin")
    **/
    public function users(Request $request)
    {
        if (strpos($request->headers->get('Content-Type'), 'application/json') === 0 ) {
            $data = json_decode($request->getContent(), true);
            $msg = $data['msg'];
            return new Response("JSON is Here!: msg = $msg");
        } else {
            return $this->json(['STATUS' => '403', 'MSG' => 'JSON REQUEST IS REQUIRED']);
        }
    }

}
