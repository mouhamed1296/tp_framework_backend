<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/api/users', name: 'app_user')]
    public function index(UserRepository $userRepository): Response
    {
        return new JsonResponse($userRepository->findMany(["prenom" => "Eric"]));
    }

    #[Route('/api/user/add', name: 'app_user_add', methods: ['POST'])]
    public function addUser(UserRepository $userRepository, Request $request): Response
    {
        $user = new User();
        $user->setNom($request->get('nom'));
        $user->setPrenom($request->get('prenom'));
        $user->setEmail($request->get('email'));
        $user->setMot_de_passe($request->get('password'));
        $user->setRole($request->get('role'));
        $user->setPhoto($request->get('photo'));
        $user->setEtat(1);
        $user->setDate_inscription('2022-12-07');
        $user->setDate_modification(null);
        $user->setDate_archivage(null);
        $userRepository->save($user);
        return new JsonResponse(["success" => true]);
    }

    #[Route('/api/user/{email}', name: 'app_user_one')]
    public function getOneUser(UserRepository $userRepository, Request $request): Response
    {
        $email = $request->get('email');
        //dd($email);
        return new JsonResponse($userRepository->findOne(["email" => $email]));
    }

    #[Route('/api/user/update', name: 'app_update_user', methods: ['POST'])]
    public function updateUser(UserRepository $userRepository, Request $request): Response
    {
        $newData = array('nom' => $request->get('nom'), 
        'email' => $request->get('email'), 'prenom' => $request->get('prenom'));
        return new JsonResponse($userRepository->updateOne(["email" => $request->get('email')], $newData));
    }
}