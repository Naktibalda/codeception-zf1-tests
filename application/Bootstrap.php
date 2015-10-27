<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRoutes()
    {
        $front = Zend_Controller_Front::getInstance();
        $router = $front->getRouter();

        $router->addDefaultRoutes();

        $postsCreateRoute = new Zend_Controller_Router_Route_Static(
            'posts-create',
            ['controller' => 'posts', 'action' => 'create']
        );
        $router->addRoute('posts.create', $postsCreateRoute);

        $route = new Zend_Controller_Router_Route(
            'posts/:id',
            ['controller' => 'posts', 'action' => 'show']
        );
        $router->addRoute('posts.show', $route);

        $route = new Zend_Controller_Router_Route_Hostname(
            'example.com',
            ['controller' => 'example-domain', 'action' => 'index']);
        $router->addRoute('example.index', $route);

        $route = new Zend_Controller_Router_Route_Hostname(
            ':subdomain.example.com',
            ['controller' => 'example-domain', 'action' => 'subdomain']);
        $router->addRoute('example.subdomain', $route);

        $exampleTwoRoute = new Zend_Controller_Router_Route_Hostname(
            'example2.com',
            ['controller' => 'example-domain', 'action' => 'create-post']);
        $chainedRoute = $postsCreateRoute->chain($exampleTwoRoute);
        $router->addRoute('child.route', $chainedRoute);
    }
}
