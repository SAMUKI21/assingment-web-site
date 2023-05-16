<?php 

include "config.php";

$sql = "SELECT * FROM customer";

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

        <h2>customers</h2>

<table class="table">

    <thead>

        <tr>

        <th>Id</th>

        <th>Title</th>

        <th>First Name</th>

        <th>Last Name</th>

        <th>Contact</th>

        <th>District</th>

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

                    <td><?php echo $row['title']; ?></td>
                    
                    <td><?php echo $row['first_name']; ?></td>

                    <td><?php echo $row['last_name']; ?></td>

                    <td><?php echo $row['contact_no']; ?></td>

                    <td><?php echo $row['district']; ?></td>

                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>