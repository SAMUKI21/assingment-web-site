<?php
include "config.php";

$query = "SELECT item_name, item_category, item_subcategory, SUM(quantity) AS total_quantity
          FROM item
          GROUP BY item_name, item_category, item_subcategory";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <section style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <h1>Item Report</h1>
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Item Category</th>
                                    <th>Item Subcategory</th>
                                    <th>Item Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?= $row['item_name'] ?></td>
                                        <td><?= $row['item_category'] ?></td>
                                        <td><?= $row['item_subcategory'] ?></td>
                                        <td><?= $row['total_quantity'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else {
                    echo "No data found";
                } ?>
            </div>
        </div>
    </section>
</body>
</html>
