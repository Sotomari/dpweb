<?php
class viewModel
{
   // Método protegido y estático que devuelve la ruta o nombre de la vista solicitada
    protected static function get_view($view)
    {
        $white_list = ["home", "products", "new-user", "new-categoria", "login", "users", "edit-user"];
    // Verifica si la vista solicitada está en la lista blanca
        if (in_array($view, $white_list)) {
    // Verifica si el archivo PHP correspondiente a la vista existe en la carpeta "view"
            if (is_file("./view/" .$view. ".php")) {
    // Si existe, asigna la ruta completa del archivo para cargarlo
                $content = "./view/".$view.".php";
            } else {
    // Si no existe el archivo, asigna una vista de error 404 (no encontrada)
                $content = "404";
            }
        } elseif ($view == "new-user") {
     // Asigna la vista "new-user" (esto puede usarse para lógica adicional)
            $content = "new-user";
        } elseif ($view == "login") {
            $content = "login";
        } else {
      // Si la vista solicitada no está en lista blanca ni en casos especiales, asigna 404
            $content = "404";
        }
     // Retorna la ruta o nombre de la vista para que el controlador o sistema la cargue
        return $content;
    }
}
