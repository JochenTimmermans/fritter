<?php

namespace fritter\mvc\controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

use freest\router\Router as Router;

use fritter\mvc\model\UserModel;

/* 
 * Controller.php
 */

class Controller 
{
    protected $twig;
    protected $twigarr;
    
    protected $db;
    
    protected $router;
    
    public function __construct() 
    {
        // firing up Twig
        $loader = new Twig_Loader_Filesystem(ROOT_URL.'src/mvc/view/');
        $this->twig = new Twig_Environment($loader, array('cache' => false));
        $this->twigarr_init();    
        // router   
        $this->startRouter();
    }
        
    protected function startRouter() 
    {        
        $router = new Router();
        $router->route('about',    '1');
        $this->router = $router;
    }
    private function twigarr_init()
    {        
        $this->twigarr['site_title'] = SITE_TITLE;
        $this->twigarr['www'] = WWW;
    }
    
    
    public function invoke() 
    {
        if (!UserModel::isLoggedIn()) {
            $check = UserModel::loginformCheck();
        }
        
        if (UserModel::isLoggedIn()) {
            $lic = new LoggedInController();
            $lic->invoke();
            exit();
        }
        
        if ($this->router->get() == '1') {
            $this->about();
        }
        else {
            switch($check['status']) {
                case '1':                    
                    header("Location: ".www);
                case "warning":
                    $this->twigarr['warning'] = $check['warning'];
                    $this->front();
                default:
                    $this->front();
            }
        }
    }
    
    protected function front() {
        $template = $this->twig->load('front.twig');
        echo $template->render($this->twigarr);        
    }
    
    protected function about() {
        $template = $this->twig->load('about.twig');
        echo $template->render($this->twigarr);        
    }
}
