<?php

trait DatabaseQueries{

    var $host = 'localhost';
    var $dataBaseName = 'vest';
    var $userName = 'root';
    var $dataBasePassword = '';
    var $dbConnection;

    //connection to data base
    public function connectToDb(){

        $this->dbConnection = mysqli_connect($this->host,$this->userName, $this->dataBasePassword,$this->dataBaseName) or die(mysqli_error($this->dbConnection));

    }

    function createDb($dataBaseName){
        $query = "CREATE DATABASE $dataBaseName";
        $result = $this->runMysqliQuery($query);
        return $result;
    }

    //runs our query
    function runMysqliQuery(string $query){
        //mysqli_query function will excute the query passed to it
        $result = mysqli_query($this->dbConnection, $query);
        if($result){
            return ['error_code'=>0, 'data'=>$result];//no error
        }else{
            return ['error_code'=>1, 'error'=>mysqli_error($this->dbConnection)];//error dey
        }

    }

    function checkUniqueValueInDatabase($table, $columnName, $value){

        $query = "SELECT * FROM $table WHERE $columnName = '$value'";
        $result = $this->runMysqliQuery($query);
        return mysqli_num_rows($result['data']);
     }

     function createUniqueID($tableName, $columnName){
         $unique_id = uniqid();
         $result = $this->checkUniqueValueInDatabase($tableName, $columnName, $unique_id);
         if($result > 0){
             $this->createUniqueID($tableName, $columnName);//recursion
         }else{
             return $unique_id;
         }
     }

     function insertIntoUsersTable($fullname, $username, $email, $number, $password, $con_password, $users_unique_id, $ref_id, $r){

        $query = "INSERT INTO users (id,users_unique_id,fullname,username,email,number,password,con_password,ref_id,referral) VALUES (null, '".$users_unique_id."', '".$fullname."', '".$username."', '".$email."','".$number."','".$password."', '".$con_password."', '".$ref_id."','".$r."')";
         $result = $this->runMysqliQuery($query);
         return $result;

     }

     //hash password
    public function hasHer($password){
        return hash('sha256', md5($password));
    }

    //run login query select
    function loginHandler($email, $password){
        $query = "SELECT * FROM users WHERE password = '$password' AND email = '$email'";
        $result = $this->runMysqliQuery($query);
        return $result;
    }

    function insertIntoUsersTabl($Bitcoin, $Ethereum, $Perfect){

        $query = "INSERT INTO wallet (id,Bitcoin,Ethereum,Perfect) VALUES (null, '".$Bitcoin."', '".$Ethereum."', '".$Perfect."')";
        $result = $this->runMysqliQuery($query);
        return $result;

    }

    function insertIntosuppost($fullname, $email, $message){

        $query = "INSERT INTO support (id,fullname,email,message) VALUES (null, '".$fullname."', '".$email."', '".$message."')";
        $result = $this->runMysqliQuery($query);
        return $result;

    }

    function insertIntoPlans($plan_id, $plan_name, $plan_percent, $plan_duration, $plan_period, $plan_min, $plan_max){

        $query = "INSERT into plan (id,plan_id,plan_name,plan_percent,plan_duration,plan_period,plan_min,plan_max) 
        VALUES(null, '".$plan_id."', '".$plan_name."', '".$plan_percent."', '".$plan_duration."', '".$plan_period."', '".$plan_min."', '".$plan_max."')";
        $result = $this->runMysqliQuery($query);
        return $result;

    }

    function insertintoSetting($site_name, $short_name, $email, $phone, $address, $desccription, $refpercent, $imageName, $livechatcode){

        $query = "INSERT into settings (id,site_name,short_name,email,phone,address,description,refpercent,companylogo, livechatcode) VALUES(
            null, '".$site_name."', '".$short_name."', '".$email."', '".$phone."', '".$address."', '".$desccription."', '".$refpercent."', '".$imageName."', '".$livechatcode."'
        )";
        //print_r($query); die();

        $result = $this->runMysqliQuery($query);
        return $result;

    }

    function insertintoPaymentMethod($payment_method, $payment_address){

        $query = "INSERT into wallet (id,payment_method,payment_address) VALUES(null, '".$payment_method."', '".$payment_address."')";

        $result = $this->runMysqliQuery($query);

        return $result;
    }

    function insertIntoadminTable($fullname,$username,$password,$pay_account,$email,$admin_id){
        $query = "INSERT INTO admin (id,admin_id,first_name,username,password,wallet,email) VALUES (null ,'".$admin_id."','".$fullname."','".$username."','".$password."','".$pay_account."','".$email."')";
        $result = $this->runMysqliQuery($query);
        return $result;

    }








}

?>
