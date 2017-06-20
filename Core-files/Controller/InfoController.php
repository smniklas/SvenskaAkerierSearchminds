<meta charset="utf-8">
<?php
    class InfoController{
        
        private $BrowserView;
        private $InfoView;
        private $InfoModel;
        private $SearchModel;
        
        public function __construct(BrowserView $BrowserView, InfoView $InfoView, InfoModel $InfoModel, SearchModel $SearchModel){
            $this->BrowserView = $BrowserView;
            $this->InfoView    = $InfoView;
            $this->InfoModel   = $InfoModel;
            $this->SearchModel = $SearchModel;
        }
        
        public function SingleSearchInitiation(){
            if(strpos($_SERVER['QUERY_STRING'], 'company') !== FALSE){
                $this->InfoView->queryCollector($this->InfoModel->getCompany($this->InfoModel->scrubString($_SERVER['QUERY_STRING'])));
                if($this->BrowserView->searchSet()){
                    $this->SearchModel->buildHeader($this->SearchModel->cleanQuery($_SESSION["query"]));
                }
            }
        }
        
        
    }
?>