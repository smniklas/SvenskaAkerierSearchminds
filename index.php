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
**/
 
//Database-Attribute

$DatabaseAttribute = new Database();

//Session-Attribute

$SessionAttribute = new Session();

//Model-Attribute

$BrowserModelAttribute = new BrowserModel();
$InfoModelAttribute = new InfoModel();
$RegModelAttribute = new RegModel();
$SearchModelAttribute = new SearchModel();

//View-Attribute

$BrowserViewAttribute = new BrowserView();
$InfoViewAttribute = new InfoView();
$RegViewAttribute = new RegView();
$SearchViewAttribute = new SearchView();

//Controller-Attribute

$BrowserContAttribute = new BrowserController();
$InfoContAttribute = new InfoController();
$RegContAttribute = new RegController();
$SearchContAttribute = new SearchController();

//Main-Attribute

$MainViewAttribute = new MainView();

