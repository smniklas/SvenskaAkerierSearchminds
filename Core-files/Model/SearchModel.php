<?php
    class SearchModel{
        private $Session;
        public function __construct(Session $Session){
            $this->Session = $Session;
        }
        
        public function cleanQuery($query){
            $query = str_replace(' ', '-', $query);
            return preg_replace('/-+/', '-', $query);
        }
        
        public function buildHeader($query){
            $this->setSearchToken($query);
            header("Location: /?Search=$query");
        }
        
        private function setSearchToken($token){
            $this->Session->setSearchToken($token);
        }
    }
?>

            <!--$query = preg_replace('/[^A-Za-z0-9\-]/', '', $query);-->