<meta charset="utf-8">
<?php
/**
 * MainView is the holder class for one of the main functions of the website, screenRender.
 * It will hold the base template of the HTML 5 Code that will serve as the front page.
 * it will be synced with a helper function that will server as the flow and controller
 * to direct the right content to the right place, think of it as a router
 * Added the ViewRouter
 * ViewRouter have 3 simple task, keep track of 2 main view states and catch pages that can not be founds
**/ 
    class MainView{
        
        public function viewRender($Search_View_Attribute, $Browser_View_Attribute, $Info_View_Attribute, $Tell_View_Attribute, $Reg_View_Attribute){
            echo'
            <!DOCTYPE html>
            <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8"/>
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <link href="../../Css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
                    <link href="../../Css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
                    <link href="../../Css/jquery.fullPage.css" type="text/css" rel="stylesheet"/>
                    <style>
                       #map {
                        height: 500px;
                        width: 100%;
                       }
                    </style>
                </head>
                <body>
                    '.$this->viewRouter($Search_View_Attribute, $Browser_View_Attribute, $Info_View_Attribute, $Tell_View_Attribute, $Reg_View_Attribute).'
                </body>
                    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
                    <script src="../../vendors/scrolloverflow.min.js" type="text/javascript"></script>
                    <script src="../../Javascript/jquery.fullPage.min.js" type="text/javascript"></script>
                    <script src="../../Javascript/materialize.js" type="text/javascript"></script>
                    <script src="../../Javascript/init.js" type="text/javascript"></script>                
            </html>';            
                               
        }
        
        private function viewRouter($Search, $Browser, $Info, $Tell, $Reg){
            return ($this->tempFix($_SERVER['QUERY_STRING']) == 'Search='.$_SESSION["query"]) 
            ? $Browser->htmlResponse() : ((strpos($_SERVER['QUERY_STRING'], "company") !== FALSE) 
            ? $Info->htmlResponse() : (($_SERVER['QUERY_STRING'] == 'registrering') 
            ? $Tell->htmlResponse() : (($_SERVER['QUERY_STRING'] == 'visselblasare') 
            ? $Reg->htmlResponse() : $this->standardView($Search)))); 
        }
        private function standardView($main){
            return $main->htmlResponse();
        }
        private function tempFix($string){
            $string = str_replace('%C3%B6',"ö", $string);
            $string = str_replace('%C3%A9',"é", $string);
	        $string = str_replace('%C3%85',"Å", $string);
            $string = str_replace('%C3%A5',"å", $string);
            $string = str_replace('%C3%A5',"ä", $string);
            $string = str_replace('%C3%B6',"ö", $string);
            return $string;
        }       
    }
?>