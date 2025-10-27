<?php
require_once "control/views_control.php";
$view =  new viewsControl();
$view->getPlantillaControl();

/*if ($ruta == 'logout') {
    session_unset();
    session_destroy();
    header("Location: " . BASE_URL . "login");
    exit();
}
    */