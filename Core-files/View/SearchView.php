<?php
    class SearchView{
        
        private static $searchButton = "SearchView::SearchButton";
        private static $searchQuery  = "SearchView::SearchQuery";
        private static $tellButton   = "SearchView::SearchTell";
        private static $formButton   = "SearchView::SearchForm";
        private static $partnerButton   = "SearchView::Partner";
        
        private $message = "";
        /**
         * Class that holds the HTML respons for the first page
         * 
        **/
        public function htmlResponse(){
            
            return'
            <div id="fullpage">
            <div class="section bodym">
                <div class="row">
                    <div class="col s12 m10 l4 push-m1 push-l4 main-search-div z-depth-1">
                        <div class="row">
                        </div>
                        <img class="responsive-img main-logo" src="../../Images/MainLogo.png" alt="">
                	   <div class="row">
                    	   <form method="post" class="col s12">
                    	        <div class="row">
                    	        </div>
                        	    <div class="row">
                            	    <div class="input-field col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete white-text" name="'.self::$searchQuery.'">
                                        <label class="white-text" for="autocomplete-input">Sök</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4 m3 l3">
                                        <button class="btn waves-effect waves-light search_button blue lighten-3" type="submit" name="'.self::$searchButton.'">Sök</button>
                                    </div>
                                    <div class="col s3 m3 l3">
                                        <button class="btn waves-effect waves-light search_button blue lighten-3" type="submit" name="'.self::$tellButton.'">Registrering</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="vissle">
                    <a class="White-text" name="'.self::$formButton.'" href="/?visselblasare">Visselblåsare /</a>
                    <a class="White-text" name="'.self::$partnerButton.'" href="#bottom"> Sammarbetspartner</a>
                </div>

            </div>
            <div class="section row bodyb">
                <div class="col l5 m12 s12 push-l1">
            	        <h3 style="color:#e8a664" class="flow-text">VAR MED OCH TA ANSVAR</h3>
           	            <p class="flow-text">
                            I en konkurrenssituation med dumpade priser och en marknad som är rejält överetablerad ökar risken att både köpare och säljare av transporter tummar på säkerhet, 
                            miljötänk och socialt ansvar. Allt i jakt på kortsiktiga kostnadsbesparingar. Det blir en negativ spiral som måste brytas. 
                            Vi har alla, både konsumenter och transportörer ett ansvar för en säker, ren och ansvarsfull åkerinäring.
            	        </p>
            	        <h3 style="color:#e8a664" class="flow-text">TA STÄLLNING</h3>
            	        <p class="flow-text">
            	            Medlemmarna i Sveriges Åkeriföretag som vill vara med i Fair Transport skriver under på att deras åkeri uppfyller krav inom trafiksäkerhet, miljöhänsyn och ansvar kring det egna företagandet.
                            Genom dessa åtaganden gör vi skillnaden på bra och en dålig transport tydligare. Och underlättar för transportköpare att göra rätt och bra val
            	        </p>
            	        <h3 style="color:#e8a664" class="flow-text">TRAFIKSÄKERHET</h3>
            	        <p class="flow-text">
            	            För oss medlemmar i Sveriges Åkeriföretag är det självklart att arbeta för en säkrare trafik och att vi som yrkeschaufförer tar ansvar för att öka säkerheten och förebygga olyckor för våra medtrafikanter. 
                            Att köra Fair Transport innebär att vara ett gott föredöme i trafiken och att arbeta med trafiksäkerhetsåtgärder och policys för trafiksäkerhet.
            	        </p>
            	        <h3 style="color:#e8a664" class="flow-text">VI KÖR KLIMATSMART</h3>
            	        <p class="flow-text">
            	            Då transporter tyvärr påverkar miljön negativt men är förutsättning för handel, företagande och tillväxt krävs det av oss transportörer att vi har ett klimatsmart tänk och att vi arbetar för att minimera den skadliga  miljöpåverkan.
            	        </p>
            	        <h3 style="color:#e8a664" class="flow-text">VI TAR ANSVAR</h3>
            	        <p class="flow-text">
            	            Åkerinäringen har idag problem med oseriösa aktörer vilket leder till osund och omöjlig konkurrenssituation. Seriösa åkare som följer lagstiftningen gällande kör och vilotider och som tar ett socialt ansvar för sina förare får betydligt svårare att hävda sig på marknaden.
                            Detta vill vi genom Fair Transport ändra på och genom Åkerikollen.se belysa för konsumenterna 
            	        </p>            	    
            	</div>
            	<div class="col l5 offset-by-l6 hide-on-med-and-down">
            	    <img class="" src="../../Images/wordcloud.png" alt="">
            	</div>
            </div>
            <div class="section" id="bottom">
                    <div class="row">
                        <div class="col s12 m10 l6 offset-l3 offset-m1">
                            <h1 class="flow-text center-align">VÅRA SAMMARBETSPARTNERS</h1>
                            <em class="flow-text center-align">Vi är stolta över att presentera våra sammarbetspartners. Vill du också vara med och påverka? Kontakta oss</em>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col s12 l3 m4 push-l1">                    
                                <a href=""><img class="responsive-img" src="../../Images/daff.png"></a>
                            </div>
                            <div class="col s12 l3 m4 push-l2">
                                <a href=""><img class="responsive-img" src="../../Images/Kolstad.png"></a> 
                            </div>
                            <div class="col s12 l3 m4 push-l2">
                                <a href=""><img class="responsive-img" src="../../Images/lastvikt.png"></a>                        
                            </div>
                    </div>
            </div>
            </div>
            ';
        }
        
        private function setMessage($message){
            $this->message = $message;
        }
        private function getMessage(){
            return $this->message;
        }
        public function searchPress(){
            return isset($_POST[self::$searchButton]); 
        }
        public function tellPress(){
            return isset($_POST[self::$tellButton]);
        }
        public function getSearch(){
            return isset($_POST[self::$searchQuery]) ? $_POST[self::$searchQuery] : null;
        }
        
    }
?>