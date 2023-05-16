<?php 

include "config.php";

  if (isset($_POST['submit'])) {
    $title = $_POST['title'];

    $first_name = $_POST['first_name'];

    // $middle_name = $_POST['middlename'];

    $last_name = $_POST['last_name'];

    $contact_no = $_POST['contact_no'];

    $district = $_POST['district'];
    $sql = "INSERT INTO `customer`(title,first_name, last_name, contact_no, district) VALUES ('$title','$first_name','$last_name','$contact_no','$district')";

    $result = $conn->query($sql);
    
    if ($result == TRUE) {

        echo "New record created successfully.";
  
      }else{
  
        echo "Error:". $sql . "<br>". $conn->error;
  
      } 
  
      $conn->close(); 
    
  }
 ?>

<!DOCTYPE html>

<html>

<body>

<h2>customer details Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>customer information:</legend>

   Title:<br>

   <select name="title">
    <option value="mr">Mr</option>
    <option value="mrs">Mrs</option>
    <option value="miss">Miss</option>
    <option value="dr">Dr</option>
  </select>

    <br>

    first name:<br>

    <input type="text" name="first_name">

    <br>


    Last name:<br>

    <input type="text" name="last_name" >

    <br>

    contact number:<br>

    <input type="contact" name="contact_no">

    <br>

    Distric:<br>

    <input type="text" name="district">

    <br>
    <a class="btn btn-info" href="view.php ?>">View</a>
    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>