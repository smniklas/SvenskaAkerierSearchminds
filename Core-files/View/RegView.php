<?php
    class RegView{
        
        public function htmlResponse(){
            return '
            <br>
            <br>
                <div class="row">
                    <div class="col s12 l12">
                        <form class="col s12 l6 push-l3 grey lighten-5 z-depth-2">
                            <br>
                            <div class="row">
                                <div class="col s6 l6>
                            <p class="flow-text"><strong>Vissleblåsare</strong></p>
                            <p>Här kan du anmäla andra företag som du tror bryter mot våra regler, fyll i formuläret och berätta varför du tror att just de företaget bryter mot det regler som är satta</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6 l6">
                                    <input id="email" type="email" class="validate" name="email">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s6 l6">
                                    <input id="telephone" type="tel" class="validate" name="telephone">
                                    <label for="telephone">Telefon</label>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                  <textarea id="textarea1" class="materialize-textarea" name="text"></textarea>
                                  <label for="textarea1">Meddelande</label>
                                </div>                        
                            </div>
                            <div class="row">
                                <button class="btn waves-effect waves-light blue lighten-3" type="submit" name="action">Skicka
                                </button>
                            </div>
                        </form>                    
                    </div>
                </div>
                
                <div class="fixed-action-btn" style="bottom: 45px; right:45px;">
                    <a class="btn-floating btn-large waves-effect waves-light blue" href="/?">
                        <i class="material-icons">dashboard</i>
                    </a>
                </div>  
            ';
        }
        
        public function pressSend(){
            return isset($_POST["action"]);
        }
    }
?>