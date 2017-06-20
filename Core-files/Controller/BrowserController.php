<?php
    class BrowserController{
        private $BrowserView;
        private $BrowserModel;
        private $SearchModel;
        public function __construct(BrowserView $BrowserView, BrowserModel $BrowserModel, SearchModel $SearchModel){
            $this->BrowserView  = $BrowserView;
            $this->BrowserModel = $BrowserModel;
            $this->SearchModel  = $SearchModel;
        }
        
        public function SearchResult(){
            if(!$_SERVER['QUERY_STRING'] == ""){
                $this->BrowserView->queryCollector($this->BrowserModel->searchCollector());
                if($this->BrowserView->searchSet()){
                    $this->SearchModel->buildHeader($this->SearchModel->cleanQuery($_SESSION["query"]));
                }
            }
        }
    }
?>