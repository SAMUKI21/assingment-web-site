
<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $id = $_POST['id'];

        $first_name = $_POST['first_name'];

        $last_name = $_POST['last_name'];

        $contact_no = $_POST['contact_no'];

        $district = $_POST['district'];

        

        $sql = "UPDATE `customer` SET  id='$id',first_name='$first_name',last_name='$last_name',contact_no='$contact_no',district='$district' WHERE id='$id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `customer` where id='$id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $title = $row['title'];

            $first_name = $row['first_name'];

            $last_name = $row['last_name'];

            $contact_no = $row['contact_no'];

            $district = $row['district'];

            $id = $row['id'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            First name:<br>

            <input type="text" name="first_name" value="<?php echo $first_name; ?>">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <br>

            Last name:<br>

            <input type="text" name="last_name" value="<?php echo $last_name; ?>">

            <br>

           contact nb:<br>

            <input type="nb" name="contact_no" value="<?php echo $contact_no; ?>">

            <br>

            district:<br>

            <input type="district" name="district" value="<?php echo $district; ?>">

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