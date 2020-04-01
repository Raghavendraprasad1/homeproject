<?php
	
	// error_reporting(0);
	 $showvalue=$_GET['showvalue'];
	 $updateid1=$_GET['updateid'];
	 $updateid=base64_decode(urldecode($_GET['updateid']));
	 $deleteid=base64_decode(urldecode($_GET['deleteid']));
	
	// class containing insert, delete, and update function.
	class Model{
        // function that perform insertion of data .
        
	public	function insert_data($table_name, $data) {
             require('connection.php');
            $key = array_keys($data);
            $val = array_values($data);
            $sql = "INSERT INTO $table_name(" . implode(', ', $key) . ") VALUES('" . implode("','", $val) . "')";
            $status = mysqli_query($con,$sql);
            if ($status) {
                echo 'Inserted Successfully';
            } 
            else {
               echo 'Unable to Insert Data into Database';
            }
        }

		// function responsible for showing the patient data.
		public function patient_data($table_name){

			require_once("connection.php");
			
				$qry="SELECT * FROM $table_name ";
			$result=mysqli_query($con,$qry);
			$count=0;
			$data=array();
			while ($row = mysqli_fetch_array($result)) {
				$data[$count]=$row;
				$count++;
			}
			return $data;

}

   // function to update data in database

		public function update_data($table_name,$data,$condition){
			 
			 require("connection.php");
			$cols = array();
     $sql="UPDATE  $table_name  SET ";
    foreach($data as $key=>$val) {
        $cols[] = "$key = '$val'";
    }
    $sql .= implode(', ', $cols) . " WHERE " .$condition.";"; 
    // echo $sql;
    // die;
      $result= mysqli_query($con,$sql);
      if($result){
      	echo "data updated";
      }
      else{
      
      	echo "not updated ";
      	echo mysqli_error($con);
      }
			

		}



		public function delete_data($table_name,$condition){
           // $id=$_GET['id'];
			try{
				require_once('connection.php');
				$qry=" DELETE $table_name covidform WHERE $condition ";
				mysqli_query($con,$qry) or err_msg(mysqli_error($con));
                echo "data deleted successfully";
			}
			catch(Exception $e){
				echo " delete Error : ".$e->getMessage();

			}
		}

		public function retrive_data($table_name,$condition){
                require_once('connection.php');
                $sql="SELECT * FROM $table_name WHERE $condition ";
               $data=array();
                $result=mysqli_query($con,$sql);
                $data=mysqli_fetch_assoc($result);
                return $data;


		}


	}


	$m=new Model();
	require('object.php'); // object creation of model class


?>
	