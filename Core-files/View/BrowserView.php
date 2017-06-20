<meta charset="utf-8">
<?php

    class BrowserView{

        
        private static $htmlArray = array();
        private static $tokenArray = array();
        private static $searchBar = "Search";
        private static $readMore  = "BrowserView::ReadMore";
        
       public function htmlResponse(){
        return '
            <nav class="nav">
                <div class="nav-wrapper">
                <img class="top-logo responsive-img" src="../../Images/testlogo.png"> 
                    <form method="post">
                        <div class="input-field">
                            <input id="search" type="search" required name="'.self::$searchBar.'">
                            <label class="label-icon" for="search"><i class="material-icons">search</i> </label>
                            <i class="material-icons">close</i>                        
                        </div>
                    </form>
                </div>
            </nav>
        <div class="row">
        </div>
        <div class="row">
            '.$this->googleMap().'
            '.$this->htmlObject().'
        </div>
        <div class="fixed-action-btn" style="bottom: 45px; right:45px;">
            <a class="btn-floating btn-large waves-effect waves-light blue" href="/?">
                <i class="material-icons">dashboard</i>
            </a>
        </div>
        ';
        }
        // AIzaSyBHBIYSPXzvpj6FYala9mYd4Gf7lD7NWXQ
        
        public function queryCollector($arrayObject){
            foreach($arrayObject as $object){
                array_push(self::$htmlArray, (array) $object);
            }
        }
        private function googleMap(){
            return '
                <div id="map" class="mapPos hide-on-med-and-down "></div>
                <script>
                  function initMap() {
                    var uluru = {lat: 59.334591, lng: 18.063240};
                    window.map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 4,
                        center: uluru
                    });
                  }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfhoaK2PHhPVmuTAl71zxhg5UIpNi1J4A&callback=initMap">
                </script>
            ';
        }
        private function htmlObject(){
            if(is_array(self::$htmlArray) ){
                
                foreach(self::$htmlArray as $object){
                    if($object[paid_fair] == TRUE){
                        $subToken = array($object[visit_adress], $object[visit_city]);
                        array_push(self::$tokenArray, $subToken);
                        $htmlToken .= '
                            <div class="row">
                                <div class="col s12 m6 l5 offset-l1 offset-m3">
                                    <div class="card card-color">
                                        <div class="card-content content-card">
                                            <div class="row">
                                                <p class="card-title flow-text left">'.$object[comp_name].'</p>
                                                <p class="card-title flow-text right">Kontrollerat</p>
                                            </div>
                                            <div class="row">
                                                <div class="col s6 m6 l3">
                                                    <p>Stad: '.$object[visit_city].'</p>
                                                </div>
                                                <div class="col s6 m6 l3">
                                                    <p>Adress: '.$object[visit_adress].'</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6 m6 l3">
                                                    <p>Telefon: '.$this->numberConv($object[phone]).'</p>
                                                </div>
                                                <div class="col s6 m6 l3">
                                                    <p>Län: '.$object[county].'</p>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="card-action">
                                            <a class="btn-flat black-text" href="/?company='.$object[comp_name].'='.$object[visit_zip].'" name="'.self::$readMore.'">Läs Mer</a>
                                            <img class="logo-size responsive-img" src="../../Images/fair-transport.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                    else{
                        $objectName = substr($object[comp_name],0,15);
                        $htmlToken .= "
                            <div class='col s12 m6 l3'>
                                <div class='card grey lighten-2'>
                                    <div class='card-content'>
                                    <div class='row'>
                                        <p class='card-title flow-text left'>$objectName...</p>
                                        <p class='card-title flow-text  right'>Ej-Kontrollerat</p>
                                    </div>
                                    <div class='row'>
                                        <p>Stad: $object[visit_city]</p> 
                                        <p>Telefon: 0$object[phone]</p>                                    
                                    </div>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                    
                }
            }
            echo '
                <script type="text/javascript">
                    function markerRun(){
                    var array = '.json_encode(self::$tokenArray).';
                    console.log(array);
                    var xhttp = new XMLHttpRequest();
                    
                    xhttp.onreadystatechange = function() {
                    
                        if (this.readyState == 4 && this.status == 200) {
                        
                            var response = this.responseText;
                            console.log(response);
                        }
                        
                    };
                    
                    xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?address=array[0][0],array[0][1]&key=AIzaSyBHBIYSPXzvpj6FYala9mYd4Gf7lD7NWXQ", true);
                    
                    xhttp.send();
                    
                    
                    
                    }
                </script>
                <script>
                markerRun();
                </script>
            '; 
            return $htmlToken;
        }
        
        public function searchSet(){
            if(isset($_POST[self::$searchBar])){
                $_SESSION["query"] = $_POST[self::$searchBar];
                return TRUE;
            }
        }
        
        private function numberConv($numb){
            if(substr($numb, 0, 1) == "0"){
                return $numb;
            }
            else{
                $format = '%d%s';
                $foo = sprintf($format, 0, $numb);
                return $foo;
            }
        }
        
    }
?>