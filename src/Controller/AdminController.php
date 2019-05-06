<?php

namespace App\Controller;

use App\Service\UserService;
use App\Utils\UserProfileValidator;
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

    /** Add User
     * @Route("/users", methods={"GET", "POST"}, name="admin")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse|Response
     */
    public function createUser(Request $request, UserService $userService ){
        return new Response("Hello Guys");
    }
}
