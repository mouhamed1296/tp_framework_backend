<?php

namespace App\Controller;

use App\Document\Test;
use App\Entity\User;
use App\Repository\UserRepository;
use MongoDB\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(UserRepository $userRepository): Response
    {
        /* $client = new Client('mongodb+srv://msarr:namass20@eventcluster.0xsvy.mongodb.net/?retryWrites=true&w=majority');
        $collection = $client->test->users;
        $insertOneResult = $collection->insertOne([
            'matricule' => 'MU2022/1',
            'prenom' => 'Mamadou',
            'nom' => 'Sarr',
            'email' => 'sarr@gmail.com',
            'role' => 'admin',
            'mdp' => 'passer@01',
            'photo' => null,
            'etat' => 1,
            'date_inscription' => '2022-12-07',
            'date_modification' => null,
            'date_archivage' => null
        ]);
        */
        $user = new User();
        $user->setNom("Diagne");
        $user->setPrenom("Eric");
        $user->setEmail("diagne@gmail.com");
        $user->setMot_de_passe("passer@01");
        $user->setPhoto(null);
        $user->setRole("admin");
        $user->setEtat(1);
        $user->setDate_inscription('2022-12-07');
        $user->setDate_modification(null);
        $user->setDate_archivage(null);
        $userRepository->save($user);

        $users = $userRepository->findAll();
        /*

        $cursor = $collection->find();
        $users = [];
        foreach ($cursor as $document) {
            $user = iterator_to_array($document);
            array_push($users, $user);
        } */

        dd($users);
        /* dd($insertOneResult->getInsertedCount()); */
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}