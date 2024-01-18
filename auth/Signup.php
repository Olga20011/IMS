<?php 
namespace auth;
use lib\Database;

include_once '../lib/Database.php';

class Signup{
    public $db;
    private $username;
    private $email;
    private $pass;
    private $cpass;
    


    public function __construct($user, $email, $pass, $cpass) {
        $this->db = new Database();
        $this->username = $user;
        $this->email = $email;
        $this->password = $pass;
        $this->cpassword = $cpass;
    }

   
    private function checkUsername($username){
        $sql = "SELECT * FROM signup WHERE username = '$username'";
        $result = $this->db->query($sql);
        return mysqli_num_rows($result);
    }

    private function checkEmail($email){
        $sql = "SELECT * FROM signup WHERE email = '$email'";
        $result =($this->db->query ($sql));
        return mysqli_num_rows($result);
    }
    public function registerUser($username, $email, $pass, $cpass){
        $count_user = $this->checkUsername($username);
        $count_email= $this->checkEmail($email);
        
        if ($count_user === 0 && $count_email === 0 && $pass === $cpass){
        

            $hash= password_hash($pass, PASSWORD_DEFAULT);
            $sql= "INSERT into signup(username, email, password) VALUES('$username' , '$email' , '$hash')" ;
        

            $result = $this->db->query($sql);
            print($result);
            if($result){
                header("Location:../login.php");
                // exit;
            }
        }
    }
}
if(isset($_POST['submit'])){
    echo $_POST['user'];
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    echo "Username: $username, Email: $email, Password: $password, CPassword: $cpassword";


    // $tables = [
    //     'signup' => "username VARCHAR(150) NOT NULL,
    //                  email VARCHAR(150) NOT NULL,
    //                  password VARCHAR(255)"
    // ];

    $signup = new Signup($username, $email, $password, $cpassword);
    // $signup->db->createTable($tables);
    $signup->registerUser($username, $email, $password, $cpassword);
}





