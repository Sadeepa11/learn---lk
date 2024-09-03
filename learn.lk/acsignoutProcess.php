<?php

session_start();

if(isset($_SESSION["acu"])){
    $_SESSION["acu"]=null;
    session_destroy();

    echo("success");
}

?>