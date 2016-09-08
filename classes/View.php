<?php

class View
extends Storage
{
    private $path;
    
    public function render($template)
    {
        foreach ($this as $k => $v) {
            $$k =  $v;
        }
                
        ob_start();
        
        include $this->makePath($template);
        
        $ret = ob_get_contents();
        ob_clean();
        return $ret;
    }
    
    public function display($template){
        echo $this->render($template);
    }
    
    public function __construct($path = __DIR__ . '/../view')
    {
        $this->path = $path;
    }
    
    private function makePath($template)
    {
        return $this->path . DIRECTORY_SEPARATOR . $template . '.php';
    }

}

