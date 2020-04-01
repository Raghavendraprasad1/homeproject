<!DOCTYPE html>
<html>
<head>
	<title>Object class</title>
</head>
<body>

	 <?php
  

        if((isset($_POST['submit']) && $updateid1)){
        	require_once('connection.php');
        	$arr = array(
                'name' => $_POST['name'],
                'age' => $_POST['age'],
                'gender' => $_POST['gender'],
                'symptom'=> $_POST['symptom'],
                'contact'=> $_POST['contact'],
                'email'=> $_POST['email'],
                'date1'=> $_POST['date1'],
                'city'=> $_POST['city'],
            );

            $m->update_data('covidform', $arr,"id='$updateid1'");
        }
        elseif (isset($_POST['submit'])) {
           require_once('connection.php');
            $arr = array(
                'name' => $_POST['name'],
                'age' => $_POST['age'],
                'gender' => $_POST['gender'],
                'symptom'=> $_POST['symptom'],
                'contact'=> $_POST['contact'],
                'email'=> $_POST['email'],
                'date1'=> $_POST['date1'],
                'city'=> $_POST['city'],
            );
           $m->insert_data('covidform', $arr);
        }

         if($showvalue =="showdata"){
         
         	?>
         	<table style="border:3px solid black ; border-collapse: collapse; text-align: center; margin: auto;" border="2px" cellpadding="10px">
         		
         	<caption><u>Patient-data</u></caption>
		<tr>
			<th>Id</th><th>Name</th><th>Age</th><th>Gender</th><th>symptom</th>
			<th>Contact</th><th>Email-Id</th><th>Date</th><th>City</th><th colspan="2">Modification</th>
		</tr>

         	<?php
         	//$column=array('id','name','age','gender','symptom','contact','email','date1','city');

	      $data= $m->patient_data("covidform"); // calling patient_data function.

	      foreach ($data as $value) {
	      	$id=$value['id'];
	      	$name=$value['name'];
	      	$age=$value['age'];
	      	$gender=$value['gender'];
	      	$symptom=$value['symptom'];
	      	$contact=$value['contact'];
	      	$email=$value['email'];
	      	$date1=$value['date1'];
	      	$city=$value['city'];

	      	echo "<tr>
	      	<td>".$id."</td>
	      	<td>".$name."</td>
	      	<td>".$age."</td>
	      	<td>".$gender."</td>
	      	<td>".$symptom."</td>
	      	<td>".$contact."</td>
	      	<td>".$email."</td>
	      	<td>".$date1."</td>
	      	<td>".$city."</td> 
	      	<td><a href='modelclass.php?updateid=".urlencode(base64_encode($id))." '>Update</a></td>
	      	<td><a href=modelclass.php?deleteid=".urlencode(base64_encode($id)).">Delete</a></td>
            
	      	";
	      }

	     
         }

          if($deleteid){
         	$m->delete_data("covidform","id='$deleteid'");  // calling delete_data function.
         }

         if($updateid){
         	$name="";
			$age="";
			$malevalue="";
			$femalevalue="";
			$symptom="";
			$contact="";
			$email="";
			$date1="";
			$city="";

			//$updateid=base64_decode(urldecode($_GET['updateid']));
			$data=$m->retrive_data("covidform","id='$updateid'");

			$name=$data['name'];
			$age=$data['age'];
			$gender=$data['gender'];
			$symptom=$data['symptom'];
			$contact=$data['contact'];
			$email=$data['email'];
			$date1=$data['date1'];
			$city=$data['city'];
        
			if($gender=="male"){
                 $malevalue="checked";
			}
			else{
				$femalevalue="checked";
			}
            
            
			
			?>
			<script type="text/javascript">
					window.location.href="covidregistration.php?name=<?php echo $name; ?>& age=<?php echo $age; ?>& malevalue=<?php echo $malevalue; ?>& symptom=<?php echo $symptom; ?>& contact=<?php echo $contact; ?>& email=<?php echo $email; ?>& femalevalue=<?php echo $femalevalue; ?>& date1=<?php echo $date1; ?>& city=<?php echo $city; ?>& updateid=<?php echo $updateid;?>";
			</script>

			<?php

         }


?>
</table>
</body>
</html>