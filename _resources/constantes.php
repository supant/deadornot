<?php
define ('NO_REPLY_MAIL',"noreply@site7.org");

// Retour
define ('RETOUR_OK',1);
define ('RETOUR_ERREUR',0);
define ('RETOUR_ALERT',2);

// Pages  

// Dates
define('DATE_MYSQL',"Y-m-d H:i:s");
define('DATE_HTML',"d/m/Y H:i");
define('DATE_HTML_5',"Y-m-d H:i");
define('DATE_DUREE',"H:i");
define('DATE_MYSQL_DATE',"Y-m-d");
define('DATE_HTML_T',"Y-m-d\TH:i");
define('DATE_HTML_T_SEC',"Y-m-d\TH:i:s");


//define('ROOT',"/EclipsePhpWorkSpace/deadornot/"); //Antoine boulot
//define('ROOT',"/WorkspaceEclipsePhp/deadornot/"); //Antoine maison
//define('ROOT',"/deadornot/"); //Arthur
define('ROOT',"/dond/"); //production
define('PAGE_MENU',ROOT."menu/menu.php");
define('PAGE_LISTRESULT',ROOT."listresult/listresult.php");
define('PAGE_FICHE',ROOT."fiche/fiche.php");
define('PAGE_QUIZ',ROOT."quiz/quiz.php");
define('PAGE_NOINFO',ROOT."noinfo/noinfo.php");
define('PAGE_ABOUT',ROOT."about/about.php");


define('COLOR_AVAILABLE', "#adadad");
define('COLOR_SELECTED', "#19c424");

define('FICHIER_OK',"./../ok.txt");
define('FICHIER_KO',"./../ko.txt");

?>