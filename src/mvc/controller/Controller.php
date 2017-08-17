<?php
namespace freest\fritter\mvc\controller;

use freest\fritter\mvc\model\Model as Model;
use freest\router\Router as Router;

use freest\modules\auth as auth;

// Twig modules
use Twig_Environment;
use Twig_Loader_Filesystem;

/* 
 * Controller.php
 * 
 * How does this work?
 * 
 * if isloggedin (or cookie later on):
 *  Go to wall
 * else
 *  login/signup form
 * 
 */

class Controller 
{
    protected $model;
    protected $view;
    
    protected $router;
    
    protected $twig;
    protected $twigarr;
    
    public function __construct() {
        $this->setTwig();
    }
    
    private function setTwig() {
        $loader = new Twig_Loader_Filesystem(ROOT_URL.'src/mvc/view/');
        $this->twig = new Twig_Environment($loader, array(
            'cache' => false
        ));
        $this->twigarr = array('site_title' => SITE_TITLE, 
            'www' => BASE_URL,
            'site_subtitle' => SITE_SUBTITLE);    
    }

    protected function setModel(Model $model) 
    {
        $this->model = $model;
    }
    protected function setView(View $view) 
    {
        $this->view = $view;
    }
    protected function setRouter(Router $router) {
        $this->router = $router;
    }
    
    protected function startRouter() 
    {        
        $router = new Router();
        $router->route('',          '0');
        $router->route('index.php', '0');
        $router->route('articles',  '1');
        $router->route('article',   '1');
        $router->route('fbadmin',   '2');
        $this->router = $router;
    }
    
    public function invoke() 
    {
        $this->startRouter();
        
        switch ($this->router->get()) {
            case '0':
                /*
                 * Home
                 * 
                 * We get x last articles
                 */
                
                if (auth\isLoggedIn()) {
                    $template = $this->twig->load('wall.twig');
                    echo $template->render($this->twigarr);
                }
                else {
                    $template = $this->twig->load('login.twig');
                    echo $template->render($this->twigarr);
                }                
                break;
            case '1':
                // Articles
                echo 'articles';
                break;
            case '2':
                echo 'admin';
                break;
            default:
                //echo $this->router->get();
                echo 'prrr';
                // front
                
        }    
    }
    
}
