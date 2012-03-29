<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="utf-8" /> 
	<title>Misquamicut Beach | Rhode Island</title>  
	<link rel="stylesheet" href="stylesheet.css" type="text/css" />
<body>
	<div id="site-wrapper">
		<header id="logo-bar">
			<h1 id="logo1">misquamicut beach</h1>
			<h2 id="logo2">rhode island</h2>
		<div class="clear"></div>
				<nav id="main-interior">
				<ul>
					<li>for visitors</li>	
					<li>the area</li>	
					<li>photo gallery</li>	
					<li>events</li>	
				</ul>
			</nav>	
	</div><!--end of site-wrapper-->
	</header>
<div class="clear"></div>
<?php

if(isset($_REQUEST['firstname'])) {

	$submitted = true;
	
	if (!$_REQUEST['email']) {
		$submitted = false;
		$firstname_error = true;
		}
}
			
if($submitted){
	$firstname= $_REQUEST['firstname'];
	echo "Thank you for your submission $firstname!";
	$body ="";
	$body .= "firstname: $_REQUEST[firstname]\n";
	$body .= "lastname: $_REQUEST[lastname]\n";
	$body .= "email: $_REQUEST[email]\n";
	
	mail("cherylmccaffrey@gmail.com", "Beach contact from: $firstname", $body);	
	}	

else {
	
?>

	<p>Please fill out this form if you would like to be on our mailing list. </p>
<form action='?'method='post'>
	<?php if ($firstname_error) { echo "<em>Please enter your first name</em></br>"; } ?>
	First name <input type="text" name="firstname" placeholder="First name" /><br />
	<?php if ($lastname_error) { echo "<em>Please enter your last name</em></br>"; } ?>
	Last name <input type="text" name="lastname" placeholder="Last name" /><br />
	Email address <input type="text" name="email" placeholder="email address" /><br />
	</select>
	Submit your form
	<input type="submit" value="Submit" />
 	
</form>
<?php } ?>	
	
</body>
</html>