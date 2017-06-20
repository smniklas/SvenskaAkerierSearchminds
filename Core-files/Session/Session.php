<?php
    class Session{
        public static $searchToken = "Session::searchToken";
        public function __construct(){
            session_start();
            
        }        
        
        public function setSearchToken($token){
            $_SESSION["query"] = $token;
        }
    }
?>