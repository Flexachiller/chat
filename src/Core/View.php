<?php

class View{

    public function render(string $template_name, array $params = []){
        $template_path = 'src/Templates/' . $template_name . '.php';

        if(file_exists($template_path)){
            extract($params);

            require($template_path);
        }
    }
}