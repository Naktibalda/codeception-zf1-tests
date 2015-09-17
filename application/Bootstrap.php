<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRoutes()
    {
        $front = Zend_Controller_Front::getInstance();
        $router = $front->getRouter();

        $router->addDefaultRoutes();

        $route = new Zend_Controller_Router_Route_Static(
            'posts-create',
            ['controller' => 'posts', 'action' => 'create']
        );
        $router->addRoute('posts.create', $route);

        $route = new Zend_Controller_Router_Route(
            'posts/:id',
            ['controller' => 'posts', 'action' => 'show']
        );

        $router->addRoute('posts.show', $route);
    }
} 
