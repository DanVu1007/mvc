<?php

namespace mvc;

class Router
{

    static public function parse($url, $request)
    {
        session_start();
        $url = trim($url);
        
        if ($url == "/mvc/") {
            $request->controller = "login";
            $request->action = "login";
            $request->params = [];
        } else if (isset($_SESSION['checklogin']) && ($_SESSION['checklogin'])==true) {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }else{
            $request->controller = "login";
            $request->action = "login";
            $request->params = [];
        }
    }
}
