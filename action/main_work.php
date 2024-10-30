<?php
ob_start();
session_start();
require_once ('DatabaseQueries.php');
require_once ('validationManager.php');
require_once ('FileHandler.php');



class main_work{

    use DatabaseQueries, validationManager, FileHandler;

    function __construct()
    {
        $this->connectToDb();
        $this->callFunctions();
        
    }
    function callFunctions(){
        if (isset($_GET["option"])) {
            
           
            switch ($_GET["option"]){

                case 'register':
                    $this-> registerform();
                    break;
                case 'update':
                    $this-> updateuser();
                    break;
                case 'login':
                    $this-> login();
                    break;
                case 'support':
                    $this-> support();
                    break;
                case 'get_client_ip':
                    $this->get_client_ip();
                    break;
                case 'upload_image':
                    $this->uploadPassport();
                    break;
                case 'delete_image':
                    $this->deletePassport();
                    break;
                case 'deposit':
                    $this-> deposit();
                    break;
                case 'withdraw':
                    $this->withdraw();
                    break;
                case 'withdrawamount':
                    $this->withdrawAmount();
                    break;
                case 'upgrate':
                    //call the function that will process the form
                    $this->reinvest();
                    break;
                case 'registers':
                    $this-> adminregister();
                    break;
                case 'delete':
                    //call the function that will process the form
                    $this->manageAccount();
                    break;
                case 'deletepl':
                    $this->manageAccount();
                    break;
                case 'block':
                    //call the function that will process the form
                    $this->manageAccounts();
                    break;
                case 'unblock':
                    //call the function that will process the form
                    $this->manageAccountss();
                    break;
                case 'pending':
                    //call the function that will process the form
                    $this->managewithdraw();
                    break;
                case 'deletel':
                    //call the function that will process the form
                    $this->managewithdraw();
                    break;
                case 'updateplan':
                    $this->updateplan();
                    break;
                case 'cpending':
                    $this->withdawstatus();
                    break;
                case 'cconfirmed':
                    $this->withdawstatus();
                    break;
                case 'cdeletel':
                    $this->withdawstatus();
                    break;
                case 'confirmed':
                    //call the function that will process the form
                    $this->managewithdr();
                    break;
                case 'deleteled':
                    //call the function that will process the form
                    $this->manageusers();
                    break;
                case 'pendingi':
                    //call the function that will process the form
                    $this->manageuser();
                    break;
                case 'confirmedi':
                    //call the function that will process the form
                    $this->manageuse();
                    break;
                case 'delete2':
                    //call the function that will process the form
                    $this->managereff();
                    break;
                case 'pendiing':
                    //call the function that will process the form
                    $this->manageref();
                    break;
                case 'confiirmed':
                    //call the function that will process the form
                    $this->managere();
                    break;
                case 'wallet':
                    //call the function that will process the form
                    $this->addwallet();
                    break;
                case 'wallet_update':
                    //call the function that will process the form
                    $this->updatewallet();
                    break;
                case 'enter_email':
                    $this-> enteremail();
                    break;
                case 'password_reset':
                    $this-> enternewpassword();
                    break;
                case 'admin':
                    //call the function that will process the form
                    $this->updateadmin();
                    break;
                case 'add':
                    //call the function that will process the form
                    $this->add();
                    break;
                case 'remove':
                    //call the function that will process the form
                    $this->remove();
                    break;
                case 'withdrawBonus':
                    $this->withdrawBonus();
                    break;
                case 'delete4':
                    //call the function that will process the form
                    $this->manbonus();
                    break;
                case 'pendiiing':
                    //call the function that will process the form
                    $this->manabonus();
                    break;
                case 'confiiirmed':
                    //call the function that will process the form
                    $this->managbonus();
                    break;
                case 'logout':
                    //call the function that will process the form
                    $this->logout();
                    break;
                case 'deletellll':
                    //call the function that will process the form
                    $this->managesupport();
                    break;
                case 'addcompany':
                    //call addcom details
                    $this->addCompany();
                    break;
                case 'wallet':
                    //call addcom details
                    $this->addwallet();
                    break;
                case 'addplan':
                    //call addcom details
                    $this->addplan();
                    break;

            }
        }
    }

    //GENERATE RANDOM NUMBER
    function randomNumber($length = 25) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function registerform(){

       $fullname= $_SESSION['fullname']=mysqli_real_escape_string($this->dbConnection, $_POST['fullname']);
      
       $username= $_SESSION['username']=mysqli_real_escape_string($this->dbConnection, $_POST['username']);
       $number= $_SESSION['number']=mysqli_real_escape_string($this->dbConnection, $_POST['number']);
       $password= $_SESSION['password']=mysqli_real_escape_string($this->dbConnection, $_POST['password']);
       $con_password= $_SESSION['con_password']=mysqli_real_escape_string($this->dbConnection, $_POST['con_password']);
      
       //    $password2= $_SESSION['password2']=mysqli_real_escape_string($this->dbConnection, $_POST['password2']);
       $email= $_SESSION['email']=mysqli_real_escape_string($this->dbConnection, $_POST['email']);
    //   print_r($email); die();
        $referral = $_SESSION['Ref']=mysqli_real_escape_string($this->dbConnection, $_POST['Ref']);
        $thingsToValidate = [
            $fullname.'|FullName|fullname|empty',
            $username.'|Username|username|empty',
            $email.'|Email|email|empty',
            $number.'|Number|number|empty',
            $password.'|Password|password|empty',
            $con_password.'|Confirm|con_password|empty'
            // $password2.'|Password2|password2|empty'
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../register');
            return;
        }
        //           print_r($thingsToValidate); die();
        
        
        $usernameUniqueness = $this->checkUniqueValueInDatabase('users', 'username', $username);
        if($usernameUniqueness > 0){
            $_SESSION['formError'] = ['general_error'=>['Username exists']];
            header('location:../register');
            return;
        }
        
        if ($password != $con_password) {
            # code...
            $_SESSION['formError'] = ['general_error'=>['Passwords does not match']];
            header('location:../register');
            return;
            
        }
        
        $emailUniqueness = $this->checkUniqueValueInDatabase('users', 'email', $email); 
        if($emailUniqueness > 0){
            $_SESSION['formError'] = ['general_error'=>['Email Address exists']];
            header('location:../register');
            return;
        }
        // print_r($r); die();
        
        $users_unique_id = $this->createUniqueID('users', 'users_unique_id');
        
        $ref_id  = $this->randomNumber(5);
        
        $hashedPasword = $this->hasHer($password);

        $chashedPasword = $this->hasHer($con_password);

        
        $createuse = $this->insertIntoUsersTable($fullname, $username, $email,$number, $hashedPasword, $chashedPasword, $users_unique_id, $ref_id, $referral);
        if ($createuse['error_code'] == 1){
                $_SESSION['formError']=['general_error' =>[$createuse['error']] ];
            header('location:../register');
            return;
        }
        
        $a = $this->displayCompanydetailsPicSiteName();

        $CompanyName = $_SESSION['short_name'];
        $SiteName = $_SESSION['site_name'];
        $SiteEmail = $_SESSION['semail'];
        $CompanyPhone = $_SESSION['phone'];
        $CompanyAddress = $_SESSION['address'];
        $CompanyDescription = $_SESSION['description'];
        $CompanyRefpercent = $_SESSION['refpercent'];
        $CompanyLogo = $_SESSION['companylogo'];

        //print_r($CompanyName); die();

        if ($createuse){
            $to  = $email;
            $d = date('Y');
            $subject = "Welcome To $SiteName";
            $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                                <div style="font-size: 14px;">
                                <p>Welcome and congratulations on joining '.$CompanyName.' Your account has been confirmed. You can now <a href="https://www.'.$CompanyName.'.com/login">Login</a> to your account using your registered password.<br>
                                Get ready to participate in profitable investment!.</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    '.$CompanyName.' Team<br />
                    Email: support'.$SiteEmail.'<br /></p>
				
                    <div style="background-color:rgb(253, 150, 26);
                    float:left;
                    width:80%;
                    border:1px solid rgb(253, 150, 26);
                    border-radius:0px 0px 3px 3px;
                    padding-left:10% ;
                    padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
            </div>
            </body>
            </html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: '.$CompanyName.' <support@'.$SiteName.'.com>' . "\r\n";
            $retval = @mail($to,$subject, $message, $header);
            if ($retval = true) {
                header('location:../register?success=Registration was successful');
                // header("location:login.php");
            }
            //print_r($createuse); die();
            
            else {
                return  'Internal error. Mail fail to send';
            }
            header('location:../register?success=Registration was successful');
        }
        
        $to  = ''.$SiteEmail.'';
        $d = date('Y');
        $subject = "Welcome To $CompanyName";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
                <h6 align="center"><img style="height:90px;" src="https://www.'.$SiteName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.' "/></h6>
                <div style="font-size: 14px;">
    <p>'.$username.'. has Successfully Register on '.$CompanyName.'.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$CompanyName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: '.$CompanyName.' <support@'.$SiteName.'.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
        header("loction:../register?success=Registration was successful");
        
        } else {
            return  'Internal error. Mail fail to send';
        }
        header("location:../register?success=Registration was successful");

        //using a person ref id send email to d person dat referred him
        if ($createuse){
            $dsr = "SELECT * FROM users WHERE ref_id = '$ref_id'";
            $resu = $this->runMysqliQuery($dsr);
            if($resu['error_code'] == 1){
                return $resu['error'];
            }
            $resul = $resu['data'];
            if(mysqli_num_rows($resul) > 0) {
                while($row = mysqli_fetch_assoc($resul)){
                    $r = $row['referral'];
                }
            }
            $dsrs = "SELECT * FROM users WHERE ref_id = '$r'";
            $resus = $this->runMysqliQuery($dsrs);
            if($resus['error_code'] == 1){
                return $resus['error'];
            }
            $result = $resus['data'];
            if(mysqli_num_rows($result) == 0){
                return 'no';
            }else{
                while($row = mysqli_fetch_array($result)){
                    $refemail = $row['email'];
                    $refname = $row['username'];
                }
                
                $to  = $refemail;
                $d = date('Y');
                $subject = "Welcome To $CompanyName";
                $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body> 
                    <h6 align="center"><img style="height: 90px;" src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.' "/></h6>
                    <div style="font-size: 14px;">
					<p>Hello '.$refname.' <br>
						You Reffered : '.$fullname.' <br> you will receive 10% each time he makes a deposit.</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    '.$CompanyName.' Team<br />
                    Email: support@'.$SiteEmail.'<br /></p>

			<div style="background-color:rgb(253, 150, 26);
						float:left;displayCompanydetailsPicSiteName
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        '.$CompanyName.'.<br>
				
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;'.$CompanyName.' . All Rights Reserved.</p>
		</div>
		</body>
		</html>';
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: '.$CompanyName.' <support@'.$SiteName.'.com>' . "\r\n";
                $retval = @mail($to, $subject, $message, $header);
                if ($retval = true) {
                    return  'Verification Mail sent successfully?success=Registration was successful';
                    // header("location:login.php");
                } else {
                    return  'Internal error. Mail fail to send';
                }
                header('location:../register?success=Registration was successful');

            }

        }
        header("location:../register?success=Registration was successful");

        // header("location:../users/dashboard.php?come=$users_unique_id");
    }

    function login(){
        $email = $_SESSION['email'] = mysqli_real_escape_string($this->dbConnection, $_POST['email']);
        $password = $_SESSION['password'] = mysqli_real_escape_string($this->dbConnection, $_POST['password']);
        
        $thingsToValidate = [
            $email.'|Email|email|empty',
            $password.'|Password|password|empty'
        ];
        $validationStatus = $this->callValidation($thingsToValidate);
        // print_r($back);die();
        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../login');
            return;
        }
        //print_r($validationStatus); die();
        $hashedPasword = $this->hasHer($password);
        //print_r($calllogin);die();
        
        $calllogin = $this->loginHandler($email,$hashedPasword);
        
        if ($calllogin['error_code']== 1 ){
            $_SESSION['formError'] = ['general_error'=>[$calllogin['error']]];
            header('location:../login');

        }
        $queryResult = $calllogin['data'];
        
        if(mysqli_num_rows($queryResult) == 1){
            //create the login sessions
            
            while($row = mysqli_fetch_object($queryResult)){
                $users_unique_id = $row->users_unique_id;
                $fullname = $row->fullname;
                $email = $row->email;
                $username = $row->username;
                $ref_id = $row->ref_id;
                $r = $row->referral;
                $bal = $row->balance;
                $imageName = $row->image_name;
                // $main_amount = $row->main_amount;
                $_SESSION['userUniqueId'] = $users_unique_id;
                $_SESSION['userFullname'] = $fullname;
                $_SESSION['referral'] = $r;
                $_SESSION['userEmail'] = $email;
                $_SESSION['userUsername'] = $username;
                $_SESSION['userRef_id'] = $ref_id;
                // $_SESSION['Referral'] = $r;
                $_SESSION['imageName'] = $imageName;
                $_SESSION['balance'] = $bal;
                //  $_SESSION['main_amount'] = $main_amount;
                $typeOfUser = $row->type_of_user;
                //print_r($_SESSION['userUsername']); die();
                
                
            }
            //print_r($typeOfUser); die();
            if($typeOfUser === 'users'){
                //redirect the user to admin dashboard
                //$users_unique_id = $_SESSION['userUniqueId'];
                header("location:../users/dashboard?come=$users_unique_id");
            }else{
                //redirect the user to his dashboard
                header('location:../admin/dashborad_1');
            }
        }else{
            $_SESSION['formError'] = ['general_error'=>['Incorrect Username/Email or Password']];
            header('location:../login');
        }

    }
    function valdateSession($foider){
        if(!isset($_SESSION['userUniqueId'])){
            $_SESSION['formError'] = ['general_error'=>['Please Login to continue']];
            //print_r($_SESSION['formError']); die();
            header('location:'.$foider);
        }
    }

    function valdatereff($foider){
        if(!isset($_SESSION['userRef_id'])){
            $_SESSION['formError'] = ['general_error'=>['Please Login to continue']];
            //print_r($_SESSION['formError']); die();
            header('location:'.$foider);
        }
    }

    function getLoggedInUserDetails($userID){
        $query = "SELECT * FROM users WHERE users_unique_id = '$userID'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            return $row;
        }
        // print_r($query); die();

    }
    function getLoggedInUserreff($userID){
        $query = "SELECT * FROM users WHERE ref_id = '$userID'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            return $row;
        }
        // print_r($query); die();

    }

    function updateuser()
    {
        $fullname = mysqli_real_escape_string($this->dbConnection, $_POST['fullname']);
        $username = mysqli_real_escape_string($this->dbConnection, $_POST['username']);
        $email = mysqli_real_escape_string($this->dbConnection, $_POST['email']);
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['userId']);

        $thingsToValidate = [
            $fullname.'|FullName|fullname|empty',
            $username.'|Username|username|empty',
            $email.'|Email|email|empty',
        ]; 
        
        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../users/update');
            return;
        }


        $query = "UPDATE users SET fullname = '$fullname', username = '".$username."', email = '$email' WHERE users_unique_id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error']]];
            header("location:../users/update");
            return;
        }
        header ('location:../users/update?&success=Profile was updated successfully');
    }

    function alluser(){
        $UserDetails = [];
        $query = "SELECT * FROM users";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    
    //lets see comp livechatlinkaddress here
    function displayCompanylivechatcode(){

        $compdetails = [];

        $query = "SELECT * FROM settings";
        $result = $this->runMysqliQuery($query);

        if($result['error_code']  == 1){
            header('location:../admin/dashboard_1');
            //return $result['error'];
        }
        $data = $result['data'];

        while ($a = mysqli_fetch_array($data)) {
            # code...
            //$compdetails[]
            $shortname =  $_SESSION['short_name'] = $a['short_name'];
            $site_name = $_SESSION['site_name'] = $a['site_name'];
            $email = $_SESSION['semail'] = $a['email'];
            $phone = $_SESSION['phone'] = $a['phone'];
            $address = $_SESSION['address'] = $a['address'];
            $description = $_SESSION['description'] = $a['description'];
            $refpercent = $_SESSION['refpercent'] = $a['refpercent'];
            $companylogo = $_SESSION['companylogo'] = $a['companylogo'];
            $livechatcode = $_SESSION['livechatcode'] = $a['livechatcode'];

            
           return $livechatcode;
        }
    
    }
    function allreferral(){
        $UserDetails = [];
        $query = "SELECT * FROM referral_tb	";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function url(){
        $url = "https://blockchain.info/stats?format=json";
        $stats = file_get_contents($url);
        $json = json_decode($stats,true);
        $btcvalum = $json['market_price_usd'];
        $_SESSION['btc_value'] = $btcvalum;
        return $btcvalum;
    }
    /* function BTC($amount){
         $btcValue = $this->url();
         $currBTC = $amount / $btcValue;
         return $currBTC;de
     }*/

    function addprofit(){

        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed'";
        $result = $this->runMysqliQuery($query);

        if($result['error_code'] == 1){
            return $result['error'];
        }
        $data = $result['data'];
        //print_r($result); die();

        if($data){
            //the Iteration is running but its nt getting d last value 1 = 0 + 1
            while ($a = mysqli_fetch_object($data)) {
                # code...
                $d = $a->amount;
                $interest = $a->interest;
                $id = $a->id;
                $p = $a->plan_percent;
                $userId = $a->users_unique_id;

                //I got d daily profit by multiplying d amount gotten 
                //* the percentage and dividing it by 100
                $dayprofit = ($d * $p) / 100;

                //nw lets update the interest in d user deposit to d new value
                $newint = $dayprofit + $interest;

                //we have gotten d interest nw run a simple update
                $query = "UPDATE deposit_tb SET interest = '".$newint."' WHERE status = 'confirmed' AND id = '".$id."'";
                $result = $this->runMysqliQuery($query);

                if($result){
                    header("location:../users/select_all_deposit?come=$userId");
                }
            }
        }

       
   // $dayInt = $dayprofit / 100;
   // $dayInt = ($amount/100) * $plan_percent;

     
    }

    
    function deposit()
    {
        $plan = $_SESSION['plan'] = mysqli_real_escape_string($this->dbConnection, $_POST['plan']);
        $btc = $_SESSION['coin'] = mysqli_real_escape_string($this->dbConnection, $_POST['coin']);
        $amount = $_SESSION['amount'] = mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
        $referral = $_SESSION['referral'] = mysqli_real_escape_string($this->dbConnection, $_POST['referral']);
        //$btc_amount = $_SESSION['planpercent'] = mysqli_real_escape_string($this->dbConnection, $_POST['planpercent']);
        
        //I created a constant that holds the company details
        
        
        $thingsToValidate = [
            //$plan . '|Plan|plan|empty',
            $btc . '|Coin|coin|empty',
            $amount . '|Amount|amount|empty',
            
        ];

        $res = $this->selectparticularplandetails($plan);
        foreach ($res as $key => $value) {
            # code...
            $planmin = $value->plan_min;
            $planmax = $value->plan_max;
            $plan_percent = $value->plan_percent;

        }
       
       // echo $CompanyName; die();
       $CompanyName = $_SESSION['short_name'];
        $SiteName = $_SESSION['site_name'];
        $SiteEmail = $_SESSION['semail'];
        $CompanyPhone = $_SESSION['phone'];
        $CompanyAddress = $_SESSION['address'];
        $CompanyDescription = $_SESSION['description'];
        $CompanyRefpercent = $_SESSION['refpercent'];
        $CompanyLogo = $_SESSION['companylogo'];
        
        $validationStatus = $this->callValidation($thingsToValidate);
        if ($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../users/deposit');
            return;
        }
        
        $deposit_id = $this->createUniqueID('deposit_tb', 'deposit_id');
        $ref_id = $_SESSION['userRef_id'];
        $bal = $_SESSION['balance'];
       // print_r($ref_id); die();
       
        
        $users_unique_id = $_SESSION['userUniqueId'];
        $username = $_SESSION['userUsername'];
        $btc_amount = 0;
        $email = $_SESSION['userEmail'];
     //print_r($_SESSION['referral']); die();

        if($plan === $plan  &&( $amount > $planmax ||  $amount < $planmin) ){
            $_SESSION['formError'] = ['general_error'=>["Please Amount should be between $planmin-$planmax"]];
            header('location:../users/deposit');
            return;
      }
    
        $fileUpload = $this->FileUploader('fileToUpload', ['jpg', 'png', 'gif', 'jpeg'], 2000000, '3megabyte', '../images/');
        if($fileUpload['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[$fileUpload['error']]];
            header('location:../users/deposit');
            return;
        }
        $imageName = $fileUpload['data'];
       // print_r($imageName); die();

        if($referral){

            $ref = 0;
        }else {
            $ref = "";
        }
        
        $query = "INSERT INTO deposit_tb (id,users_unique_id,deposit_id,username,email,plan,coin_type,referral,ref_id,ref,amount,interest,image,plan_percent)
        VALUES(null,'" . $users_unique_id . "','" . $deposit_id . "','" . $username . "','" . $email . "','".$plan."','" . $btc . "','" . $referral . "','" . $ref_id . "',
        '".$ref."','" . $amount . "','" . $btc_amount . "','" . $imageName . "', '" . $plan_percent . "') ";
        //print_r($ref); die();
        $results = $this->runMysqliQuery($query);
        //print_r($result);die();
        if ($results['error_code'] == 1) {
            $_SESSION['formError'] = ['general_error' => [$results['error']]];
            header('location:../users/deposit');
            return;
        }

        $CompanyName = $_SESSION['short_name'];
        $SiteName = $_SESSION['site_name'];
        $SiteEmail = $_SESSION['semail'];
        $CompanyPhone = $_SESSION['phone'];
        $CompanyAddress = $_SESSION['address'];
        $CompanyDescription = $_SESSION['description'];
        $CompanyRefpercent = $_SESSION['refpercent'];
        $CompanyLogo = $_SESSION['companylogo'];

        if ($results) {
            $to  = $email;
            $d = date('Y');
            $ego = $amount;
            $subject = "Deposited To $CompanyName";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img style="height: 90px;" src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.' "/></h6>
    <div style="font-size: 14px;">
    <p>Hello '.$username.' You have Successfully Deposited  amount of $ '.$ego.', You are meant to copy the wallet address showing on your Dashboard and deposite the Amount equivalent so that your transaction can be confirmed and your Interest can start Accruing.</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$CompanyName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$CompanyName.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: '.$CompanyName.' <support@'.$SiteName.'.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                header("location:../users/deposit?success=deposit was successful");
            } else {
                return  'Internal error. Mail fail to send';
            }
            header("location:../users/deposit?success=deposit was successful");
        }
        
        $CompanyName = $_SESSION['short_name'];
        $SiteName = $_SESSION['site_name'];
        $SiteEmail = $_SESSION['semail'];
        $CompanyPhone = $_SESSION['phone'];
        $CompanyAddress = $_SESSION['address'];
        $CompanyDescription = $_SESSION['description'];
        $CompanyRefpercent = $_SESSION['refpercent'];
        $CompanyLogo = $_SESSION['companylogo'];
        
        $to  = ''.$SiteEmail.'';
        $d = date('Y');
        $use = $username;
        $ego = $amount;
        $subject = "Deposited To $CompanyName";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
   <h6 align="center"><img style="height: 90px;" src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.' "/></h6>
    <div style="font-size: 14px;">
    <p>'.$username.'. has Successfully Deposited on '.$CompanyName.' amount is $ '.$ego.',.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    ganarglobal Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$CompanyName.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: '.$CompanyName.' <support@'.$SiteName.'.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
            header("location:../users/deposit.php?success=deposit was successful");
        } else {
            return  'Internal error. Mail fail to send';
        }



        header("location:../users/deposit.php?success=deposit was successful");

    }
    
     function allwithdrawbonus(){
        $UserDetails = [];
        $query = "SELECT * FROM with_bonus";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }

    
     function GetfName($userId){
        $query = "SELECT * FROM users WHERE users_unique_id = '$userId'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return [
                'count'=>0,
                'data'=>[]
            ];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return [
                'count'=>0,
                'data'=>[]
            ];
        }else{
            while($row = mysqli_fetch_array($result)){
                $r = $row['referral'];
            }
                $dsr = "SELECT * FROM users WHERE ref_id = '$r'";
             //   print_r($dsr);die();
                $resu = $this->runMysqliQuery($dsr);
                if($resu['error_code'] == 1){
                    return [
                        'count'=>0,
                        'data'=>[]
                    ];
                }
                $resul = $resu['data'];
                if(mysqli_num_rows($resul) > 0) {
                    while($rows = mysqli_fetch_assoc($resul)){
                       $refObject = $rows;
                    }
                    return [
                        'count'=>mysqli_num_rows($resul),
                        'data'=>$refObject
                    ];
                }
                //   print_r($username);die();
            return [
                'count'=>0,
                'data'=>[]
            ];
        }
    }


    function deycounter(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 360";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                //print_r($id);die();
                $day_on = date('D');
                $count_value = $row['day_counter'];
                $new_countValue = $count_value + 1;
                $querys = "UPDATE deposit_tb SET day_counter = '".$new_countValue."' WHERE id = '".$id."' AND status = 'confirmed' AND day_counter < 360 ";
                $details = $this->runMysqliQuery($querys);

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter");
                    return;
                }

                //header("location:../counter.php?success=deycounter one is successful");

            }
        }

    }
    // function BuilderPlain(){
    //     $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 360 AND plan = 'Builder Plan'";
    //     $details = $this->runMysqliQuery($query);//run the query
    //     if($details['error_code'] == 1){
    //         return $details['error'];
    //     }
    //     $result = $details['data'];
    //     if(mysqli_num_rows($result) == 0) {
    //         return 'No Data was returned';
    //     }
    //     else{
    //         for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
    //             $id = $row['id'];
    //             $day_on = date('D');
    //             $amount = $row['amount'];
    //             $interest = $row['interest'];
    //             $plan = $row['plan'];
                
    //                 $dayInt = ($amount/100)*3.5;
                
    //             $main_interest = $interest + $dayInt;
    //             $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."'";
    //             $details = $this->runMysqliQuery($querys);//run the query

    //             if($details['error_code'] == 1){
    //                 $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
    //                 header("location:../counter.php");
    //                 return;
    //             }
    //             // header("location:../counter.php?success=premiunplan one is successful");

    //         }
    //     }

    // }

    function BuilderPlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 360 AND plan = 'Builder Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $amount = $row['amount'];
                $plan = $row['plan'];
                $interest = $row['interest'];
                
                if($plan == 'Builder Plan'){
                    $dayInt = ($amount/100)*3.5;
                }
                $main_interest = $interest + $dayInt;
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."' AND status = 'confirmed' AND day_counter < 360 AND plan = 'Builder Plan'";
                $details = $this->runMysqliQuery($querys);//run the query

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

    function SilverPlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 20 AND plan = 'Silver Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $amount = $row['amount'];
                $plan = $row['plan'];
                $interest = $row['interest'];

                if($plan == 'Silver Plan'){
                    $dayInt = ($amount/100)*4.5;
                }
                $main_interest = $interest + $dayInt;
                 // print_r($main_interest);die();
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."' AND status = 'confirmed' AND day_counter < 360 AND plan = 'Silver Plan'";
                $details = $this->runMysqliQuery($querys);//run the query
                //print_r($details); die();

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

    function DiamondPlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' 
        AND day_counter < 360 AND plan = 'Diamond Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $amount = $row['amount'];
                $plan = $row['plan'];
                $interest = $row['interest'];

                if($plan == 'Diamond Plan'){
                    $dayInt = ($amount/100)*6.5;
                }
                $main_interest = $interest + $dayInt;
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = 
                '".$id."' AND status = 'confirmed' AND day_counter < 360 AND plan = 'Diamond Plan'";
                $details = $this->runMysqliQuery($querys);//run the query

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

    function UltimatePlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 360 AND plan = 'Ultimate Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $amount = $row['amount'];
                $plan = $row['plan'];
                $interest = $row['interest'];

                if($plan == 'Ultimate Plan'){
                    $dayInt = ($amount/100)*8.5;
                }
                $main_interest = $interest + $dayInt;
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."' AND status = 'confirmed' AND day_counter < 360 AND plan = 'Ultimate Plan'";
                $details = $this->runMysqliQuery($querys);//run the query

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

    function BusinessPlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 360 AND plan = 'Business Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $amount = $row['amount'];
                $plan = $row['plan'];
                $interest = $row['interest'];
                if($plan == 'Business Plan'){
                    $dayInt = ($amount/100)*10;
                }
                $main_interest = $interest + $dayInt;
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."' AND status = 'confirmed' AND day_counter < 360 AND plan = 'Business Plan'";
                $details = $this->runMysqliQuery($querys);//run the query

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

    //lets see comp siteaddress here
    function displayCompanydetailsAddress(){

        $compdetails = [];

        $query = "SELECT * FROM settings";
        $result = $this->runMysqliQuery($query);

        if($result['error_code']  == 1){
            header('location:../admin/dashboard_1');
            //return $result['error'];
        }
        $data = $result['data'];

        while ($a = mysqli_fetch_array($data)) {
            # code...
            //$compdetails[]
            $shortname =  $_SESSION['short_name'] = $a['short_name'];
            $site_name = $_SESSION['site_name'] = $a['site_name'];
            $email = $_SESSION['semail'] = $a['email'];
            $phone = $_SESSION['phone'] = $a['phone'];
            $address = $_SESSION['address'] = $a['address'];
            $description = $_SESSION['description'] = $a['description'];
            $refpercent = $_SESSION['refpercent'] = $a['refpercent'];
            $companylogo = $_SESSION['companylogo'] = $a['companylogo'];

            
           return $address;
        }
    
    }

    //lets see comp sitePhone here
    function displayCompanydetailsPhone(){

        $compdetails = [];

        $query = "SELECT * FROM settings";
        $result = $this->runMysqliQuery($query);

        if($result['error_code']  == 1){
            header('location:../admin/dashboard_1');
            //return $result['error'];
        }
        $data = $result['data'];

        while ($a = mysqli_fetch_array($data)) {
            # code...
            //$compdetails[]
            $shortname =  $_SESSION['short_name'] = $a['short_name'];
            $site_name = $_SESSION['site_name'] = $a['site_name'];
            $email = $_SESSION['semail'] = $a['email'];
            $phone = $_SESSION['phone'] = $a['phone'];
            $address = $_SESSION['address'] = $a['address'];
            $description = $_SESSION['description'] = $a['description'];
            $refpercent = $_SESSION['refpercent'] = $a['refpercent'];
            $companylogo = $_SESSION['companylogo'] = $a['companylogo'];

            
           return $phone;
        }
    
    }

    //This function addsCompany Details
    function addCompany(){

       $site_name = mysqli_real_escape_string($this->dbConnection, $_POST['site_name']);
       $short_name = mysqli_real_escape_string($this->dbConnection, $_POST['short_name']);
       $email = mysqli_real_escape_string($this->dbConnection, $_POST['email']);
       $phone = mysqli_real_escape_string($this->dbConnection, $_POST['phone']);
       $address = mysqli_real_escape_string($this->dbConnection, $_POST['address']);
       $description = mysqli_real_escape_string($this->dbConnection, $_POST['description']);
       $refpercent = mysqli_real_escape_string($this->dbConnection, $_POST['refpercent']);
       $livechatcode = mysqli_real_escape_string($this->dbConnection, $_POST['livechatcode']);

       $fileUpload = $this->FileUploader('passport', ['jpg', 'png', 'gif', 'jpeg'], 2000000, '3megabyte', '../images/');

       if ($fileUpload['error_code'] == 1) {
           # code...
           
           $_SESSION['formError'] = ['general_error'=>[$fileUpload['error']]];
           header('location:../admin/company');
           return;
       }

       //run an update on the users row
       $imageName = $fileUpload['data'];

    //    print_r($imageName); die(); 


       $thingsToValidate = [
        $site_name.'|Site Name|site_name|empty',
        $short_name.'|Short Name|short_name|empty',
        $email.'|Email|email|empty',
        $phone.'|Phone|phone|empty',
        $address.'|Address|address|empty',
        $description.'|Description|description|empty',
        $refpercent.'|Referral Percentage|refpercent|empty'
        // $password2.'|Password2|password2|empty'
    ];

    $validationStatus = $this->callValidation($thingsToValidate);
    if($validationStatus === false){
        $_SESSION['formError'] = $this->errors;
        header('location:../admin/company');
        return;
    }

    $rquery = "DELETE FROM settings";
    $run = $this->runMySqliQuery($rquery);

   // print_r($run); die();

    $res = $this->insertintoSetting($site_name, $short_name, $email, $phone, $address, $description, $refpercent, $imageName, $livechatcode); 

    if ($res['error_code'] == 1){
        $_SESSION['formError']=['general_error' =>[$res['error']] ];
        header('location:../admin/company');
        return;
    }
    
    header('location:../admin/company?success=Company Details Has Been Added');
        

    }

    //lets see comp logo here
    function displayCompanydetailsPic(){

        $compdetails = [];

        $query = "SELECT * FROM settings";
        $result = $this->runMysqliQuery($query);

        if($result['error_code'] == 1){
            header('location:../admin/dashboard_1');
            //return $result['error'];
        }
        $data = $result['data'];

        while ($a = mysqli_fetch_array($data)) {
            # code...
            //$compdetails[]
            $pic = $a['companylogo'];
            
            return $pic;
        }
    
    }

    //lets see comp sitename here
    function displayCompanydetailsPicSiteName(){

        $compdetails = [];

        $query = "SELECT * FROM settings";
        $result = $this->runMysqliQuery($query);

        if($result['error_code']  == 1){
            header('location:../admin/dashboard_1');
            //return $result['error'];
        }
        $data = $result['data'];

        while ($a = mysqli_fetch_array($data)) {
            # code...
            //$compdetails[]
            $shortname =  $_SESSION['short_name'] = $a['short_name'];
            $site_name = $_SESSION['site_name'] = $a['site_name'];
            $email = $_SESSION['semail'] = $a['email'];
            $phone = $_SESSION['phone'] = $a['phone'];
            $address = $_SESSION['address'] = $a['address'];
            $description = $_SESSION['description'] = $a['description'];
            $refpercent = $_SESSION['refpercent'] = $a['refpercent'];
            $companylogo = $_SESSION['companylogo'] = $a['companylogo'];

            
           return $site_name;
        }
    
    }

    function addwallet(){

        $payment_method = mysqli_real_escape_string($this->dbConnection, $_POST['payment_method']);
        $payment_address = mysqli_real_escape_string($this->dbConnection, $_POST['payment_address']);
   
          $thingsToValidate = [
           $payment_method.'|Payment Method|description|empty',
           $payment_address.'|Payment Address|payment_address|empty'
           // $password2.'|Password2|password2|empty'
       ];
   
       $validationStatus = $this->callValidation($thingsToValidate);
       if($validationStatus === false){
           $_SESSION['formError'] = $this->errors;
           header('location:../admin/wallet_profile');
           return;
       }
   
       $res = $this->insertintoPaymentMethod($payment_method, $payment_address); 
   
       if ($res['error_code'] == 1){
           $_SESSION['formError']=['general_error' =>[$res['error']] ];
           header('location:../admin/wallet_profile');
           return;
       }
       
       header('location:../admin/wallet_profile?success=Wallet Address Has Been Added');
    }   
    
    function addplan(){

        $plan_name = mysqli_real_escape_string($this->dbConnection, $_POST['plan_name']);
        $plan_percent = mysqli_real_escape_string($this->dbConnection, $_POST['plan_percent']);
        $plan_duration = mysqli_real_escape_string($this->dbConnection, $_POST['plan_duration']);
        $plan_period = mysqli_real_escape_string($this->dbConnection, $_POST['plan_period']);
        $plan_min = mysqli_real_escape_string($this->dbConnection, $_POST['plan_min']);
        $plan_max = mysqli_real_escape_string($this->dbConnection, $_POST['plan_max']);
   
       
          $thingsToValidate = [
           $plan_name.'|Plan Name|plan_name|empty',
           $plan_percent.'|Plan Percentage|plan_percent|empty',
           $plan_duration.'|Plan Duration|plan_duration|empty',
           $plan_period.'|Plan Period|plan_period|empty',
           $plan_min.'|Mini Plan Amount|plan_min|empty',
           $plan_max.'|Maximum Plan Amount|plan_max|empty'
           // $password2.'|Password2|password2|empty'
       ];
   
       $validationStatus = $this->callValidation($thingsToValidate);
       if($validationStatus === false){
           $_SESSION['formError'] = $this->errors;
           header('location:../admin/aplan');
           return;
       }
   
       $plan_id = $this->createUniqueID('plan', 'plan_id');
       //print_r($plan_id); die();
       $res = $this->insertIntoPlans($plan_id, $plan_name, $plan_percent,
      $plan_duration, $plan_period, $plan_min, $plan_max); 
   
       if ($res['error_code'] == 1){
           $_SESSION['formError']=['general_error' =>[$res['error']] ];
           header('location:../admin/aplan');
           return;
       }
       
       header('location:../admin/aplan?success=Plan Address Has Been Added');

    }

    //View all Plans
    function viewallplans(){

        $data = [];
        $query = "SELECT * FROM plan";
        $result = $this->runMysqliQuery($query);

        if($result['error_code'] == 1){
            return $result['error'];
        }
        $datareceived = $result['data'];

        if($datareceived){
            while ($a = mysqli_fetch_object($datareceived)) {
                # code...
                $data[] = $a;

            }
            return $data;
        }

    }

    //Edit and Update Plan
    function updateplan(){

        $planame = mysqli_real_escape_string($this->dbConnection, $_POST['plan_name']);
        $plan_percent = mysqli_real_escape_string($this->dbConnection, $_POST['plan_percent']);
        $plan_duration = mysqli_real_escape_string($this->dbConnection, $_POST['plan_duration']);
        $planid = mysqli_real_escape_string($this->dbConnection, $_POST['planid']);
        $plan_period = mysqli_real_escape_string($this->dbConnection, $_POST['plan_period']);
        $plan_min = mysqli_real_escape_string($this->dbConnection, $_POST['plan_min']);
        $plan_max = mysqli_real_escape_string($this->dbConnection, $_POST['plan_max']);
        
        $validationStatus = [
            $planame.'|Plan Name|plan_name|empty',
            $plan_percent.'|Plan Percentage|plan_percent|empty',
           $plan_duration.'|Plan Duration|plan_duration|empty',
           $plan_period.'|Plan Period|plan_period|empty',
           $plan_min.'|Mini Plan Amount|plan_min|empty',
           $plan_max.'|Maximum Plan Amount|plan_max|empty'
        ];
        
        $validationStatus = $this->callValidation($validationStatus);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header("location:../admin/editplan?plan_id=$planid");
            return;
        }
        
        $query = "UPDATE plan SET plan_name = '".$planame."', plan_percent = '".$plan_percent."',
        plan_duration = '".$plan_duration."', plan_period = '".$plan_period."', plan_min = '".$plan_min."',
         plan_max = '".$plan_max."' WHERE plan_id = '".$planid."'";
         $send = $this->runMysqliQuery($query);
         if($detai['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
            header("location:../admin/editplan?plan_id=$planid");
            return;
        }

        header("location:../admin/editplan?success=Plan Has been Updated&plan_id=$planid");

        //print_r($planid); die();

    }
    
    //View all Payments
    function viewpaymentmethod(){

        $data = [];
        $query = "SELECT * FROM wallet";
        $result = $this->runMysqliQuery($query);

        if($result['error_code'] == 1){
            return $result['error'];
        }
        $datareceived = $result['data'];

        if($datareceived){
            while ($a = mysqli_fetch_object($datareceived)) {
                # code...
                $data[] = $a;

            }
            return $data;
        }

    }

    //select details of a particular plan
    
    function selectparticularplandetails($planame){

        $data = [];
        $query = "SELECT * FROM plan WHERE plan_name = '".$planame."'";
        $result = $this->runMysqliQuery($query);

        if($result['error_code'] == 1){
            return $result['error'];
        }
        $datareceived = $result['data'];

        if($datareceived){
            while ($a = mysqli_fetch_object($datareceived)) {
                # code...
                $data[] = $a;

            }
            return $data;
        }

    }

    //View all Plans
    function getuniqueplandetails($planuid){

        $data = [];
        $query = "SELECT * FROM plan WHERE plan_id = '".$planuid."'";
        $result = $this->runMysqliQuery($query);

        if($result['error_code'] == 1){
            return $result['error'];
        }
        $datareceived = $result['data'];

        if($datareceived){
            while ($a = mysqli_fetch_object($datareceived)) {
                # code...
                $data[] = $a;

            }
            return $data;
        }
    
    }

    //select particluar compan per
    function selectSettings(){

        $query = "SELECT * FROM settings";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        while ($a = mysqli_fetch_object($result)) {
            # code...
            $refpercent = $a->refpercent;
        }

        return $refpercent;

    }

    function ref(){
        //I want to get users dat registered usin referral link den wen dey run
        // deposit tk 10% nd deposit it in der 
        // amount and ref_amount in referral table
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND ref = 0";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        // print_r($result);die();
        if(mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)){
                $username = $row['username'];
                $users_unique_id = $row['users_unique_id'];
                $plan = $row['plan'];
                $coin_type = $row['coin_type'];
                $amount = $row['amount'];
                $r = $row['referral'];
                $ref_id = $row['ref_id']; 

                $refpp = $this->selectSettings();
                //If referral is nt empty else leave it out   
                if ($r != ""){

                   if($plan == $plan){
                        $amo = ($amount/100) * $refpp;
                       // print_r($amo); die();
                   }
                    // if ($plan == 'Builder Plan' ){
                    //     $amo = ($amount/100)*10;
                    // }elseif ($plan == 'Silver Plan' ){
                    //     $amo = ($amount/100)*10;
                    // }elseif ($plan == 'Diamond Plan' ){
                    //     $amo = ($amount/100)*10;
                    // }elseif ($plan == 'Ultimate Plan' ){
                    //     $amo = ($amount/100)*10;
                    // }elseif ($plan == 'Ultimate Plan' ){
                    //     $amo = ($amount/100)*10;
                    // }

                    $a = $amo;

                    $referral_id = $this->createUniqueID('referral_tb', 'referral_id');

                    $users_unique_id = $_SESSION['userUniqueId'];
                    
                    $querys = "INSERT INTO referral_tb (id,referral_id,users_unique_id,plan,coin_type,amount,
                    referral,ref_id,ref_amount,username)
                    VALUES (null,  '".$referral_id."','".$users_unique_id."','".$plan."', '".$coin_type."',
                     '".$amount."', '".$r."', '".$ref_id."', '".$a."','".$username."')";
                    $resultss = $this->runMysqliQuery($querys);
                    if ($resultss['error_code'] == 1) {
                        $_SESSION['formError'] = ['general_error' => [$resultss['error']]];
                        header('location:../users/counter');
                        return;
                    }
//                    print_r($resultss);die();
                    if ($resultss){
                        $naw = 1;
                        $quer = "UPDATE deposit_tb SET ref ='".$naw."'WHERE referral = '".$r."'  AND  plan = '".$plan."'";
                        $results = $this->runMysqliQuery($quer);
                        if($results['error_code'] == 1){
                            return $results['error'];
                        }
                    }

                    header("location:../users/dashboard?come=$users_unique_id");
                }
            }
        }
    }

    function countref(){
        $query = "SELECT * FROM users";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_array($result); $i++) {
                $ref_id = $row['ref_id'];
                $users_unique_id = $row['users_unique_id'];
                $querys = "SELECT COUNT(ref) FROM deposit_tb WHERE referral = '".$ref_id."'";
                //    print_r($querys);die();
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                //   print_r($resul);die();
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }
                if($resul){
                    //  print_r($resul);die();
                    for ($i=0; $ro = mysqli_fetch_array($resul); $i++) {
                        $amount = $ro[0];
                        $quers = "UPDATE users SET num_ref ='".$amount."' WHERE users_unique_id  = '".$users_unique_id."'" ;
                        $detai = $this->runMysqliQuery($quers);//run the query
                        if($detai['error_code'] == 1){
                            $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
                            header("location:../counter");
                            return;
                        }
                    }
                }
            }
        }
    }

    // function counrff($userId){

    //     $query = "SELECT * FROM users WHERE users_unique_id = '".$userId."'";
    //     $details = $this->runMysqliQuery($query); //run d query
    //     if ($details['error_code'] == 1) {
    //         # code...
    //         return $details['error'];
    //     }
    //     $result = $details['data'];
    //     //here I have gotten 3 users using ref link 12345

    //     if(mysqli_num_rows($result) == 0){
    //         //return keywrd ends a function nd optionally uses d result of an expression as d return value is used outside of a function it stops d php code in d file frm running
    //         return 'No Data was returned';
    //     }else {
            
    //     }
    // }

    function counrff($userId){
        $query = "SELECT * FROM users WHERE users_unique_id = '".$userId."'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else {
            //mysqli fetch_array fetch a result row as a numeric array and as as an associative array
            while ($row = mysqli_fetch_array($result)) {
                $ref_id = $row['ref_id'];
                $dsr = "SELECT COUNT(referral) FROM users WHERE referral = '$ref_id'";
                //  print_r($dsr);die();
                $resu = $this->runMysqliQuery($dsr);
                if($resu['error_code'] == 1){
                    return $resu['error'];
                }
                $resul = $resu['data'];
                if(mysqli_num_rows($resul) > 0) {
                    while ($row = mysqli_fetch_array($resul)) {
                        $output = $row[0];
                        //         print_r($output);die();
                    }
                    return $output; 
                }
            }
        }
    }

    function useref($userId){

        $query = "SELECT * FROM users WHERE users_unique_id = '".$userId."'";
        $res = $this->runMysqliQuery($query);
        
        if($res['error_code'] == 1){
            return 'error';
        }
        $data = $res['data'];
        
       // print_r($data); die();
        if (mysqli_num_rows($data) == 0) {
            # code...
            return "No data was found";
        }
        else {
            //mysqli fetch_array fetch a result row as a numeric array and as as an associative array
            while($row = mysqli_fetch_array($data)){
                $ref_id = $row['ref_id'];
                $userRefDetails = [];
                $std = "SELECT * FROM users WHERE referral = '".$ref_id."'";
                $resul = $this->runmysqliQuery($std);
                if ($resul['error_code'] == 1) {
                    # code...
                    return 'error';
                }
                $result = $resul['data'];
                
                if (mysqli_num_rows($result) == 0) {
                    # code...
                    return 'No data was returned';
                }else {
                    # code...
                    while ($rowset = mysqli_fetch_array($result)) {
                        # code...
                        $userRefDetails[] = $rowset;
                        //print_r($rowset); die();
                    }
                    return $userRefDetails;
                }
            }
        }
    }


    function reinvest(){

        //here I made depositId = $user_id
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);
        //print_r($user_id); die();
        $option = trim($_GET['option']);
        if($option === 'upgrate'){
            //checking if dat user details is in d deposit table
        $query = "SELECT * FROM deposit_tb WHERE deposit_id = '$user_id'";
        $message = "You have successfully ReInvested";
    }
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details); die();
        
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $amount = $row['amount'];
                $interest = $row['interest'];
                $day_counter = $row['day_counter'];
            }
            $reinvest_amount = $interest + $amount;
        $querys = "UPDATE deposit_tb SET amount = '".$reinvest_amount."',interest = 0, day_counter = 0 WHERE deposit_id = '".$user_id."'";
       //print_r($querys);die();
        $detailss = $this->runMysqliQuery($querys);
       //print_r($detailss);die();
        if($detailss['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $detailss['error'] ] ];
            header("location:../users/button_reinvest?success");
            return;
    }
    header("location:../users/no_button_invest?success=$message");
   }
}


function withdrawAmount(){
    $wallet= $_SESSION['wallet']=mysqli_real_escape_string($this->dbConnection, $_POST['wallet']);
    $coin= $_SESSION['coin']=mysqli_real_escape_string($this->dbConnection, $_POST['coin']);
    $amount= $_SESSION['amount']=mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
    $userId= $_SESSION['userId']=mysqli_real_escape_string($this->dbConnection, $_POST['userId']);
    $useramount= $_SESSION['useramount']=mysqli_real_escape_string($this->dbConnection, $_POST['useramount']);
    $depId= $_SESSION['depId']=mysqli_real_escape_string($this->dbConnection, $_POST['depId']);
    
   // print_r($useramount); die();
    $thingsToValidate = [
        $wallet.'|Wallet|wallet|empty',
        $coin.'|Coin|coin|empty',
        $amount.'|Amount|amount|empty',
    ];

    $validationStatus = $this->callValidation($thingsToValidate);
    if($validationStatus === false) {
        $_SESSION['formError'] = $this->errors;
        header('location:../users/withdrawamount');
        return;
    }

    
    $drawal_deposit_id= $this->createUniqueID('with_amount', 'withdraw_id');
    $users_unique_id = $_SESSION['userUniqueId'];
    $username = $_SESSION['userUsername'];
    $email = $_SESSION['userEmail'];
    //2000 4500 $useramount = 2000 amount = 4500 $amount > 
    if($amount > $useramount){
        //print_r("$amount is greater than $useramount"); die();
        $_SESSION['formError'] = ['general Error'=>['Please amount should not be greater than' ." " .$useramount]];
        header('location:../users/withdrawamount');
        return;

    }
    //print_r("$amount is less than $useramount"); die();
    $query = "SELECT * FROM deposit_tb WHERE deposit_id = '".$depId."'";
    $details = $this->runMysqliQuery($query);//run the query
    //print_r($details); die();
    if($details['error_code'] == 1){
        return $details['error'];
    }
    $result = $details['data'];
    if(mysqli_num_rows($result) == 0) {
        return 'No Data was returned';
    }
    if($result){
        for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
            $deposit_id = $row['deposit_id'];
            $plan = $row['plan'];
            $day_counter = $row['day_counter'];
            $bal = $row['amount'];
       //   print_r($day_counter);die();
    }
}
   if(($plan === $plan && $day_counter >= 5) ||  ($plan === $plan && $day_counter >= 7) ||  ($plan === $plan && $day_counter >= 10) ||  ($plan === $plan && $day_counter >= 14) ||  ($plan === $plan && $day_counter >= 21)){
    $querys = "INSERT INTO with_amount (id,withdraw_id,users_unique_id,username,email,wallet,coin_type,amount)VALUES(null,'".$drawal_deposit_id."','".$users_unique_id."','".$username."','".$email."','".$wallet."','".$coin."','".$amount."') ";
    $resul = $this->runMysqliQuery($querys);
    //print_r($result);die();

    if($resul['error_code'] == 1){
        $_SESSION['formError'] = ['general_error'=>[ $resul['error'] ] ];
        header('location:../users/withdrawamount');
        return;
    }
    $dequery = "SELECT * FROM deposit_tb  WHERE deposit_id = '$depId'";
    $dedetails = $this->runMysqliQuery($dequery);
    if($dedetails['error_code'] == 1){
        return $dedetails['error'];
    }
    $deresult = $dedetails['data'];
    if(mysqli_num_rows($deresult) == 0){
        return 'No Data was returned';
    }if($deresult){
        for ($i=0; $rows = mysqli_fetch_assoc($deresult); $i++){
            $interest  = $rows['amount'];
        }
        $int = ($bal - $amount);
        //print_r($int); die();
        $quers = "UPDATE deposit_tb SET amount ='".$int."' WHERE deposit_id  = '".$deposit_id."'";
        $detai = $this->runMysqliQuery($quers);//run the query
        //print_r($detai);die();
        if($detai['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
            header("location:../users/withdrawamount");
            return;
        }
    
        $CompanyName = $_SESSION['short_name'];
        $SiteName = $_SESSION['site_name'];
        $SiteEmail = $_SESSION['semail'];
        $CompanyPhone = $_SESSION['phone'];
        $CompanyAddress = $_SESSION['address'];
        $CompanyDescription = $_SESSION['description'];
        $CompanyRefpercent = $_SESSION['refpercent'];
        $CompanyLogo = $_SESSION['companylogo'];

      if ($detai) {
            $to  = $email;
            $ego = $amount;
            $d = date('Y');
            $subject = "Withdraw To $CompanyName";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img style="height: 90px" src="https://www.'.$SiteName.'.com/images/'.$CompanyLogo.'" alt="'.$SiteName.' "/></h6>
    <div style="font-size: 14px;">
     <p>You have Successfully Created a Withdrawal Ticket on '.$SiteName.'  Amount $'.$ego.'., You are meant to wait for a period of 30 min so that the Money equivalent will be sent to your Wallet address on your Dashboard.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$SiteName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$SiteEmail.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$SiteEmail.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
           $header .= 'From: '.$CompanyName.' <support@'.$SiteName.'.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                header("location:../users/withdrawamount?success=withdrawal was successful");
            } else {
                return  'Internal error. Mail fail to send';
            }
            header("location:../users/withdrawamount?success=withdrawal was successful");
            // return("Deposite Successfully");
        }
        
        $to  = ''.$SiteEmail.'';
        $d = date('Y');
        $use = $username;
        $ego = $amount;
        $subject = "Withdraw To $CompanyName";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img style="height: 90px" src="https://www.'.$SiteName.'.com/images/'.$CompanyLogo.'" alt="'.$SiteName.' "/></h6>
    <div style="font-size: 14px;">
     <p>'.$use.'. has Successfully Withdraw on '.$SiteName.' amount is $'.$ego.'</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$SiteName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$SiteName.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$SiteName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: '.$SiteName.' <support@'.$SiteName.'.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
            header("location:../users/withdrawamount?success=withdrawal was successful");
        } else {
            return  'Internal error. Mail fail to send';
        }

        // header("location:../users/withdraw.php?deposit_id=$depId");
        header('location:../users/withdrawamount?success=withdrawal was successful');
        $_SESSION['depId'] = $depId;
        
    }
        }else{
            $_SESSION['formError'] = ['general_error'=>['your are not allow to withdraw']];
            header('location:../users/withdrawamount');
        }
}

    //this function is to upload a passport
    function uploadPassport(){

        //call d upload method
        $fileUpload = $this->FileUploader('passport', ['jpg', 'png', 'gif', 'jpeg'], 2000000, '3megabyte', '../images/');

        if ($fileUpload['error_code'] == 1) {
            # code...
            
            $_SESSION['formError'] = ['general_error'=>[$fileUpload['error']]];
            header('location:../users/profile');
            return;
        }

        //run an update on the users row
        $userId = $_SESSION['userUniqueId'];
        $imageName = $fileUpload['data'];

        
        $query = "UPDATE users SET image_name = '$imageName' WHERE users_unique_id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);

        if ($updateDetails['error_code'] == 1) {
            # code...
            $_SESSION['formError'] = ['general_error'=>[$updateDetails['error'] ]];
            header('location:../users/profile');
            return;
        }

        header('location:../users/profile?success=Image upload was successful');
    }

    function deletePassport(){

        $imageName = "../images/prof_icon.png";
//print_r($imageName); die();
        $userId = $_SESSION['userUniqueId'];
            $query = "UPDATE users SET image_name = '$imageName' WHERE users_unique_id = '$userId'";
            $details = $this->runMysqliQuery($query);
            
            if ($details['error_code'] == 1) {
                # code...
                $_SESSION['formError'] = ['general_error'=>[$details['error'] ]];
                header('location:../users/profile');
                return;
            }
            header('location:../users/profile?success=Image was deleted');
        
    }


    function withdraw(){
        $wallet= $_SESSION['wallet']=mysqli_real_escape_string($this->dbConnection, $_POST['wallet']);
        $coin= $_SESSION['coin']=mysqli_real_escape_string($this->dbConnection, $_POST['coin']);
        $amount= $_SESSION['amount']=mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
        $depId= $_SESSION['depId']=mysqli_real_escape_string($this->dbConnection, $_POST['depId']);
        $userId = $_SESSION['userId'] = mysqli_real_escape_string($this->dbConnection, $_POST['userId']);
        $userinterest= mysqli_real_escape_string($this->dbConnection, $_POST['userinterest']);
       // print_r($userId); die();

        //print_r($useramount); die();
        $thingsToValidate = [
            $wallet.'|Wallet|wallet|empty',
            $coin.'|Coin|coin|empty',
            $amount.'|Amount|amount|empty'
        ];
        
        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../users/withdraw');
            return;
        }
        //print_r($validationStatus); die();

        if($userinterest < $amount){
            $_SESSION['formError'] = ['general Error'=>['Profit to be Withdrawan should not be greater than'. " " .$userinterest]];
            header("location:../users/withdraw?deposit_id=$depId");
            return;
        }
        //print_r("We can Proceed");

        $drawal_deposit_id= $this->createUniqueID('withdrawal', 'withdraw_id');
        $users_unique_id = $_SESSION['userUniqueId'];
        $username = $_SESSION['userUsername'];
        $email = $_SESSION['userEmail'];

        //get data frm dep table
        $query = "SELECT * FROM deposit_tb WHERE deposit_id = '".$depId."'";
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details); die();

        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        //I have gotten d result fr dat row
        //nxt is to get d daycounter, interest, plan 
        //$row = mysqli_fetch_assoc($result); 
        //print_r($row['interest']); die();
         
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $deposit_id = $row['deposit_id'];
                $plan = $row['plan'];
                $day_counter = $row['day_counter'];
                $bal = $row['interest'];
           //   print_r($day_counter); die();
        }
    }
    
    //I created a record in withdraw 
   if(($plan === $plan && $day_counter >= 5) ||  ($plan === $plan && $day_counter >= 7) ||  ($plan === $plan && $day_counter >= 10) ||  ($plan === $plan && $day_counter >= 14) ||  ($plan === $plan && $day_counter >= 21)){
        $querys = "INSERT INTO withdrawal (id,withdraw_id,users_unique_id,username,email,wallet,coin_type,amount)VALUES(null,'".$drawal_deposit_id."','".$users_unique_id."','".$username."','".$email."','".$wallet."','".$coin."','".$amount."') ";
        $resul = $this->runMysqliQuery($querys);
       // print_r($resul); die();
        //print_r($result);die();

        if($resul['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $resul['error'] ] ];
            header('location:../users/withdraw');
            return;
        }
        $dequery = "SELECT * FROM deposit_tb  WHERE deposit_id = '$deposit_id'";
        $dedetails = $this->runMysqliQuery($dequery);
        if($dedetails['error_code'] == 1){
            return $dedetails['error'];
        }
        $deresult = $dedetails['data'];
        if(mysqli_num_rows($deresult) == 0){
            return 'No Data was returned';
        }if($deresult){
            for ($i=0; $rows = mysqli_fetch_assoc($deresult); $i++){
                $interest  = $rows['interest'];
            }
            $int = ($bal - $amount);
            $quers = "UPDATE deposit_tb SET interest ='".$int."' WHERE deposit_id  = '".$deposit_id."'";
         //   print_r($quers);die();
            $detai = $this->runMysqliQuery($quers);//run the query
            if($detai['error_code'] == 1){
                $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
                header("location:../users/withdraw");
                return;
            }
        
            $CompanyName = $_SESSION['short_name'];
            $SiteName = $_SESSION['site_name'];
            $SiteEmail = $_SESSION['semail'];
            $CompanyPhone = $_SESSION['phone'];
            $CompanyAddress = $_SESSION['address'];
            $CompanyDescription = $_SESSION['description'];
            $CompanyRefpercent = $_SESSION['refpercent'];
            $CompanyLogo = $_SESSION['companylogo'];

        if ($detai) {
            $to  = $email;
            $ego = $amount;
            $d = date('Y');
            $subject = "Withdraw To $CompanyName";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img style="height: 90px" src="https://www.'.$SiteName.'.com/images/'.$CompanyLogo.'" alt="'.$SiteName.' "/></h6>
    <div style="font-size: 14px;">
     <p>You have Successfully Created a Withdrawal Ticket on '.$SiteName.'  Amount $'.$ego.'., You are meant to wait for a period of 30 min so that the Money equivalent will be sent to your Wallet address on your Dashboard.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$SiteName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$SiteEmail.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$SiteEmail.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
           $header .= 'From: '.$CompanyName.' <support@'.$SiteName.'.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                header("location:../users/withdraw?success=withdrawal was successful");
            } else {
                return  'Internal error. Mail fail to send';
            }
            header("location:../users/withdraw?success=withdrawal was successful");
            // return("Deposite Successfully");
        }
        
        $to  = ''.$SiteEmail.'';
        $d = date('Y');
        $use = $username;
        $ego = $amount;
        $subject = "Withdraw To $CompanyName";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img style="height: 90px" src="https://www.'.$SiteName.'.com/images/'.$CompanyLogo.'" alt="'.$SiteName.' "/></h6>
    <div style="font-size: 14px;">
     <p>'.$use.'. has Successfully Withdraw on '.$SiteName.' amount is $'.$ego.'</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$SiteName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$SiteName.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$SiteName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: '.$SiteName.' <support@'.$SiteName.'.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
            header("location:../users/withdraw?success=withdrawal was successful");
        } else {
            return  'Internal error. Mail fail to send';
        }

        // header("location:../users/withdraw?deposit_id=$depId");
        header('location:../users/withdraw?success=withdrawal was successful');
        $_SESSION['depId'] = $depId;
        
    }
        }else{
            $_SESSION['formError'] = ['general_error'=>['your are not allow to withdraw']];
            header('location:../users/withdraw');
        }
}

function selectsinglereffbouns($userId){
    $querys = "SELECT * FROM users WHERE ref_id = '".$userId."'";
    $details = $this->runMysqliQuery($querys);//run the query
    if($details['error_code'] == 1){
        return $details['error'];
    }
    $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
        while($row = mysqli_fetch_object($result)){
            $ref_id = $row->ref_id;
        }
        $UserDetails = "";
        $dsr = "SELECT * FROM referral_tb WHERE referral = '".$ref_id."'";
        $detail = $this->runMysqliQuery($dsr);//run the query
        if($detail['error_code'] == 1){
            return $detail['error'];
        }
        $resul = $detail['data'];
      //  print_r($resul);die();
       return $resul;
       // print_r($UserDetails);die();

    }
}

    function referraldetails($userId){
        
        //this fun chekcs our db to get a referral details using a unique referral number
        $query = "SELECT * FROM referral_tb WHERE referral_id = '".$userId."'";
        $result = $this->runMySqliQuery($query);

        if($result['error_code'] == 1){
            return $result['error'];
        }
        $data = $result['data'];

        while ($a = mysqli_fetch_object($data)) {
            # code...
            $refamount = $a->ref_amount;

        }
        return $refamount;

    }

    function withdrawBonus(){
        $wallet= $_SESSION['wallet']=mysqli_real_escape_string($this->dbConnection, $_POST['wallet']);
        $coin= $_SESSION['coin']=mysqli_real_escape_string($this->dbConnection, $_POST['coin']);
        $amount= $_SESSION['amount']=mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
        $userId= $_SESSION['userId']=mysqli_real_escape_string($this->dbConnection, $_POST['userId']);

       // $refamount = $_SESSION['refamount'] = mysqli_real_escape_string($this->dbConnection, $_POST['refamount']);
        $refamount = $this->referraldetails($userId); 

        $uuid = $_SESSION['userUniqueId'];

     // print_r($uuid); die();

       // $depositid = $_SESSION['deposit_id'] = mysqli_real_escape_string($this->dbConnection, $_POST['deposit_id']);
        $thingsToValidate = [
            $wallet.'|Wallet|wallet|empty',
            $coin.'|Coin|coin|empty',
            $amount.'|Amount|amount|empty',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header("location:../users/withdraw_bonus?user_id=$userId");
            return;
        }

        //check if amount is equal to zero
        if($refamount == 0){

            $_SESSION['formError'] = ['general Error'=>['Insufficient Amount']];
            header("location:../users/withdraw_bonus?user_id=$userId");
            return;

        }
        
        if($amount > $refamount){
            //print_r("$amount is greater than $useramount"); die();
            $_SESSION['formError'] = ['general Error'=>['Please amount should not be greater than' ." " .$refamount]];
            header("location:../users/withdraw_bonus?user_id=$userId");
            return;
    
        }


        $querys = "SELECT * FROM referral_tb WHERE referral_id = '".$userId."'";
        $details = $this->runMysqliQuery($querys);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 0;
        }else{
            while($row = mysqli_fetch_object($result)){
                $referral = $row->referral;
                $ref_amount = $row->ref_amount;
            }
            $query = "SELECT * FROM users WHERE ref_id = '".$referral."'";
            $detail = $this->runMysqliQuery($query);//run the query
            if($detail['error_code'] == 1){
                return $detail['error'];
            }
            $resul = $detail['data'];
            if(mysqli_num_rows($resul) == 0){
                return 0;
            }else{
                while($rows = mysqli_fetch_object($resul)){
                    $email = $rows->email;
                    $username = $rows->username;
                }

        $drawal_referral_id = $this->createUniqueID('with_bonus', 'withbouns_id');
    
        $int = $refamount - $amount;

        // $r = $refamount - $amount;
        
       // print_r($drawal_referral_id); die();

        $queryy = "INSERT INTO with_bonus (id,withbouns_id,users_unique_id,username,email,wallet,coin_type,amount)VALUES(null,'".$drawal_referral_id."','".$uuid."','".$username."','".$email."','".$wallet."','".$coin."','".$amount."') ";
        $resultt = $this->runMysqliQuery($queryy);
        //  print_r($result);die();

        
        if($resultt['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $resultt['error'] ] ];
            header("location:../users/withdraw_bonus?user_id=$userId&amount=$r");
            return;
        }
        $quers = "UPDATE referral_tb SET ref_amount ='".$int."' WHERE referral_id = '".$userId."'" ;
     //   print_r($quers);die();
        $detai = $this->runMysqliQuery($quers);//run the query
        if($detai['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
            header("location:../users/withdraw_bonus?user_id=$userId");
            return;
        }


        $CompanyName = $_SESSION['short_name'];
        $SiteName = $_SESSION['site_name'];
        $SiteEmail = $_SESSION['semail'];
        $CompanyPhone = $_SESSION['phone'];
        $CompanyAddress = $_SESSION['address'];
        $CompanyDescription = $_SESSION['description'];
        $CompanyRefpercent = $_SESSION['refpercent'];
        $CompanyLogo = $_SESSION['companylogo'];

          if ($resultt) {
            $to  = $email;
            $ego = $amount;
            $d = date('Y');
            $subject = "Withdraw To $CompanyName";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img style="height: 90px" src="https://www.'.$SiteName.'.com/images/'.$CompanyLogo.'" alt="'.$SiteName.' "/></h6>
    <div style="font-size: 14px;">
     <p>You have Successfully Created a Withdrawal Ticket on '.$SiteName.'  Amount $'.$ego.'., You are meant to wait for a period of 30 min so that the Money equivalent will be sent to your Wallet address on your Dashboard.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$SiteName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$SiteEmail.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$SiteEmail.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
           $header .= 'From: '.$CompanyName.' <support@'.$SiteName.'.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                header("location:../users/withdraw.php?success=withdrawal was successful");
            } else {
                return  'Internal error. Mail fail to send';
            }
            header("location:../users/withdraw.php?success=withdrawal was successful");
            // return("Deposite Successfully");
        }
        
        $to  = ''.$SiteEmail.'';
        $d = date('Y');
        $use = $username;
        $ego = $amount;
        $subject = "Withdraw To $CompanyName";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img style="height: 90px" src="https://www.'.$SiteName.'.com/images/'.$CompanyLogo.'" alt="'.$SiteName.' "/></h6>
    <div style="font-size: 14px;">
     <p>'.$use.'. has Successfully Withdraw on '.$SiteName.' amount is $'.$ego.'</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$SiteName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$SiteName.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$SiteName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: '.$SiteName.' <support@'.$SiteName.'.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
            header("location:../users/withdraw.php?success=withdrawal was successful");
        } else {
            return  'Internal error. Mail fail to send';
        }

        // header("location:../users/withdraw.php?deposit_id=$depId");
        header('location:../users/withdraw.php?success=withdrawal was successful');
        $_SESSION['depId'] = $depId;
        
    }
        // }else{
        //     $_SESSION['formError'] = ['general_error'=>['your are not allow to withdraw']];
        //     header('location:../users/withdraw.php');
        // }
//}
      
    //}
}
}

    
    function selectdrawatable($id){
        $UserDetails = "";
        $query = "SELECT * FROM withdrawal WHERE users_unique_id = '".$id."'AND status = 'confirmed'";
        // print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $UserDetails = $details['data'];
        //print_r($query);die();

        return $UserDetails;
    }


    function alldeposit(){
        $UserDetails = [];
        $query = "SELECT * FROM deposit_tb";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function alldepositwithcom(){
        $UserDetails = [];
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' ORDER BY id DESC LIMIT 8";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function allinvest(){
        $UserDetails = [];
        $query = "SELECT * FROM deposit_tb WHERE status ='confirmed'";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    
    }

    function allwithdrawamount(){
        $UserDetails = [];
        $query = "SELECT * FROM with_amount";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }


    function allwithdraw(){
        $UserDetails = [];
        $query = "SELECT * FROM withdrawal";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function allwithdrawwithcom(){
        $UserDetails = [];
        $query = "SELECT * FROM withdrawal WHERE status = 'confirmed' ORDER BY id DESC LIMIT 8";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }


  function manageAccount(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'delete'){
            $query = "DELETE FROM deposit_tb WHERE deposit_id = '".$user_id."'";
            $message = "User have been deleted successfully";
        }elseif ($option === 'deletepl') {
            # code...
            $query = "DELETE FROM plan WHERE plan_id = '".$user_id."'";
            $message = "Plan have been deleted succssfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status");
            return;
        }
        header("location:../admin/status?success=$message");

    }
    
    function manageAccounts(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'block'){
            $query = "UPDATE deposit_tb	 SET status = 'pending' WHERE deposit_id = '".$user_id."'";
            $message = "Deposit have been set to pending successfully";

        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status");
            return;
        }
        header("location:../admin/dstatus?success=$message");

    }

    function manageAccountss(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'unblock'){
            $query = "UPDATE deposit_tb	SET status = 'confirmed' WHERE deposit_id = '".$user_id."'";
            header("location:../admin/dstatus?success=Users have been confirmed successfully");

            //run the query
            $result = $this->runMysqliQuery($query);
            //print_r($result);die();
            if($result['error_code'] == 1){
                $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
                header("location:../admin/status?success=User have been confirmed successfully");
                return;
            }
            $select = "SELECT * FROM deposit_tb WHERE deposit_id = '".$user_id."'";
            $details = $this->runMysqliQuery($select);
            // print_r($result);die();
            if($details['error_code'] == 1){
                return $details['error'];
            }
            $result = $details['data'];
            if(mysqli_num_rows($result) == 0) {
                return 'No Data was returned';
            }
            if($result) {
                for ($i = 0; $row = mysqli_fetch_array($result); $i++) {
                    $email = $row['email'];
                    $amount = $row['amount'];
                    $username = $row['username'];
                    $referral = $row['referral'];
                }

                $CompanyName = $_SESSION['short_name'];
                $SiteName = $_SESSION['site_name'];
                $SiteEmail = $_SESSION['semail'];
                $CompanyPhone = $_SESSION['phone'];
                $CompanyAddress = $_SESSION['address'];
                $CompanyDescription = $_SESSION['description'];
                $CompanyRefpercent = $_SESSION['refpercent'];
                $CompanyLogo = $_SESSION['companylogo'];

                $to  = $SiteEmail;
                $d = date('Y');
                $ego = $amount;
                $subject = "Welcome To $CompanyName";
                $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.' "/></h6>
                    <div style="font-size: 14px;">
					<p>Hello '.$username.'. Your Deposit of $'.$ego.'. have been confirmed</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    '.$CompanyName.' Team<br />
                    Email: support@'.$SiteEmail.'<br /></p>
				
			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        '.$CompanyName.'.<br>
			
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
		</div>
		</body>
		</html>';
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: '.$CompanyName.' <support@'.$SiteEmail.'>' . "\r\n";
                $retval = @mail($to, $subject, $message, $header);
                if ($retval = true) {
                    return  "location:../admin/status?success=User have been un-blocked successfully";
                    // header("location:login.php");
                } else {
                    return   "location:../admin/status?success=User have been un-blocked successfully";
                }
                header("location:../admin/status?success=User have been un-blocked successfully");
            }
            header("location:../admin/status?success=User have been un-blocked successfully");

            // header("location:../admin/status.php?success=$message");

            $to  = ''.$SiteEmail.'';
            $d = date('Y');
            $subject = "Welcome To '.$CompanyName.'";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.' "/></h6>
    <div style="font-size: 14px;">
    <p>'.$username.'. deposit of .'.$ego.'. has been Successfully confirmed.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    '.$CompanyName.' Team<br />
    Email: support@'.$SiteEmail.'<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        '.$CompanyName.'.<br>

</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: '.$CompanyName.' <support@'.$SiteEmail.'>' . "\r\n";
            $retval = @mail(''.$SiteEmail.'', $subject, $message, $header);
            if ($retval = true) {
                return  "location:../admin/status?success=User have been un-blocked successfully";
            } else {
                return  "location:../admin/status?success=User have been un-blocked successfully";
            }
            return  "location:../admin/status?success=User have been un-blocked successfully";
        }
        if($result){
            $dsrs = "SELECT * FROM users WHERE ref_id = '$referral'";
            $resus = $this->runMysqliQuery($dsrs);
            if($resus['error_code'] == 1){
                return $resus['error'];
            }
            $results = $resus['data'];
            if(mysqli_num_rows($results) == 0){
                return 'no';
            }else{
                while($row = mysqli_fetch_array($results)){
                    $refemail = $row['email'];
                    $refname = $row['username'];
                }
                $to  = $refemail;
                $d = date('Y');
                $subject = "Welcome To '.$CompanyName.'";
                $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.' "/></h6>
                    <div style="font-size: 14px;">
					<p>Hello '.$refname.' <br>
						You Reffered : '.$fullname.' <br> you have  receive 10% of deposit.</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    '.$CompanyName.' Team<br />
                    Email: support@'.$SiteEmail.'<br /></p>

			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        '.$CompanyName.'.<br>
				
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;'.$CompanyName.' . All Rights Reserved.</p>
		</div>
		</body>
		</html>';
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: '.$CompanyName.' <support@'.$SiteEmail.'>' . "\r\n";
                $retval = @mail($to, $subject, $message, $header);
                if ($retval = true) {
                    return  'location:../admin/status?success=User have been un-blocked successfully';
                    // header("location:login.php");
                } else {
                    return  'location:../admin/status?success=User have been un-blocked successfully';
                }
            }
            header("location:../admin/status?success=User have been un-blocked successfully");
        }
        header("location:../admin/status?success=User have been un-blocked successfully");

    }

    function managewithdraw(){
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'deletel'){
            $query = "DELETE FROM withdrawal WHERE withdraw_id = '".$user_id."'";
            $message = "Withdrawal has been Deleted";

        }elseif ($option === 'pending') {
            # code...
            $query = "UPDATE withdrawal SET status = 'pending' WHERE withdraw_id = '".$user_id."'";
            $message = "User status Has been set to Pending";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();

        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuss");
            return;
        }
        header("location:../admin/statuss?success=$message");

    }

    function withdawstatus(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'cdeletel'){
            $query = "DELETE FROM with_amount WHERE withdraw_id = '".$user_id."'";
            $message = "Withdrawal has been Deleted";

        }elseif ($option === 'cpending') {
            # code...
            $query = "UPDATE with_amount SET status = 'pending' WHERE withdraw_id = '".$user_id."'";
            $message = "User Status Has Been set to Pending";

        }elseif ($option === 'cconfirmed') {
            # code...
            $query = "UPDATE with_amount SET status = 'confirmed' WHERE withdraw_id = '".$user_id."'";
            $message = "User Status Has Been set to Confirmed";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();

        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/withcapstatus");
            return;
        }
        header("location:../admin/withcapstatus?success=$message");

    }


    function managewithdra(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'pending'){
            $query = "UPDATE with_amount SET status = 'pending' WHERE withdraw_id = '".$user_id."'";
            $message = "User have been pending successfully";
            
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuss");
            return;
        }
        header("location:../admin/statuss?success=$message");

    }
    function managewithdr(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'confirmed'){
            $query = "UPDATE withdrawal SET status = 'confirmed' WHERE withdraw_id = '".$user_id."'";
            header("location:../admin/statuss?success=User have been confirmed successfully");
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuss");
            return;
        }
        $select = "SELECT * FROM withdrawal WHERE withdraw_id = '".$user_id."'";
        $details = $this->runMysqliQuery($select);
        // print_r($result);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $results = $details['data'];
        if(mysqli_num_rows($results) == 0) {
            return 'No Data was returned';
        }
        if($results) {
            for ($i = 0; $row = mysqli_fetch_array($results); $i++) {
                $email = $row['email'];
                $amount = $row['amount'];
                $users_unique_id = $row['users_unique_id'];
            }
             $queryss = "SELECT * FROM users WHERE users_unique_id = '".$users_unique_id."'";
           // print_r($queryss);die();
            $detailss = $this->runMysqliQuery($queryss);//run the query
            if($detailss['error_code'] == 1){
                return $detailss['error'];
            }
            $resultss = $detailss['data'];
            if(mysqli_num_rows($resultss) == 0){
                return 'No Data was returned';
            }else{
                while($rows = mysqli_fetch_array($resultss)){
                    $bal = $rows['balance'];
                }
            }
            $int = ($bal - $amount);

            $querysss = "UPDATE users SET balance = '".$int."' WHERE users_unique_id = '".$users_unique_id."'";
            $resultsss = $this->runMysqliQuery($querysss);
            if($resultsss['error_code'] == 1){
                $_SESSION['formError'] = ['general_error'=>[ $resultsss['error'] ] ];
                header("location:../users/withdraw");
                return;
            }
            
            $CompanyName = $_SESSION['short_name'];
            $SiteName = $_SESSION['site_name'];
            $SiteEmail = $_SESSION['semail'];
            $CompanyPhone = $_SESSION['phone'];
            $CompanyAddress = $_SESSION['address'];
            $CompanyDescription = $_SESSION['description'];
            $CompanyRefpercent = $_SESSION['refpercent'];
            $CompanyLogo = $_SESSION['companylogo'];

            $to  = $SiteEmail;
            $d = date('Y');
            $ego = $amount;
            $subject = "Welcome To $CompanyName";
            $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.'"/></h6>
                    <div style="font-size: 14px;">
					<p>Your withdrawal of $'.$ego.' have be confirmed</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    '.$CompanyName.' Team<br/>
                    Email: support@'.$SiteEmail.'<br /></p>
				
			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        '.$CompanyName.'.<br>
				
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
		</div>
		</body>
		</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: '.$CompanyName.' <support@'.$SiteEmail.'>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                return  "location:../admin/statuss?success=User have been un-blocked successfully";
                // header("location:login.php");
            } else {
                return  "location:../admin/statuss?success=User have been un-blocked successfully";
            }
            header("location:../admin/statuss?success=User have been un-blocked successfully");
        }


        header("location:../admin/statuss?success=$message");

    }
    function manbonus(){
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'delete4'){
            $query = "DELETE FROM with_bonus WHERE withbouns_id = '".$user_id."'";
            $message = "User have been deleted successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status_bonus");
            return;
        }
        header("location:../admin/status_bonus?success=$message");

    }
    function manabonus(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option == 'pendiiing'){
            $query = "UPDATE with_bonus SET status = 'pending' WHERE withbouns_id = '".$user_id."'";
            $message = "User have been set to pending successfully";

        }else if($option == 'confiiirmed'){
            
            $query = "UPDATE with_bonus	SET status = 'confirmed' WHERE withbouns_id = '".$user_id."'";
            $message = "User have been confirmed successfully";

            }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status_bonus");
            return;
        }
        header("location:../admin/status_bonus?success=$message");

    }
    function managbonus(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'confiiirmed'){
            
            $query = "UPDATE with_bonus	SET status = 'confirmed' WHERE withbouns_id = '".$user_id."'";
            $message = "User have been confirmed successfully";

            }

        //here im confirming a user ref bonus den wil mail dat user 
        //run the query
        $result = $this->runMysqliQuery($query);
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status_bonus?success=User have been confirmed successfully");
            return;
        }
        header("location:../admin/status_bonus?success=$message");


        $select = "SELECT * FROM with_bonus WHERE withbouns_id = '".$user_id."'";
        $details = $this->runMysqliQuery($select);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $results = $details['data'];
        if(mysqli_num_rows($results) == 0) {
            return 0;
        }
        if($results) {
            for ($i = 0; $row = mysqli_fetch_array($results); $i++) {
           //     print_r($row);die();
                $email = $row['email'];
                $amount = $row['amount'];
            }
            
            //         print_r($resultsss);die();
         
            $CompanyName = $_SESSION['short_name'];
            $SiteName = $_SESSION['site_name'];
            $SiteEmail = $_SESSION['semail'];
            $CompanyPhone = $_SESSION['phone'];
            $CompanyAddress = $_SESSION['address'];
            $CompanyDescription = $_SESSION['description'];
            $CompanyRefpercent = $_SESSION['refpercent'];
            $CompanyLogo = $_SESSION['companylogo'];

            $to  = $SiteEmail;
            $d = date('Y');
            $ego = $amount;
            $subject = "Welcome To $CompanyName";
            $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.'"/></h6>
                    <div style="font-size: 14px;">
					<p>You withdrawal of $'.$ego.'have be confirmed</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    '.$CompanyName.' Team<br/>
                    Email: support@'.$SiteEmail.'<br /></p>
				
			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        '.$CompanyName.'.<br>
				
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
		</div>
		</body>
		</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: '.$CompanyName.' <support@'.$CompanyName.'.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                return  "location:../admin/status_bonus?success=User have been un-blocked successfully";
                // header("location:login.php");
            } else {
                return  "location:../admin/status_bonus?success=User have been un-blocked successfully";
            }
        return "location:../admin/status_bonus?success=User have been un-blocked successfully";
    }


        header("location:../admin/status_bonus?success=User have been un-blocked successfully");


    }

    function manageusers(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'deleteled'){
            $query = "DELETE FROM users WHERE users_unique_id = '".$user_id."'";
            $message = "User have been deleted successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statusinter");
            return;
        }
        header("location:../admin/statusinter?success=$message");

    }
    function manageuser(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'pendingi'){
            $query = "UPDATE users SET status = 'pending' WHERE users_unique_id = '".$user_id."'";
            $message = "User have been pending successfully";

        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statusinter");
            return;
        }
        header("location:../admin/statusinter?success=$message");

    }
    function manageuse(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'confirmedi'){
            $query = "UPDATE users SET status = 'confirmed' WHERE users_unique_id  = '".$user_id."'";
            $message = "User have been confirmed successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statusinter");
            return;
        }
        header("location:../admin/statusinter?success=$message");

    }
    
    function managereff(){
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'delete2'){
            $query = "DELETE FROM referral_tb WHERE referral_id  = '".$user_id."'";
            $message = "User have been deleted successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuswith");
            return;
        }
        header("location:../admin/statuswith?success=$message");

    }
    function manageref(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'pendiing'){
            $query = "UPDATE referral_tb SET status = 'pending' WHERE referral_id = '".$user_id."'";
            $message = "User have been pending successfully";

        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuswith");
            return;
        }

        header("location:../admin/statuswith?success=$message");

    }
    function managere(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'confiirmed'){
            $query = "UPDATE referral_tb SET status = 'confirmed' WHERE referral_id = '".$user_id."'";
            $message = "User have been confirmed successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuswith");
            return;
        }

        $select = "SELECT * FROM referral_tb WHERE referral_id = '".$user_id."'";
        $details = $this->runMysqliQuery($select);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result) {
            for ($i = 0; $row = mysqli_fetch_array($result); $i++) {
                $referral = $row['referral'];
                $ref_amount = $row['ref_amount'];

            }
        }
        $dsrs = "SELECT * FROM users WHERE ref_id = '$referral'";
        $resus = $this->runMysqliQuery($dsrs);
        if($resus['error_code'] == 1){
            return $resus['error'];
        }
        $result = $resus['data'];
        if(mysqli_num_rows($result) == 0){
            return 'no';
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $email = $row['email'];
                $refname = $row['username'];
            }

            $CompanyName = $_SESSION['short_name'];
            $SiteName = $_SESSION['site_name'];
            $SiteEmail = $_SESSION['semail'];
            $CompanyPhone = $_SESSION['phone'];
            $CompanyAddress = $_SESSION['address'];
            $CompanyDescription = $_SESSION['description'];
            $CompanyRefpercent = $_SESSION['refpercent'];
            $CompanyLogo = $_SESSION['companylogo'];

            $to  = $email;
            $d = date('Y');
            $subject = "Welcome To $CompanyName";
            $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.'.$CompanyName.'.com/images/'.$CompanyLogo.'" alt="'.$CompanyName.'"/></h6>
                    <div style="font-size: 14px;">
				<p>Your referral of $'.$ref_amount.'have been deposit into balance</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    '.$CompanyName.' Team<br/>
                    Email: support@'.$SiteEmail.'<br /></p>
				
			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        '.$CompanyName.'.<br>
				
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;'.$CompanyName.' <?php print ' . $d . ';?>. All Rights Reserved.</p>
		</div>
		</body>
		</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: '.$CompanyName.' <support@'.$SiteEmail.'>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                return  "location:../admin/statuswith?success=User have been un-blocked successfully";
                // header("location:login.php");
            } else {
                return  "location:../admin/statuswith?success=User have been un-blocked successfully";
            }
            header("location:../admin/statuss?success=User have been un-blocked successfully");
        }

        header("location:../admin/statuswith?success=$message");

    }
    
    function getLoggedInDepositDetails($userID){
        $query = "SELECT * FROM deposit_tb WHERE deposit_id = '$userID'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            return $row;
        }
    }

    //get ip adres of a user 
    function get_client_ip(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            # code...
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];

        }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER['HTTP_X_FORWARDED'])){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        }elseif(isset($_SERVER['HTTP_X_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
           $ipaddress = $_SERVER['REMOTE_ADDR'];
        }else{
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    
    }

    function updateadmin()
    {
        $username = mysqli_real_escape_string($this->dbConnection, $_POST['username']);
        $plan = mysqli_real_escape_string($this->dbConnection, $_POST['plan']);
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);
        $amount = mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
        $interest = mysqli_real_escape_string($this->dbConnection, $_POST['interest']);
        $day_counter = mysqli_real_escape_string($this->dbConnection, $_POST['day_counter']);

        $thingsToValidate = [
            $username.'|Username|username|empty',
            $plan.'|Plan|plan|empty',
            //$amount.'|Amount|amount|empty',
            //$interest.'|Interest|interest|empty',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../admin/de_profiledeposit');
            return;
        }

        if (empty($interest)) {
            # code...
            $ninterest = 0;
        }else {
            # code...
            $ninterest = $interest;
        }

        if (empty($amount)) {
            # code...
            $namount = 0;
        }else {
            # code...
            $namount = $amount;
        }
        
        if (empty($day_counter)) {
            # code...
            $nday_counter = 0;
        }else {
            # code...'
            $nday_counter = $day_counter;
        }


        $query = "UPDATE deposit_tb SET username = '".$username."', plan = '$plan' , interest = '$ninterest' , day_counter = '$nday_counter' , amount = '$namount' WHERE deposit_id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error']]];
            header("location:../admin/de_profiledeposit");
            return;
        }
        header ('location:../admin/all_deposit?&success=Profile was updated successfully');
    }


    function updatewallet()
    {
        $Bitcoin = mysqli_real_escape_string($this->dbConnection, $_POST['Bitcoin']);
        $Ethereum = mysqli_real_escape_string($this->dbConnection, $_POST['Ethereum']);
        $Perfect = mysqli_real_escape_string($this->dbConnection, $_POST['Perfect']);
        $BNB = mysqli_real_escape_string($this->dbConnection, $_POST['BNB']);
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['userId']);

        $thingsToValidate = [
            $Bitcoin.'|Bitcoin|bitcoin|empty',
            $Ethereum.'|Ethereum|ethereum|empty',
            $Perfect.'|Perfect|perfect|empty',
            $BNB.'|BNB|bnb|empty',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../admin/wallet_update');
            return;
        }


        $query = "UPDATE wallet SET Bitcoin = '$Bitcoin', Ethereum = '".$Ethereum."', Perfect = '$Perfect' ,BNB = '$BNB' WHERE id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        // print_r($query);die();

        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error'] ]];
            header("location:../admin/wallet_update");
            return;
        }

        header ('location:../admin/wallet_profile?&success=Profile was updated successfully');


    }
    

    function support(){
       $fullname= $_SESSION['fullname']=mysqli_real_escape_string($this->dbConnection, $_POST['fullname']);
        $email= $_SESSION['email']=mysqli_real_escape_string($this->dbConnection, $_POST['email']);
        $message= $_SESSION['message']=mysqli_real_escape_string($this->dbConnection, $_POST['message']);

        $thingsToValidate = [
            $fullname.'|FullName|fullname|empty',
            $email.'|Email|email|empty',
            $message.'|Message|message|empty',
        ];
        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../contact');
            return;
        }
        //       print_r($_SESSION); die();
        // print_r($r); die();
        $createuse = $this->insertIntosuppost($fullname, $email, $message);
        if ($createuse['error_code'] == 1){
            $_SESSION['formError']=['general_error' =>[$createuse['error']] ];
            header('location:../contact');
            return;
        }
        header('location:../contact?success=messages was successful');

    }
    function allsupport(){
        $UserDetails = [];
        $query = "SELECT * FROM support";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
//                print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }

    
    function selectWithdrwallsingle($id){
        $UserDetails = "";
        $query = "SELECT * FROM withdrawal WHERE users_unique_id ='".$id."' ";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;

    }

    //see single capital
    function selectCapitalWithdrwallsingle($id){
        $UserDetails = "";
        $query = "SELECT * FROM with_amount WHERE users_unique_id ='".$id."' ";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;

    }

    //see single bonus witdraw
    function selectBonusWithdrwallsingle($id){
        $UserDetails = "";
        $query = "SELECT * FROM with_bonus WHERE users_unique_id ='".$id."' ";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;

    }


    function selectdeposittable($id){
        //$UserDetails = "";
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id ='".$id."' ";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;
//        if(mysqli_num_rows($result) == 0){
//            return 'No Data was returned';
//        }else{
//            while($row = mysqli_fetch_assoc($result)){
//                $UserDetails = $row;
//               // print_r($UserDetails);die();
//            }
//            return $UserDetails;
//        }

    }

    function selectdeposittableinterest($depId){
        $UserDetails = "";
        $query = "SELECT * FROM deposit_tb WHERE deposit_id ='".$depId."' AND status = 'confirmed' ";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;
//        if(mysqli_num_rows($result) == 0){
//            return 'No Data was returned';
//        }else{
//            while($row = mysqli_fetch_assoc($result)){
//                $UserDetails = $row;
//               // print_r($UserDetails);die();
//            }
//            return $UserDetails;
//        }

    }

    function selectsingleuser($userId){
        $querys = "SELECT * FROM users WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($querys);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails = $row;
                //               print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }

    function enteremail(){
        $email= $_SESSION['email']=mysqli_real_escape_string($this->dbConnection, $_POST['email']);
        $thingsToValidate = [
            $email.'|Email|email|empty',
        ];
        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../reset');
        }
        $query = "SELECT email FROM users WHERE email='".$email."'";
        $back= $this->runMysqliQuery($query);
        if($back['error_code'] == 1){
            header('location:../reset?');
        }
        $result = $back['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            // print_r($row);die();
            header('location:../new_password?userid='.$email);

        }
    }
    function enternewpassword(){

        $password = $_SESSION['password']=mysqli_real_escape_string($this->dbConnection, $_POST['password']);
        $new_password = $_SESSION['new_password']=mysqli_real_escape_string($this->dbConnection, $_POST['new_password']);
        $userId = $_SESSION['userid']=mysqli_real_escape_string($this->dbConnection, $_POST['userId']);

        $thingsToValidate = [
            $password.'|Password|password|empty',
            $new_password.'|New_password|new password|empty',
        ];
        $validationStatus = $this->callValidation($thingsToValidate);

        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../new_password');
        }
        $hashedPasword = $this->hasHer($password);
        $query = "UPDATE users SET password='".$hashedPasword."' WHERE email='".$userId."' ";
        $back = $this->runMysqliQuery($query);
        if($back['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $back['error'] ]];
            header("location:../new_password");
            return;
        }

        header ('location:../new_password?&success=New_password was updated successfully');

    }
    
    function logout(){
        session_destroy();
        header('location:../login?success=Logout Was Successful');
    }


    function sumbalances($userId){
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT SUM(interest) FROM deposit_tb WHERE users_unique_id = '".$userId."' AND status = 'confirmed'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                        //print_r($rows); die();
                    }
                    return  $output;
                }
            }
        }
    
    }

    function meanamount($userId){
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT SUM(amount) FROM deposit_tb WHERE users_unique_id = '".$userId."' AND status = 'confirmed'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                //print_r(mysqli_fetch_array($resul)); die();
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                    }
                    return  $output;
                }
            }
        }
    
    }

    
    //this fun calculates total profit to be withdrawan
    function meanwithdrwa($userId){
        //print_r($userId); die();
        $query = "SELECT * FROM withdrawal WHERE users_unique_id = '".$userId."'";
        $details = $this->runMysqliQuery($query);
       // print_r($details); die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT SUM(amount) FROM withdrawal WHERE users_unique_id = '".$userId."' AND status = 'confirmed'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                    }
                    return  $output;
                }
            }
        }
    
    }

    //this fun gets the total amount to be withdrawan 
    function getotalwithamount($userId){

        $query = "SELECT * FROM with_amount WHERE users_unique_id = '".$userId."' AND status = 'confirmed'";
        $result = $this->runMysqliQuery($query);
        
        //my aim is to simply get d total amt 
        if($result['error' == 0]){
            return $result['error'];
        }
        $data = $result['data'];
        
        if(mysqli_num_rows($data) == 0){
            return 0;
        }else {
            # code...
            $queryy = "SELECT SUM(amount) FROM with_amount WHERE users_unique_id = '".$userId."' AND status = 'confirmed'";
            $amtresult = $this->runMysqliQuery($queryy);
            if($amtresult['error' == 0]){
                return $amtresult['error'];
            }
            $amtdata = $amtresult['data'];

            if(mysqli_num_rows($amtdata) == 0){

                return 0;
            }else {
                while ($r = mysqli_fetch_array($amtdata)) {
                    # code...
                    $amt = $r[0];
                }
            }
            
            return $amt;
        }
        
       // $a = mysqli_fetch_object($data);

    }
     

    //this fun gets the total bonus to be withdrawan 
    function getotalwithbonus($userId){

        $query = "SELECT * FROM with_bonus WHERE users_unique_id = '".$userId."' AND status = 'confirmed'";
        $result = $this->runMysqliQuery($query);
        
        //my aim is to simply get d total amt 
        if($result['error' == 0]){
            return $result['error'];
        }
        $data = $result['data'];
        
        if(mysqli_num_rows($data) == 0){
            return 0;
        }else {
            # code...
            $queryy = "SELECT SUM(amount) FROM with_bonus WHERE users_unique_id = '".$userId."' AND status = 'confirmed'";
            $amtresult = $this->runMysqliQuery($queryy);
            if($amtresult['error' == 0]){
                return $amtresult['error'];
            }
            $amtdata = $amtresult['data'];

            if(mysqli_num_rows($amtdata) == 0){

                return 0;
            }else {
                while ($r = mysqli_fetch_array($amtdata)) {
                    # code...
                    $amt = $r[0];
                }
            }
            
            return $amt;
        }
        
       // $a = mysqli_fetch_object($data);

    }

    function meanwithinvest($userId){
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT COUNT(username) FROM deposit_tb WHERE users_unique_id  = '$userId'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                //print_r($resul); die();
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                    }
                    return  $output;
                }
            }
        }
    
    }

    
   //
    function sumreff($userId){
        $query = "SELECT * FROM users WHERE users_unique_id = '".$userId."'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_array($result); $i++) {
              //  print_r($row);die();
                $ref_id = $row['ref_id'];
                $querys = "SELECT SUM(ref_amount) FROM referral_tb WHERE referral = '".$ref_id."'";
               //print_r($querys);die();
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }
                if($resul){
                    for ($i=0; $ro = mysqli_fetch_array($resul); $i++) {
                        $amount = $ro[0];
                     //print_r($amount);die();
                    }
                    return $amount;
                }
            }
        }
    }

    function managesupport(){
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'deletellll'){
            $query = "DELETE FROM support WHERE id = '".$user_id."'";
             header("location:../admin/statussupport?success=$message");
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statussupport");
            return;
        }
        header("location:../admin/statussupport?success=$message");

    }

    function admindetail(){
        $query = "SELECT * FROM users WHERE type_of_user = 'admin'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails = $row;
                //               print_r($UserDetails);die();
            }
        }
        return  $UserDetails;
    }

    function seeallreff($userId){
        $UserDetails = "";
        $query = "SELECT * FROM users WHERE ref_id = '".$userId."'";
        // print_r($query);die();
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $ref_id = $row['ref_id'];
                // print_r($row);die();
        $querys = "SELECT * FROM referral_tb WHERE  referral = '".$ref_id."'";
        $detail = $this->runMysqliQuery($querys);
        if($detail['error_code'] == 1){
        return $detail['error'];
        }
        $resul = $detail['data'];
        //   print_r($resul);die();
        if(mysqli_num_rows($resul) == 0) {
            return 'No Data was returned';
        }else{
            while($rows = mysqli_fetch_object($resul)){
                 $UserDetails = $rows;
                //   print_r($UserDetails);die();
            }
    }
}
    return  $UserDetails;
}
}



}
$for = new main_work();

?>