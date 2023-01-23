<?php

final class Session
{
    public static function start(string $status, string $id):void {
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['status'] = $status;
    }

    public static function check():bool {
        return isset($_SESSION);
    }

    public static function getStatus(): ?string {
        if (Session::check()) {
            return $_SESSION['status'];
        }
        return null;
    }

    public static function destroy() {
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"],
                $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
}