 <!-- <?php //session_start(); ?>  -->
<?php require_once('headers.php'); ?>
<?php require_once('db.php'); ?>
<?php require_once('functions.php'); ?>
<?php 

	
	$errors = array();
	$first_name = '';
	$last_name = '';
	$email = '';
	$password = '';


	if (isset($_POST['submit'])) {
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
	    $phone_number =$_POST['phone_number'];
	    $address =$_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// checking required fields
		$req_fields = array('first_name', 'last_name', 'email', 'password','address','phone_number');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('first_name' =>45, 'last_name' =>45,'address' =>45,'phone_number' =>10,'email' => 45, 'password' => 45);
		$errors = array_merge($errors, check_max_len($max_len_fields));

		// checking email address
		if (!is_email($_POST['email'])) {
			$errors[] = 'Email address is invalid.';
		}

		// checking if email address already exists
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$query = "SELECT * FROM customer WHERE email = '{$email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Email address already exists';
			}
		}

		if (empty($errors)) {
			// no errors found... adding new record
			$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
			$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);
			$phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
			$address= mysqli_real_escape_string($connection, $_POST['address']);
			// email address is already sanitized
			$hashed_password = sha1($password);

			$query = "INSERT INTO customer( ";
			$query .= "first_name, last_name, email, password,phone_number,address, is_deleted";
			$query .= ") VALUES (";
			$query .= "'{$first_name}', '{$last_name}', '{$email}', '{$hashed_password}', '{$phone_number}','{	$address}',0";
			$query .= ")";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: cart.php?user_added=true');
        
			} else {
				$errors[] = 'Failed to add the new record.';
			}
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
 <style type="text/css">
 	*{
 		margin: 0;
 		padding: 0;
 	}
 	body{
 		background-image:url("assets/rbackground.jpeg");
 		background-position: center;
 		background-size:cover;
 		font-family: sans-serif;
 	
        }

    h2{
    	text-align: center;
    	padding: 20px;
    	font-family: sans-serif;
    }
    div.main{
     	
     	width: 400px;
     	margin:40px auto 0px auto;
     }
     div.register{
     	background-color: rgb(0,0,0,0.7); 
     	width: 100%;
     	font-size: 18px;
     	border-radius: 10px;border:1px solid rgba(255,255,255,0.3);
     	box-shadow: 2px 2px 15px rgba(0,0,0,0.4);
     	color: #fff;

     }
     div.err{
      color: #B65050;
      font-size: 14px;
      font-weight: bold;

     }
     form{
      	margin: 060px;
     	}
     	 h1{
      	margin: 40px;
     	}


    label{
     	font-family: sans-serif;
     	font-size: 18px;
     	font-style: italic;

     }
    

    input{
     	padding: 7px;
     	width: 250px;
     	border: none;
     	border-radius: 3px;
     	background-color: #fff;
     	box-shadow: inset 1px 1px 5px rgba(255,255,255,0.4);
     	
     	}
    input#submit{
    	padding: 10px;
     	width: 250px;
     	border: 1px solid rgba(255,255,255,0.4);
     	border-radius: 16px;
     	background-color: rgba(250,100,0,0.4);
     	font-family: sans-serif;
     	font-weight: 500;
     	font-size: 16px;
     	color: #fff;
     	box-shadow: inset 1px 1px 5px rgba(0,0,0,0.4);
     	
     }

label{text-shadow: 1px 1px 5px rgba(0,0,0,0.4);
 }

     </style>
	  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

  <div class="main">
  	
  	<div class="register">
  		<h1>Registration Form</h1>
  		<div class="err"><?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>
       </div>
  		<form action="add-user.php" method="post"  >
  			<div id="register" method="post">

  				<label>First Name:</label><br>
  				<input type="text" name="first_name" class="first name" placeholder="Enter Your First Name" 
          <?php echo 'value="' . $first_name . '"'; ?>><br><br>

  				<label>Last Name:</label><br>
  	            <input type="text" name="last_name" class="last name" placeholder="Enter Your Last Name" 
                <?php echo 'value="'. $last_name . '"'; ?>><br><br>

  		         <label>Phone Number:</label><br>
  		        <input type="text" name="phone_number" class="phonenumber" placeholder="Enter Your phonenumber" 
            ><br><br>

  		         <label>Address:</label><br>
  		        <input type="text" name="address" class="address" placeholder="Enter Your phonenumber"
           ><br><br>

  				<label>Email:</label><br>
  		        <input type="email" name="email" class="email" placeholder="Enter Your email address"
              <?php echo 'value="' .$email. '"'; ?>><br><br>

  		        <label>Password:</label><br>
  		        <input type="password" name="password" class="password" placeholder="Enter Your password"><br><br>


                <input type="submit" Value="submit" Name="submit" id="submit">
  		</form>
  		
  	</div>
  	
  </div>

</body>

</html>
