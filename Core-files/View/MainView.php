<?php
/**
 * MainView is the holder class for one of the main functions of the website, screenRender.
 * It will hold the base template of the HTML 5 Code that will serve as the front page.
 * it will be synced with a helper function that will server as the flow and controller
 * to direct the right content to the right place, think of it as a router
**/ 
    class MainView{
        
        public function screenRender(){
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
                </head>
                <body>
                    
                    
                    
                    
                    
                    <script src="../../vendors/scrolloverflow.min.js" type="text/javascript"></script>
                    <script src="../../Javascript/jquery.fullPage.min.js" type="text/javascript"></script>
                    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
                    <script src="../../Javascript/materialize.js" type="text/javascript"></script>
                    <script src="../../Javascript/init.js" type="text/javascript"></script>
                </body>
            </html>';            
                               
        }
               
    }
?>