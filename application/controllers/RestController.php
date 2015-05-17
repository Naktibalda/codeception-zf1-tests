<?php

class RestController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        
        $data = array(
            'requestMethod' => $this->_request->getMethod(),
            'requestUri' => $this->_request->getRequestUri(),
            'queryParams' => $this->_request->getQuery(),
            'formParams' => $this->_request->getPost(),
            'rawBody' => $this->_request->getRawBody(),
            'headers' => $this->_request->getHeaders(),
        );
        
        $this->_response
            ->setHeader('Content-Type','application/json')
            ->setBody(json_encode($data));
	
    }
}

