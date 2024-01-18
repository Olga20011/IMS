<?php
        namespace auth;
        use lib\Database;

        include_once '../lib/Database.php';
        include_once 'UserManager.php';

        class User {
            private $username;
            private $password;
        
            public function __construct($username, $password) {
                $this->username = $username;
                $this->password = $password;
            }
        
            public function getUsername() {
                return $this->username;
            }
        
            public function getPassword() {
                return $this->password;
            }
        
            public function validateUser(User $user, UserManager $userManager) {
                // Check if the username and password are not empty
                if ($this->username !== "" && $this->password !== "") {
                    $existingUser = $userManager->findUserByUsername($this->username);
        
                    // Validate the password using password_verify
                    return ($existingUser && password_verify($this->password, $existingUser->getPassword()));
                }
        
                return false;
            }
        }
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                // Handle user registration
                $username = $_POST["username"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
        
                $user = new User($username, $password);
                $userManager = new UserManager();
                $userManager->addUser($user);
        
                header("Location: ../welcome.php");
                exit;
            } elseif (isset($_POST["submit"])) {
                // Handle login form submission
                $username = $_POST["username"];
                $password = $_POST["password"];
        
                $user = new User($username, $password);
                $userManager = new UserManager();
        
                if ($user->validateUser($user, $userManager)) {
                    // Successful login, perform further actions or redirect
                    echo "Login successful!";
                } else {
                    // Failed login, display an error message
                    echo "Invalid credentials!";
                }
            }
        }



        