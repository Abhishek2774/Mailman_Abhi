<?php
class Database
{
    // for server
    private $db_host = "localhost";
    private $db_user = "tse"; 
    private $db_pass= "bPmtHasjyTJ2SgZJ"; 
    private $db_name ="abhishek";

    // for local
   // private $db_host = "localhost";
    // private $db_user = "root";
    // private $db_pass = "hestabit";
    // private $db_name = "abhishek";

    private $conn = false;
    public $mysqli = "";
    private $result = array();

    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }



    //trash email by Sender (status = 0 ) kr dena
    public function Trash_email_by_sender($table, $param = array())
    {
        $login_user = $param['session_email'];
        $id = $param['id'];

        $sql = "UPDATE All_emails SET sender_status=0  WHERE sender_email='{$login_user}' AND id=$id";

        $result = $this->mysqli->query($sql) or die("Query failed");
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    //Trash Email by reciver (status = 0) kr dena  

    public function Trash_email_by_reciver($table, $param = array())
    {
        $login_user = $param['session_email'];
        $id = $param['id'];

        $sql = "UPDATE All_emails SET reciver_status=0  WHERE reciver_email='{$login_user}' && id=$id";

        $result = $this->mysqli->query($sql) or die("Query failed");
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    // check User are Registerd or not when I fill compose form

    public function InboxMails($table, $param)
    {
        $sql = "SELECT * FROM $table WHERE reciver_email='$param'";

        $result = $this->mysqli->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                return json_encode(["msg" => "User Registerd", "status" => true]);
            } else {
                return json_encode(["msg" => "User not Registerd", "status" => false]);
            }
        }
    }
    // check Email is allready Exist or Not

    public function fetch_email($table, $param)
    {

        $sql = "SELECT * FROM $table WHERE email='$param'";

        $Exist_email = $this->mysqli->query($sql);
        if ($Exist_email) {
            if ($Exist_email->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Call This function for fatch username & profile from database

    public function desh_profile($table, $param)
    {

        $sql = "SELECT * FROM $table WHERE email='$param' || username='$param'";
        $profile_username = $this->mysqli->query($sql);
        if ($profile_username) {
            if ($profile_username->num_rows > 0) {
                while ($row = $profile_username->fetch_assoc()) {
                    return $row;
                }
            }
        }
    }

    // Check Reciver are Exist or not after send Emails

    public function Isreciver($table, $param)
    {
        $sql = "SELECT * FROM $table WHERE email='$param'";
        $result = $this->mysqli->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                return json_encode(["msg" => "User Registerd", "status" => true]);
            } else {
                return json_encode(["msg" => "User not Registerd", "status" => false]);
            }
        }
    }

    // call this function for Login using Email/User && password 

    public function login_user($table, $param = array())
    {
        $email = $param["email"];
        $pass = $param["pass"];

        $sql = "SELECT * FROM $table WHERE (email= '$email' OR username='$email') AND pass='$pass'";
        $res = $this->mysqli->query($sql);
        if ($res) {
            if ($res->num_rows > 0) {
                array_push($this->result, "User Login Successfully");
                $_SESSION['email'] = $email;
                return true;
            } else {
                array_push($this->result, "<p class='text-light bg-dark'>Please check your Email/username & password</p>");
                return false;
            }
        }
    }

    // call this function for Registerd user Insert form-data in Table

    public function insert($table, $param = array())
    {

        if ($this->tableExists($table)) {
            $table_column = implode(', ', array_keys($param));
            $table_value = implode("', '", $param);
            $sql = "INSERT INTO $table ($table_column) VALUES ('$table_value')";
            if ($this->mysqli->query($sql)) {
                array_push($this->result, "Registerd Successfully");
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    //Reset password
    public function reset_password($table, $param = array())
    {

        $newpass = $param['pass'];
        $cpass = $param['cpass'];
        $login_Email = $param['login'];
        $sql = "UPDATE $table SET pass='$newpass',cpass='$cpass' WHERE email='$login_Email'";
        if ($this->mysqli->query($sql)) {
            return true;
        }
    }

    //All Email send And store data in database
    public function all_email_store($table, $param = array())
    {
        // print_r($param);
        $table_column = implode(', ', array_keys($param));
        $table_value = implode("', '", $param);
        echo  $sql = "INSERT INTO $table ($table_column) VALUES ('$table_value')";
        if ($this->mysqli->query($sql)) {
            return true;
        } else {
            return false;
        }
    }



    public function dalete()
    {
    }
    public function update_profile($table, $param = array())
    {
        //     $session_email = $param['Email_id'];
        //     $profile_fname = $param['fname'];
        //     $profile_lname= $param['lname'];
        //     $profile_remail = $param['remail'];
        //     $image_pic = $param['image'];

        //     $sql = "UPDATE Reg_userid SET fname='$profile_fname',lname=' $profile_lname',remail='$profile_remail',image='$image_pic'  WHERE email='$session_email'";
        //    $result = $this->mysqli->query($sql) or die('Query failed');
        //     if($result){
        //         return true;
        //     }else{
        //         array_push($this->result,"data not update");
        //         return false;
        //     }
    }
    //check table Exist or Not
    private function tableExists($table)
    {
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            } else {
                array_push($this->result, "This table" . " " . $table . " " . "Does Not Exist in database");
                return false;
            }
        }
    }

    // function for show all Error And success
    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    public function _destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                return true;
            }
        } else {
            return false;
        }
    }
}
