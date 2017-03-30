<?php

//------Require_once, Files

//REMINDER: Gona have to use some autoloader here later.

//Controller

require_once("Core-Files/Controller/BrowserController.php");
require_once("Core-Files/Controller/InfoController.php");
require_once("Core-Files/Controller/MainController.php");
require_once("Core-Files/Controller/RegController.php");
require_once("Core-Files/Controller/SearchController.php");

//Model

require_once("Core-Files/Model/BrowserModel.php");
require_once("Core-Files/Model/InfoModel.php");
require_once("Core-Files/Model/RegModel.php");
require_once("Core-Files/Model/SearchModel.php");

//View

require_once("Core-Files/View/BrowserView.php");
require_once("Core-Files/View/InfoView.php");
require_once("Core-Files/View/MainView.php");
require_once("Core-Files/View/RegView.php");
require_once("Core-Files/View/SearchView.php");

//Session

require_once("Core-Files/Session/Session.php");

//Database

require_once("Core-Files/Database/Database.php");

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

$Session_Attribute = new Session();

//Model-Attribute

$Browser_Model_Attribute = new BrowserModel();

$Info_Model_Attribute = new InfoModel();

$Reg_Model_Attribute = new RegModel();

$Search_Model_Attribute = new SearchModel();

//View-Attribute

$Browser_View_Attribute = new BrowserView();

$Info_View_Attribute = new InfoView();

$Reg_View_Attribute = new RegView();

$Search_View_Attribute = new SearchView();

//Controller-Attribute

$Browser_Cont_Attribute = new BrowserController();

$Info_Cont_Attribute = new InfoController();

$Reg_Cont_Attribute = new RegController();

$Search_Cont_Attribute = new SearchController();

//Main-Attribute

$Main_View_Attribute = new MainView();

