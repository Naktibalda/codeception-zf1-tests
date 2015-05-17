<?php

class RestController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        
        $data = array(
            'method' => $this->_request->getMethod(),
        );
        
        $this->_response
            ->setHeader('Content-Type','application/json')
            ->setBody(json_encode($data));
	
    }
}

