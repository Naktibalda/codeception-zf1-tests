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
            'X-Auth-Token' => $this->_request->getHeader('X-Auth-Token'),
            'files' => $this->mapPhpFiles(),
        );
        
        $this->_response
            ->setHeader('Content-Type','application/json')
            ->setBody(json_encode($data));
	
    }



    /**
     * Convert PHP superglobal $_FILES into more sane parameter=value structure
     * This handles form file input with brackets (name=files[])
     *
     * Copied from ZF2: \Zend\Http\PhpEnvironment\Request
     *
     * @return array
     */
    private function mapPhpFiles()
    {
        $files = [];
        foreach ($_FILES as $fileName => $fileParams) {
            $files[$fileName] = [];
            foreach ($fileParams as $param => $data) {
                if (!is_array($data)) {
                    $files[$fileName][$param] = $data;
                } else {
                    foreach ($data as $i => $v) {
                        $this->mapPhpFileParam($files[$fileName], $param, $i, $v);
                    }
                }
            }
        }

        return $files;
    }

    /**
     * Copied from ZF2: \Zend\Http\PhpEnvironment\Request
     *
     * @param array        $array
     * @param string       $paramName
     * @param int|string   $index
     * @param string|array $value
     */
    private  function mapPhpFileParam(&$array, $paramName, $index, $value)
    {
        if (!is_array($value)) {
            $array[$index][$paramName] = $value;
        } else {
            foreach ($value as $i => $v) {
                $this->mapPhpFileParam($array[$index], $paramName, $i, $v);
            }
        }
    }
}

