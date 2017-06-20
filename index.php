<?php

//------Require_once, Files

//REMINDER: Gona have to use some autoloader here later.

//Controller

require_once("Core-files/Controller/BrowserController.php");
require_once("Core-files/Controller/InfoController.php");
require_once("Core-files/Controller/MainController.php");
require_once("Core-files/Controller/RegController.php");
require_once("Core-files/Controller/SearchController.php");
require_once("Core-files/Controller/TellController.php");

//Model

require_once("Core-files/Model/BrowserModel.php");
require_once("Core-files/Model/InfoModel.php");
require_once("Core-files/Model/RegModel.php");
require_once("Core-files/Model/SearchModel.php");
require_once("Core-files/Model/TellModel.php");

//View

require_once("Core-files/View/BrowserView.php");
require_once("Core-files/View/InfoView.php");
require_once("Core-files/View/MainView.php");
require_once("Core-files/View/RegView.php");
require_once("Core-files/View/SearchView.php");
require_once("Core-files/View/TellView.php");

//Session

require_once("Core-files/Session/Session.php");

//Database

require_once("Core-files/Database/Database.php");

//------

/**
 * The Attribute varible contains the class and all it's functions
 * i keep it in the main index.php file to more easily us it as a "router"
 * where i can controll the flow and progression of the site.
 * Each Varible has it's filename before the Attribute to easily determin where
 * it belongs.
 * Everything will be built on a LOOSE MVC standard with some splashes of PSR
 * standard.
 * 
 * These Attributes don't follow the naming convention as the rest since it's a
 * very special file
**/
 
//Database-Attribute

$Database_Attribute = new Database();

//Session-Attribute

$Session_Attribute  = new Session();

//Model-Attribute

$Browser_Model_Attribute = new BrowserModel($Session_Attribute, $Database_Attribute);

$Info_Model_Attribute    = new InfoModel($Session_Attribute, $Database_Attribute);

$Reg_Model_Attribute     = new RegModel();

$Search_Model_Attribute  = new SearchModel($Session_Attribute);

$Tell_Model_Attribute    = new TellModel();

//View-Attribute

$Browser_View_Attribute = new BrowserView();

$Info_View_Attribute    = new InfoView();

$Reg_View_Attribute     = new RegView();

$Search_View_Attribute  = new SearchView();

$Tell_View_Attribute    = new TellView();

//Controller-Attribute

$Browser_Cont_Attribute = new BrowserController($Browser_View_Attribute, $Browser_Model_Attribute, $Search_Model_Attribute);

$Info_Cont_Attribute    = new InfoController($Browser_View_Attribute, $Info_View_Attribute, $Info_Model_Attribute, $Search_Model_Attribute);

$Reg_Cont_Attribute     = new RegController($Reg_View_Attribute);

$Search_Cont_Attribute  = new SearchController($Search_View_Attribute, $Search_Model_Attribute);

$Tell_Cont_Attribute    = new TellController();

//Main-Attribute

$Main_View_Attribute = new MainView();

//Initiation 
$Search_Start_Function  = $Search_Cont_Attribute->InitiationSearch();
$Search_Browse_Function = $Browser_Cont_Attribute->SearchResult();
$Search_Single_Function = $Info_Cont_Attribute->SingleSearchinitiation();
$Reg_Mail_Function      = $Reg_Cont_Attribute->formMail();
$Main_View_Attribute->viewRender($Search_View_Attribute, $Browser_View_Attribute, $Info_View_Attribute, $Tell_View_Attribute, $Reg_View_Attribute);