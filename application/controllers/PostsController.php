<?php

class PostsController extends Zend_Controller_Action
{

    public function createAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);

        $this->_response->setBody('create post');

    }

    public function showAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);

        $body = 'show post #' . $this->_request->getParam('id');
        $this->_response->setBody($body);
    }
}

