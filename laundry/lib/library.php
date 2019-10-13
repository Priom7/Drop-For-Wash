<?php

/*
 * Tutorial: PHP Login Registration system
 *
 * Page: Application library
 * */
require __DIR__ . '/../db_connect/config.php';
class DemoLib
{

    /*
     * Register New User
     *
     * @param $name, $email, $username, $password
     * @return ID
     * */

    public function Register($name, $email, $username, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("INSERT INTO users(name, email, username, password,role,status) VALUES (:name,:email,:username,:password,2,1)");
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('MD5', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check Username
     *
     * @param $username
     * @return boolean
     * */
    public function isUsername($username)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * */
    public function isEmail($email)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Login
     *
     * @param $username, $password
     * @return $mixed
     * */
    public function Login($username, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE (username=:username OR email=:username) AND password=:password");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('MD5', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->user_id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * get User Details
     *
     * @param $user_id
     * @return $mixed
     * */
    public function UserDetails($user_id)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id,name,username, email,role,phone,gender,city,address FROM users WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function SiteDetails()
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM settings");
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    
}