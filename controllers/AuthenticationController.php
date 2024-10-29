<!-- Low Zhi Lok & Lee Kai Mun -->
<?php
// include('config/callOOPdbcon.php');
class AuthenticationController{
    public function __construct()
    {
        $db = new OOPdbcon;
        $this->conn = $db->conn;
        $this->checkIsLoggedIn();
    }

    public function admin(){
        $user_id = $_SESSION['auth_user']['user_id'];
        $checkAdmin = "SELECT id,role_as FROM users WHERE id='$user_id' AND role_as='1' LIMIT 1";
        $result = $this->conn->query($checkAdmin);
        if($result->num_rows == 1){
            return true;
        }else{
            redirect("You are not authorized as admin to access this page", "homepage.php");
        }
    }

    private function checkIsLoggedIn(){
        if(!isset($_SESSION['authenticated'])){
            redirect("Please login to access the page", "login.php");
            return false;
        }else{
            return true;
        }
    }

    public function authDetail(){
        $checkAuth = $this->checkIsLoggedIn();
        if($checkAuth){
            $user_id = $_SESSION['auth_user']['user_id'];

            $getUserData = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
            $result = $this->conn->query($getUserData);
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                return $data;
            }else{
                redirect("Something went wrong", "login.php");
            }
        }else{
            return false;
        }
    }
}

// $authenticated = new AuthenticationController;
?>
