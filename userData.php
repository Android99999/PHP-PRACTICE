<?php

class UserInfo {
    private $firstname;
    private $lastname;
    private $name;
    private $email;
    private $password;

    public function set_firstname($firstname) {
        $this->firstname = $firstname;
    }
    public function set_lastname($lastname) {
        $this->lastname = $lastname;
    }
    public function set_name() {
        $this->name = $this->firstname . " " . $this->lastname;
    }
    public function set_email($email) {
        $this->email = $email;
    }
    public function set_password($password) {
        $this->password = $password;
    }


    public function get_firstname(){
        return $this->firstname;
    }
    public function get_lastname(){
        return $this->lastname;
    }

    public function get_name(){
        return $this->name;
    }
    public function get_email(){
        return $this->email;
    }

    public function get_password(){
        return $this->password;
    }
}


?>