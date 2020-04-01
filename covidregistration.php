
<?php
//$updateid=base64_decode(urldecode($_GET['updateid']));
require('object.php');
error_reporting(0);
 $name=$_GET['name'];
 $age=$_GET['age'];
$malevalue=$_GET['malevalue'];
$femalevalue=$_GET['femalevalue'];
$symptom=$_GET['symptom'];
$contact=$_GET['contact'];
$email=$_GET['email'];
$date1=$_GET['date1'];
$city=$_GET['city'];
$updateid=$_GET['updateid'];


		


?>
<!DOCTYPE html>
<html>
<head>
	<title>Covid Patient Registration Form</title>
	<style type="text/css">
		body{

		}
		table{
			margin: auto;
			background-color: grey;
			border-radius: 10px;
			z-index: 1;
		}
		caption{
			font-size: 30px; 
			background-color: #1affa3; 
			margin-bottom: 10px;
			border-radius: 10px;
        }
        input[type=submit]{
        	border-radius: 10px;
        	padding: 5px;
        	
        }
	</style>
</head>
<body>
	<div>
			<button style="float: right; "><a href=modelclass.php?showvalue=showdata>Patient Data</a></button>
		</div>
	<form method="POST" action="modelclass.php?updateid=<?php echo $updateid; ?>">
		<table cellspacing="10" cellpadding="10">
			<caption style="" >Corona Patient Form</caption>
			<tr>
				<td><label>Name :</label></td><td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr>
				<td><label>Age :</label></td><td><input type="text" name="age" value="<?php echo $age; ?>"></td>
			</tr>
			<tr>
				<td><label>Gender :</label></td><td><input type="radio" name="gender" value="male" <?php echo $malevalue; ?> >Male
					<input type="radio" name="gender" value="female" <?php echo $femalevalue; ?> > Female </td>
			</tr>
			<tr>
				<td><label>Symptoms :</label></td><td><input type="text" name="symptom" placeholder="fever, Cough, Trouble Breathing" value="<?php echo $symptom ?>" >
					</td>
			</tr>
			<tr>
				<td><label>Contact :</label></td><td><input type="text" name="contact" value="<?php echo $contact; ?>"></td>
			</tr>
			<tr>
				<td><label>Email :</label></td><td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td><label>Date :</label></td><td><input type="Date" name="date1" value="<?php echo $date1; ?>"></td>
			</tr>
			<tr>
				<td><label>City :</label></td><td><input type="text" name="city" value="<?php echo $city; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="
                      <?php
                  if($updateid){
                  echo "update";
              }
              else{
              	echo "submit";
              }

                  ?>
					"></td>
			</tr>

		</table>
		
		
	</form>

</body>
</html>