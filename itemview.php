<?php 

include "config.php";

$sql = "SELECT * FROM item";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Item view</h2>

<table class="table">

    <thead>

        <tr>
        
        <th>Id</th>

        <th>Item_code</th>

        <th>Item_name</th>

        <th>Item_category</th>

        <th>Item_subcategory</th>

        <th>Quantity</th>

        <th>Unit_price</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>
                    
                    <td><?php echo $row['item_code']; ?></td>

                    <td><?php echo $row['item_name']; ?></td>

                    <td><?php echo $row['item_category']; ?></td>

                    <td><?php echo $row['item_subcategory']; ?></td>

                    <td><?php echo $row['quantity']; ?></td>

                    <td><?php echo $row['unit_price']; ?></td>

                    <td><a class="btn btn-info" href="itemupdate.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="itemdelete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>