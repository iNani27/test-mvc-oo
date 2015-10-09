<?php

/**
 * Description of UserManagerClass
 *
 * @author webform
 */
class connect {

    public static function verifUser($login, $pass) {

        if ($login === ADMIN_LOGIN && $pass === ADMIN_PWD) {
            $_SESSION['idsession'] = session_id();
            return true;
        } else {
            return false;
        }
    }

    public static function decoUser() {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

// Finalement, on détruit la session.
        session_destroy();
    }

}
