<?php

class Message {

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function add_user($msg, $tipo = "success")
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

        if (!isset($_SESSION['message_user']))
            $_SESSION['message_user'] = '';

        $_SESSION['message_user'] .= $html;
    }

    public function get_user($return = false, $keep = false)
    {
        if (isset($_SESSION['message_user'])) {
            $message = $_SESSION['message_user'];
            
            if (!$keep) {
                unset($_SESSION['message_user']);
            }
            
            if ($return) {
                return $message;
            } else {
                echo $message;
            }
        }
        
        return false;
    }

    public function add_admin($msg, $tipo = "success")
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

        if (!isset($_SESSION['message_admin']))
            $_SESSION['message_admin'] = '';

        $_SESSION['message_admin'] .= $html;
    }

    public function get_admin($return = false, $keep = false)
    {
        if (isset($_SESSION['message_admin'])) {
            $message = $_SESSION['message_admin'];
            
            if (!$keep) {
                unset($_SESSION['message_admin']);
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
