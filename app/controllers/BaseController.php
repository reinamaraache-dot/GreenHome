<?php

class BaseController {

    /**
     * @param string 
     * @param array 
     */
    protected function view($view, $data = []) {
        
        $viewPath = ROOT_PATH . 'app/views/' . $view . '.php';

        if (file_exists($viewPath)) {
            extract($data); 
            require_once $viewPath;
        } else {
            die("View file '{$viewPath}' not found.");
        }
    }

}
?>