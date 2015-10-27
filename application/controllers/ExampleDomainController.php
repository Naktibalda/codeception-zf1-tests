<?php

class ExampleDomainController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);

        $this->_response->setBody('example index page');
    }

    public function subdomainAction()
    {
        $this->view->subdomain = $this->_request->getParam('subdomain');
    }

    public function createPostAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);

        $this->_response->setBody('example2 create post');
    }
}

