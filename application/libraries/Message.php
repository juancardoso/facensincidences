<?php

class Message {

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function add($msg, $tipo = "success")
    {
        switch ($tipo) {
            case 'info':
                $html = '<div class="alert alert-info">' . $msg . '</div>';
                break;

            case 'error':
                $html = '<div class="alert alert-danger">' . $msg . '</div>';
                break;

            default:
                $html = '<div class="alert alert-success">' . $msg . '</div>';
                break;
        }

        if (!isset($_SESSION['message']))
            $_SESSION['message'] = '';

        $_SESSION['message'] .= $html;
    }

    public function get($return = false, $keep = false)
    {
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            
            if (!$keep) {
                unset($_SESSION['message']);
            }
            
            if ($return) {
                return $message;
            } else {
                echo $message;
            }
        }
        
        return false;
    }

}
