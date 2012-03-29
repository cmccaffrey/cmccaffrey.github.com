<?php $page='contact'; ?>
<?php include('header.inc.php'); ?>
	<h1>Contact</h1>
<?php

if(isset($_REQUEST['firstname'])) {

	$submitted = true;
	
	if (!$_REQUEST['firstname']) {
		$submitted = false;
		$firstname_error = true;
		}
	
	if (!$_REQUEST['lastname']) {
		$submitted = false;
		$lastname_error = true;
		}
}
			
if($submitted){
	$firstname= $_REQUEST['firstname'];
	echo "Thank you for your submission $firstname!";
	$body ="";
	$body .= "firstname: $_REQUEST[firstname]\n";
	$body .= "lastname: $_REQUEST[lastname]\n";
	$body .= "size: $_REQUEST[size]\n";
	$body .= "flavors: $_REQUEST[flavors]\n";
	$body .= "toppings: $_REQUEST[toppings]\n";
	
	mail("cherylmccaffrey@gmail.com", "Snow cone contact from: $firstname", $body);	
	}	

else {
	
?>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim 
ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
aliquip ex ea commodo consequat. </p>
<form action='?'method='post'>
	<?php if ($firstname_error) { echo "<em>Please enter your first name</em></br>"; } ?>
	First name: <input type="text" name="firstname" placeholder="First name" /><br />
	<?php if ($lastname_error) { echo "<em>Please enter your last name</em></br>"; } ?>
	Last name: <input type="text" name="lastname" placeholder="Last name" /><br />
	What is your favorite size cone? 
	<label>	<input type="radio" name="size" value="small" />Small</label>
	<label>	<input type="radio" name="size" value="medium" />Medium </label>
	<label>	<input type="radio" name="size" value="large" />Large<br /></label>
	What is your favorite flavor?
	<select name="flavors">
	<option>--Select a Flavor--</option>
	<option value="vanilla">Vanilla </option>
	<option value="strawberry">Strawberry </option>
	<option value="chocolate">Chocolate </option><br />
		</select>
	What toppings do you like?
	<label>	<input type="checkbox" name="toppings" value="Sprinkles" />Sprinkles</label>
	<label>	<input type="checkbox" name="toppings" value="Almonds" />Almonds</label>
	<label>	<input type="checkbox" name="toppings" value="Gummy-Bears" />Gummy-Bears</label><br />
	</select>
	Submit your form
	<input type="submit" value="Submit" />
 	
</form>
<?php } ?>
<?php include('footer.inc.php');?>