<!-- Low Zhi Lok & Lee Kai Mun -->
<?php
class LoginController
{
    public function __construct()
    {
        $db = new OOPdbcon;
        $this->conn = $db->conn;
    }

    public function userLogin($email, $password)
    {
        $checkLogin = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $result = $this->conn->query($checkLogin);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $this->userAuthentication($data);
            return true;
        } else {
            return false;
        }
    }
    private function userAuthentication($data)
    {
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_role'] = $data['role_as'];
        $_SESSION['auth_user'] = [
            'user_id' => $data['id'],
            'user_fname' => $data['fname'],
            'user_lname' => $data['lname'],
            'user_email' => $data['email']
        ];
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['authenticated']) === TRUE) {
            redirect("You are already logged in", "homepage.php");
        } else {
            return false;
        }
    }

    //Logout
    public function logout()
    {
        if (isset($_SESSION['authenticated']) === TRUE) {
            unset($_SESSION['authenticated']);
            unset($_SESSION['auth_user']);
            return true;
        } else {
            return false;
        }
    }
}
