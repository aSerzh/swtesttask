<?php

(new FrontController)->route();

class Template
{
    public function render($template, $input = [])
    {
        ob_start();
        extract($input);
        include($template);
        return ob_get_clean();
    }
}
