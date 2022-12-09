<?php
namespace App\Repository;

use App\Entity\User;
use MongoDB\Client;
use MongoDB\Model\BSONDocument;

class UserRepository
{
    private $collection;
    public function __construct()
    {
        $client = new Client('mongodb+srv://msarr:namass20@eventcluster.0xsvy.mongodb.net/?retryWrites=true&w=majority');
        $this->collection =  $client->tp_framework->users;
    }

    /**
     * Get all the users
     *
     * @return []
     */
    public function findAll(bool $valueObject = false)
    {
        $cursor = $this->collection->find();

        return $this->turnResponseToArray($cursor, $valueObject);
    }

    /**
     * Find one user by a key that is unique
     *
     * @param [type] $filter Filter
     * @return void
     */
    public function findOne(array $filter)
    {
        $cursor = $this->collection->findOne($filter);
        return $this->turnResponseToArray($cursor)[0] ?? null;
    }

    public function findMany(array $filter)
    {
        $cursor = $this->collection->find($filter);
        return $this->turnResponseToArray($cursor);
    }

    /**
     * turnResponseToArray 
     *
     * @param [type] $response
     * @return User[] array
     */
    private function turnResponseToArray($response, bool $valueObject=false): array | null
    {
        $users = [];
        if ($response instanceof BSONDocument) {
            $response = ['response' => $response];
        }
        if (is_null($response)) {
            return $response;
        }
        foreach ($response as $document) {
            $doc = iterator_to_array($document);
            $doc['id'] = $doc['_id']->__toString();
            unset($doc['_id']);
            $user = $valueObject ? new User($doc) : $doc;
            //dd($user);
            array_push($users, $user);
        }

        return $users;
    }

    public function save(User $user) {
        $insertOneResult = $this->collection->insertOne([
            'matricule' => $user->getMatricule(),
            'prenom' => $user->getPrenom(),
            'nom' => $user->getNom(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
            'mot_de_passe' => $user->getMot_de_passe(),
            'photo' => $user->getPhoto(),
            'etat' => $user->getEtat(),
            'date_inscription' => $user->getDate_inscription(),
            'date_modification' => $user->getDate_modification(),
            'date_archivage' => $user->getDate_archivage()
        ]);
        
        return $insertOneResult;
    }

    public function updateOne(array $filter, array $newData) {
        $updateResult = $this->collection->updateOne($filter, $newData);
        return $updateResult->getModifiedCount();
    }
}