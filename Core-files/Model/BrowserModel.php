<?php
    class BrowserModel{
        private $Session;
        private $Database;
        public function __construct(Session $Session, Database $Database){
            $this->Session = $Session;
            $this->Database = $Database;
        }
        
        public function searchCollector(){
            $searchorder = explode("-", $_SESSION["query"]);
            $sqlresponse = $this->Database->sqlQueryCreator($searchorder);
            return $this->Database->getDB($sqlresponse);
        }
        
        
    }
?>