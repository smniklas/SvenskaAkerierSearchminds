<?php
    class RegController{
        private $RegView;
        public function __construct(RegView $RegView){
            $this->RegView = $RegView;
        }
        
        public function formMail(){
            if($this->RegView->pressSend()){
                $to = "info@akerikollen.se";
                $Email = $_POST["email"];
                $Phone = $_POST["telephone"];
                $Text = $_POST["text"];
                $subject = "Visselblåsare";
                $Message = "Anonym skrev följande: " . "\n\n" . $Text . " Nummer: " . $Phone;
                $Header = "From:" . $Email;
                mail($to,$subject,$Message,$headers);
            }
        }
    }
?>