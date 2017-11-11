<?php

namespace fritter\mvc\controller;

use fritter\mvc\controller\Controller;

/* 
 * Controller.php
 */

class LoggedInController extends Controller
{
    
    
    
    public function invoke() 
    {
        $this->home();
    }
    
    protected function home() {
        $template = $this->twig->load('home.twig');
        echo $template->render($this->twigarr);        
    }
    
    protected function about() {
        $template = $this->twig->load('about.twig');
        echo $template->render($this->twigarr);        
    }
}
