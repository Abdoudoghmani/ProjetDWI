<?php 
    class Recour {
        public $id;
	    public $module;
        public $nature;
	    public $note_affiche;
        public $note_reel;
        public $status;

        public function __construct($id, $module, $nature, $note_affiche, $note_reel, $status) {
            $this->id = $id;
            $this->module = $module;
            $this->nature = $nature;
            $this->note_affiche = $note_affiche;
            $this->note_reel = $note_reel;
            $this->status = $status;
        }
    }
?>