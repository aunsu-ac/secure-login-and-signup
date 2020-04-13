<?php
require 'action_test.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Simple Login and Signup Form</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.9.1.min.js"></script>
<!--// js -->
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs2.css " />
 <link href="//fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
</head>
<body class="bg agileinfo">

   <h1 class="agile_head text-center">Login and Signup</h1><br>
   	<font align="center" size="5px" color="red"><p><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></p></font>
   <div class="w3layouts_main wrap">
    <!--Horizontal Tab-->
        <div id="parentHorizontalTab_agile">
            <ul class="resp-tabs-list hor_1">
                <li>LogIn</li>
                <li>SignUp</li>
            </ul>
            <div class="resp-tabs-container hor_1">
               <div class="w3_agile_login">
                    <form action="action_test.php" method="post" class="agile_form">
					  <p>Email</p>
					  <input type="email" name="email" required="required" placeholder="Enter your Email" />
					  <p>Password</p>
					  <input type="password" name="pass" required="required" class="password" placeholder="Enter your password" /> 
					  <input type="submit" value="LogIn" name="btn" class="agileinfo" />
					</form>
                    
                </div>
                <div class="agile_its_registration">
                	
                    <form action="action_test.php" method="post"  enctype="multipart/form-data" class="agile_form">
					  <p>Full Name</p>
					  <input type="text" name="fname" required="required" placeholder="e.g: Lebron James" />
					  <p>Email</p>
					  <input type="email" name="email" required="required" placeholder="e.g: example@example.com" />
					  <p>Password</p>
					  <input type="password" name="pass" required="required" placeholder="Enter your password">
					   <input type="submit" name="btn" value="Signup"/>
					   <input type="reset" value="Reset" />
					</form> 
				</div>
            </div>
        </div>
		 <!-- //Horizontal Tab -->
    </div>
<!--tabs-->
<script src="js/easyResponsiveTabs2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//Horizontal Tab
	$('#parentHorizontalTab_agile').easyResponsiveTabs({
		type: 'default', //Types: default, vertical, accordion
		width: 'auto', //auto or any width like 600px
		fit: true, // 100% fit in a container
		tabidentify: 'hor_1', // The tab groups identifier
		activate: function(event) { // Callback function if tab is switched
			var $tab = $(this);
			var $info = $('#nested-tabInfo');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
		}
	});
});
</script>

<!--//tabs-->

</body>
</html>

