<?php

class Util
{
    public static function isJson($string) {
        if(!isset($string)) return false;
        if(!is_string($string)) return false;
        if(strlen($string) == 0) return false;

        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public static function returnJSON($out = array()) {
        if(!headers_sent()) header("Content-Type: application/json");
        else error_log("Util::returnJSON called. But headers were already set.");

        echo json_encode($out);
        exit(0);
    }

    public static function getFullPOST()
    {
        $stream = file_get_contents("php://input");

        if (Util::isJson($stream)) $vars = json_decode($stream, true);
        else {
            $vars = array();
            $pairs = explode("&", $stream);

            foreach ($pairs as $pair) {
                $nv = explode("=", $pair);
                $name = urldecode($nv[0]);
                $value = urldecode(str_replace("%0D", "", $nv[1]));

                $vars[$name] = "$value";
            }
        }

        foreach ($vars as $key => $value) {
            $_POST[$key] = $value;
        }

        return $vars;
    }
}

?>