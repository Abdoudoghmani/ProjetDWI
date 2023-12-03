<?php 
    class Student {
        public $id;
        public $nom;
        public $prenom;
        public $email;
        public $groupe;
        public $recours;

        public function __construct($nom, $prenom, $email, $groupe ) {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->groupe = $groupe;
            $this->recours = [];
        }


    }

?>