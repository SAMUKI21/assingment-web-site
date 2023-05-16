
<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $id = $_POST['id'];

        $item_code = $_POST['item_code'];

        $item_name= $_POST['item_name'];

        $item_category = $_POST['item_category'];

        $item_subcategory = $_POST['item_subcategory'];

        $quantity = $_POST['quantity'];

        $unit_price = $_POST['unit_price'];

        

        $sql = "UPDATE `item` SET  `id`='$id',`item_code`='$item_code',`item_name`='$item_name',`item_category`='$item_category',`item_subcategory`='$item_subcategory',`quantity`='$quantity',`unit_price`='$unit_price' WHERE `id`='$id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `item` where id='$id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];

            $item_code = $row['item_code'];

            $item_name = $row['item_name'];

            $item_category = $row['item_category'];

            $item_subcategory = $row['item_subcategory'];

            $quantity = $row['quantity'];

            $unit_price = $row['unit_price'];

           

        } 

    ?>

        <h2>item Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>item information:</legend>
            

           item_code:<br>

            <input type="text" name="item_code" value="<?php echo $item_code; ?>">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <br>

            item_name:<br>

            <input type="text" name="item_name" value="<?php echo $item_name; ?>">

            <br>

            item_category:<br>

            <input type="text" name="item_category" value="<?php echo $item_category; ?>">

            <br>

            item_subcategory:<br>

            <input type="text" name="item_subcategory" value="<?php echo $item_subcategory; ?>">

            <br>

           quantity:<br>

            <input type="text" name="quantity" value="<?php echo $quantity; ?>">

            <br>

           unit_price:<br>

            <input type="text" name="unit_price" value="<?php echo $unit_price; ?>">

            <br>
 
           
            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?>