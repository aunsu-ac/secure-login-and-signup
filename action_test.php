<?php
			// checking login
            session_start();
			if(!isset($_SESSION['is_login'])){ 


		// db connection
        define("HOSTNAME","localhost");
        define("USERNAME","root");
        define("PASSWORD","");
        define("DBNAME","test_intern");

        $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("can not connect to database.");


        if (isset($_POST['btn'])) {
        	$msg ="";
        	$ans=$_POST['btn'];

        	// for log in
        	if ($ans == "LogIn") {


        		$un=mysqli_real_escape_string($con,trim($_POST['email']));
    			$pw=mysqli_real_escape_string($con,md5(trim($_POST['pass'])));

				$query="select * from signup where email='$un' and pass='$pw'";
				$fire=mysqli_query($con,$query);
				    if ($fire) 
				    {
				    	if(mysqli_num_rows($fire) == 1){
				    		    while($a=mysqli_fetch_array($fire))
				    				{
				    					$_SESSION['is_login'] = true;
				    					$fn=$a['f_name'];
				    					$_SESSION['fname'] = $fn;
									header("Location: home.php");
				    				}
				    		}else{
				    			$msg .= "Incorrect username or password..!";
				    			header("Location: index.php?msg=".$msg);
				        		
				        		} 
				    }   
			    }


			    // for sign up
			    elseif ($ans == "Signup") {
			    	
			    	
			        $fullname = mysqli_real_escape_string($con,trim($_POST['fname']));
			        $email = mysqli_real_escape_string($con,trim($_POST['email']));
			        $password = mysqli_real_escape_string($con,trim($_POST['pass']));

			        $fullname_valid = $email_valid = $password_valid = false;

			        //Check Fullname
			        if(!empty($fullname)){            
			            if(strlen($fullname) > 3 && strlen($fullname) <= 30){
			                if(!preg_match('/[^a-zA-Z\s]/', $fullname)){

			                    // All Test Passed !!
			                    $fullname_valid = true;                 

			                }else { /*Invalid Characters --> */ $msg .= "Fullname can contain only alphabets <br>#parentHorizontalTab_agile2"; }
			            } else { /* Invalid Length --> */ $msg .= "Fullname must be between 2 to 30 chars long. <br>#parentHorizontalTab_agile2"; }
			        } else { /* Blank Input --> */ $msg .= "Fullname can not be blank !! <br>#parentHorizontalTab_agile2";}



			        //Check email
			        if(!empty($email)){      

			            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
							    $sqlc="select * from signup where email='$email' ";
							    $rc=mysqli_query($con,$sqlc);
							    if(mysqli_num_rows($rc)>0)
							    {
							        $msg .=  "There are already a user as same email!";
							    }
							    else
							    {
							            // All Test Passed !!
							            $email_valid = true;                
								}
			            } else { /* Invalid Length --> */ $msg .= $email." is an Invalid Email Address. <br>#parentHorizontalTab_agile2"; }
			        } else { /* Blank Input --> */ $msg .= "email can not be blank !! <br>#parentHorizontalTab_agile2";}



			        //Check Password
			        if(!empty($password)){            
			            if(strlen($password) >= 5 && strlen($password) <= 30){
			                    
			                    // All Test Passed !!
			                    $password_valid = true;
			                    $password = md5($password);                   

			                
			            } else { /* Invalid Length --> */ $msg .= $password." = password must be between 5 to 15 chars long. <br>#parentHorizontalTab_agile2"; }
			        } else { /* Blank Input --> */ $msg .= "Password can not be blank !! <br>#parentHorizontalTab_agile2";}


			        // start processs
			        if($fullname_valid && $email_valid && $password_valid){

			            $query = "INSERT INTO signup(f_name,email,pass) VALUES('$fullname','$email','$password')";
			            $fire = mysqli_query($con,$query) or die("Can not insert data into database. ".mysqli_error($con));
			            if($fire) {                
			                $msg = "You have successfully signup.";
			                header("Location: index.php?msg=".$msg);
			            }
			        }else{
			                header("Location: index.php?msg=".$msg);
			        }

			        // end processs
				}
        }



// checking login
}else{
    header("Location: home.php");
}
?>