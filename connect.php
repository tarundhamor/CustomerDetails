<?php
 
 

 $con = mysqli_connect("localhost","root","","customer");
 if(isset($_POST['insert']))
	{
		$id = $_POST['id'];
 $first = $_POST['firstname'];
 $last = $_POST['lastname'];
 $cont = $_POST['contact'];
 $email = $_POST['email'];


 $sql = "SELECT * FROM details WHERE ID='$id'";
 if($result = mysqli_query($con, $sql)){
     if(mysqli_num_rows($result) > 0){
           echo "<h2>User entry already exists. User has already registered.</h2>";
     }

 else{
      $query = "insert into details (ID, Firstname, Lastname, Contact, Email) values ('$id', '$first', '$last','$cont','$email')";
      if (mysqli_query($con,$query)){
      echo "<h3>User Successfully Registered.</h3>"; echo "</br>";  
      echo "<h3>Customers Details</h3>"; echo "</br>";  

      echo "<table>";
             echo "<tr>";
                 echo "<th>ID</th>";
                 echo "<th>Firstname</th>";
                 echo "<th>Lastname</th>";
                 echo "<th>Contact</th>";
                 echo "<th>Email</th>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>" . $id . "</td>";
             echo "<td>" . $first . "</td>";
             echo "<td>" . $last . "</td>";
             echo "<td>" . $cont . "</td>";
             echo "<td>" . $email . "</td>";
      
      echo "</tr>";
      echo "</table>";
      
      
      }



}
 

		

      }
}

      if(isset($_POST['display']))
	{
		$id = $_POST['id'];
 $first = $_POST['firstname'];
 $last = $_POST['lastname'];
 $cont = $_POST['contact'];
 $email = $_POST['email'];


		
 $sql = "SELECT * FROM details WHERE ID='$id'";
 if($result = mysqli_query($con, $sql)){
     if(mysqli_num_rows($result) > 0){
         echo "<table>";
             echo "<tr>";
                 echo "<th>ID</th>";
                 echo "<th>Firstname</th>";
                 echo "<th>Lastname</th>";
                 echo "<th>Contact</th>";
                 echo "<th>Email</th>";
             echo "</tr>";
         while($row = mysqli_fetch_array($result)){
             echo "<tr>";
                 echo "<td>" . $row['ID'] . "</td>";
                 echo "<td>" . $row['Firstname'] . "</td>";
                 echo "<td>" . $row['Lastname'] . "</td>";
                 echo "<td>" . $row['Contact'] . "</td>";
                 echo "<td>" . $row['Email'] . "</td>";
             echo "</tr>";
         }
         echo "</table>";
         // Close result set
         mysqli_free_result($result);
     } else{
         echo "No records matching your query were found.";
     }
 } else{
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
 }
}



		

?>