<?php 

include "config.php";

  if (isset($_POST['submit'])) {
    $item_code = $_POST['item_code'];
   
    $item_name = $_POST['item_name'];

    $item_category = $_POST['item_category'];

    $item_subcategory = $_POST['item_subcategory'];

    $quantity = $_POST['quantity'];

    $unit_price = $_POST['unit_price'];
    $sql = "INSERT INTO `item`(item_code,item_name,item_category,item_subcategory,quantity,unit_price) VALUES ('$item_code','$item_name','$item_category','$item_subcategory','$quantity','$unit_price')";

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

<h2>Item details Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Item Details:</legend>

   item_code:<br>

   <input type="text" name="item_code">


    <br>

    item_name:<br>

    <input type="text" name="item_name">

    <br>


    item_category:<br>
    
    <input type="text" name="item_category" >

    <br>

    iteam_subcategory:<br>

    <input type="text" name="item_subcategory">

    <br>

    quantity:<br>

    <input type="text" name="quantity">

    <br>

    unit_price:<br>

    <input type="text" name="unit_price">

   <br>
    <a class="btn btn-info" href="view.php ?>">View</a>
    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>