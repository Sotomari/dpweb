<?php
require_once "./model/views_model.php";

class viewsControl extends viewModel
{ 
    public function getPlantillaControl(){
        return require_once "./view/plantilla.php";
    }

    public function getViewControl()
    {
        session_start();
        if (isset($_SESSION['ventas_id'])) { /*cuando esta activo la vista*/
            
        
        if (isset($_GET["views"])) {
            $ruta = explode("/", $_GET["views"]);
        
            $responce = viewModel::get_view($ruta[0]);
        } else {
            $responce = "index.php";

        }
        
        }else {
            $responce ="login";
        }
         
        return $responce;
    }
}
