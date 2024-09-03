<?php

session_start();

if(isset($_SESSION["tu"])){
    $_SESSION["tu"]=null;
    session_destroy();

    echo("success");
}

?>