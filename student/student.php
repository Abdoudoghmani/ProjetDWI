<?php 
    class Student {
        public $id;
        public $nom;
        public $prenom;
        public $email;
        public $groupe;
        public $recours;

        public function __construct( $id, $nom, $prenom, $email, $groupe ) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->groupe = $groupe;
            $this->recours = [];
        }


    }

?>