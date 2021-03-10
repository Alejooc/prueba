<?php
    function autoload($clase) {
      require_once(__DIR__."/".$clase.".php");
    }
    spl_autoload_register("autoload");
 
?>