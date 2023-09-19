<?php
    include "model.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{ 
    $loginController = new login(); $loginController->processLogin();
}

class login 
{
    public function showLoginForm() {
        include 'login_form.php';
    }
    
    public function processLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = strip_tags($username);
        $password = strip_tags($password);
        $username= addslashes($username);
        $password= addslashes($password);
        $userid = $this->authenticateUser($username, $password);
        if ($userid) {
            $model = new model();  
            $user = $model->get_users($userid);
            session_start();
            $_SESSION['user'] = $user;
            header('Location: dashboard.php?uID='.md5($userid));
        } else {
            $error_message = "Tên đăng nhập hoặc mật khẩu không đúng.";
            include 'login_form.php';
        }

    }
    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php');
    }

    private function authenticateUser($username, $password) {
        $model = new model();
        $userid = $model->authentication($username,$password);

        return $userid;
    }
}
?>