<?php
namespace auth;

class UserManager{
    private $users = [];

    public function addUser(User $user){
        // Add users to the collection (for simplicity, using an array here)

        $this->users[] = $user;
    }

    public function findUserByUsername($username){
        // Find a user by their username in the collection

        foreach($this->users as $user ){
            if($user->getUsername() ===$username){
                return $user;
            }
        }
        return null;
    }
}