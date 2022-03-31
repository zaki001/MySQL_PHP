<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 6</title>
</head>
<body>
<form action="" method="post">

<input name="id" type="number" ><br><br>
<input name="name" type="text" placeholder="Employee Name"/><br><br>
<input name="email" type="email" placeholder="Email"/><br><br>
<input name="dept" type="text" placeholder="Employee Department"/><br><br>
<input name="salary" type="number" placeholder="Salary"/><br><br>

<input name="submit" type="submit" value="submit"/>


</form>

<table border="1px solid black">
    <tr>
    <th>Employee ID</th>
    <th>Employee Name</th>
    <th>Employee Department</th>
    <th>Employee Email</th>
    <th>Employee Salary</th>
    </tr>





<?php
if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $salary = $_POST['salary'];

    


  $link = mysqli_connect("localhost","root","","phpassignment");
  
$select = mysqli_query($link, "SELECT * FROM assignment6 WHERE emp_email = '".$_POST['email']."'");
if(mysqli_num_rows($select)) {
    exit('This email address is already used!');
}
  if (!$link)
  {
      die("you failed to connect : ".mysqli_connect_error());
  }
  else
  { 

    $s = "INSERT INTO assignment6 VALUES ('$id', '$name', '$email', '$dept','$salary')";
    
    mysqli_query($link, $s);
    $sq="SELECT * from assignment6";
    $result = mysqli_query($link, $sq);
    while($row=mysqli_fetch_row($result))
    {
         echo"<tr>";
         echo"<th>$row[0]</th>";
         echo"<th>$row[1]</th>";
         echo"<th>$row[2]</th>";
         echo"<th>$row[3]</th>";
         echo"<th>$row[4]</th>";
         echo"</tr>";
    }
    }

  }


  

?>
</table>

</body>

</html>