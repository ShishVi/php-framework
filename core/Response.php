<?php

namespace coreFramework;

class Response
{
    public function setResponseCode(int $code){
        http_response_code($code);
    }

    public function redirect(){
        return true;
    }
    
}


?>