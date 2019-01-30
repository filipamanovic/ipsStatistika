<?php

define("BASEURL", "http://localhost:8080/ipsStatistika");

require_once "views/head.php";
$page = "";
if(isset($_GET["page"])):
    $page = $_GET["page"];
endif;
switch ($page){
    case "pocetna":
        include "views/pocetna.php";
    break;
    case "main":
        include "views/main.php";
    break;
    case "pregled":
        include "views/pregled.php";
    break;
    default:
        include "views/pocetna.php";
     break;
}

require_once "views/footer.php";

?>