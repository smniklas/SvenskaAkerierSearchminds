<meta charset="utf-8">
<?php
    class InfoModel{
        private $Session;
        private $Database;
        public function __construct(Session $Session, Database $Database){
            $this->Session  = $Session;
            $this->Database = $Database;
        }
        
        public function scrubString($string){
            $string = str_replace('%20', ' ', $string);
            $string = str_replace('%C3%B6',"ö", $string);
            $string = str_replace('%C3%A9',"é", $string);
	        $string = str_replace('%C3%85',"Å", $string);
            $string = str_replace('%C3%A5',"å", $string);
            $string = str_replace('%C3%A5',"ä", $string);
            $string = str_replace('%C3%B6',"ö", $string);
            $string = str_replace('company=', '', $string);
            $parts = explode("=", $string);
            return $parts;
        }
        public function getCompany($array){
            return $this->Database->getSingleDB($array);
        }
        function hexStringToString($hex) {
            return pack('H*', $hex);
        }
    }
?>