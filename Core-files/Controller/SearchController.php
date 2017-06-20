<?php
    class SearchController{
        private $SearchView;
        private $SearchModel;
        
        public function __construct(SearchView $SearchView, SearchModel $SearchModel){
            $this->SearchView  = $SearchView;
            $this->SearchModel = $SearchModel;
        }
        /**
         * ternary operations
         * if search is pressed pick up the query and put in $searchQuery
         * Clean it and if all goes well send it to buildHeader
         **/
        public function InitiationSearch(){
            if($this->SearchView->searchPress()){
                $searchQuery = $this->SearchView->getSearch();
                if($searchQuery != null){
                    $this->SearchModel->buildHeader($this->SearchModel->cleanQuery($searchQuery));
                }                
            }
            if($this->SearchView->tellPress()){
                header("Location: /?registrering");
            }
        }
    }
?>