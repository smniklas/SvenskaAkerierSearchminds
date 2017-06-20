<?php
    class InfoView{
        
        private static $htmlArray = array();
        private static $searchBar = "Search";
        
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
            '.$this->htmlBuilder().'
                <div class="fixed-action-btn" style="bottom: 45px; right:45px;">
                    <a class="btn-floating btn-large waves-effect waves-light blue" href="/?">
                        <i class="material-icons">dashboard</i>
                    </a>
                </div>                
            ';
        }
        
        public function queryCollector($object){
            self::$htmlArray = (array) $object;
        }
        
        public function htmlBuilder(){
            $array = self::$htmlArray;
            return '
            <div class="row">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col s12 m10 l6 offset-l3 offset-m1 z-depth-2 grey lighten-5">
                        <div class="row">
                            <div class="col s12">
                                <h1 class="flow-text"><strong>'.$array[comp_name].'</strong></h1>
                                <h3 class="flow-text"><em>'.$array[comp_type].'</em></h3>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col s12 l6">
                            <p><strong>Län: </strong>'.$array[county].'</p>
                            <p><strong>Stad: </strong>'.$array[visit_city].'</p>
                            <p><strong>Adress: </strong>'.$array[visit_adress].'</p>
                            <p><strong>Post-adress: </strong>'.$array[postal_adress].'</p>
                        </div>
                        <div class="col s12 l6">
                            <p><strong>Telefon: </strong>'.$this->numberConv($array[phone]).'</p>
                            <p><strong>Email: </strong>'.$array[email].'</p>
                            <p><strong>Hemsida: </strong>'.$array[url].'</p>
                            <p><strong>Org.nummer: </strong>'.$array[org_number].'</p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m10 l6 offset-l3 offset-m1 z-depth-2 grey lighten-5">
                    <p>Här finns det utrymme för mer information, kontakta Åkerikollen för att utöka din profil</p>
                    <br>
                    <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m10 l6 offset-l3 offset-m1 z-depth-2 grey lighten-5">
                    <p>Här finns det utrymme för mer information, kontakta Åkerikollen för att utöka din profil</p>
                    <br>
                    <br>
                    </div>
                </div>
            </div>
            ';
        }
        public function searchSet(){
            if(isset($_POST[self::$searchBar])){
                $_SESSION["query"] = $_POST[self::$searchBar];
                return TRUE;
            }
        }
        private function numberConv($numb){
            if(substr($numb, 0, 1) == "0"){
                $tela = '<a href="tel:'.$numb.'">'.$numb.'</a>';
                return $tela;
            }
            else{
                $format = '%d%s';
                $foo = sprintf($format, 0, $numb);
                $fo = 0 + $foo;
                $tela = '<a href="tel:'.$foo.'">'.$foo.'</a>';
                return $tela;
            }
        }
    }
?>