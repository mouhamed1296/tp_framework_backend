<?php
namespace App\Entity;

class User {
    private string $id;
    private string $matricule;
    private string $prenom;
    private string $nom;
    private string $email;
    private string $mot_de_passe;
    private string $role;
    private int $etat;
    private string $date_inscription;
    private string | null $date_modification;
    private string | null $date_archivage;
    private string | null $photo;

    /**
     * Class constructor.
     */
    public function __construct($doc = null)
    {
        if (null === $doc) {
            // Stockez toutes les lettres possibles dans une chaîne.
            $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $randomStr = ''; 
            $n=4; 
            // Générez un index aléatoire de 0 à la longueur de la chaîne -1.
            for ($i = 0; $i < $n; $i++) { 
                $index = rand(0, strlen($str) - 1); 
                $randomStr .= $str[$index]; 
            }    
            $this->matricule ='MU2022/' . $randomStr;
        } else {
            foreach ($doc as $key => $value) {
                $this->$key = $value;
            }
        }
    }


    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }
    
    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mot_de_passe
     */ 
    public function getMot_de_passe()
    {
        return $this->mot_de_passe;
    }

    /**
     * Set the value of mot_de_passe
     *
     * @return  self
     */ 
    public function setMot_de_passe($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of date_inscription
     */ 
    public function getDate_inscription()
    {
        return $this->date_inscription;
    }

    /**
     * Set the value of date_inscription
     *
     * @return  self
     */ 
    public function setDate_inscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    /**
     * Get the value of date_modification
     */ 
    public function getDate_modification()
    {
        return $this->date_modification;
    }

    /**
     * Set the value of date_modification
     *
     * @return  self
     */ 
    public function setDate_modification($date_modification)
    {
        $this->date_modification = $date_modification;

        return $this;
    }

    /**
     * Get the value of date_archivage
     */ 
    public function getDate_archivage()
    {
        return $this->date_archivage;
    }

    /**
     * Set the value of date_archivage
     *
     * @return  self
     */ 
    public function setDate_archivage($date_archivage)
    {
        $this->date_archivage = $date_archivage;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }
}