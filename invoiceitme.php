<?php
include "config.php";

if (isset($_POST['submit'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "SELECT invoice.invoice_no, invoice.date, invoice.customer, item.item_name, item.item_code, item.item_category, item.unit_price
              FROM invoice
              JOIN item ON invoice.id = item.id
              WHERE invoice.date BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Invoiced Date</th>
                        <th>Customer Name</th>
                        <th>Item Name</th>
                        <th>Item Code</th>
                        <th>Item Category</th>
                        <th>Item Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['invoice_no'] ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['customer'] ?></td>
                            <td><?= $row['item_name'] ?></td>
                            <td><?= $row['item_code'] ?></td>
                            <td><?= $row['item_category'] ?></td>
                            <td><?= $row['unit_price'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "No data found";
    }

    // Stop further execution to prevent displaying the initial form
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Item Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <section style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <h1>Invoice Item Report</h1>
                <form method="POST">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="date" name="start_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="date" name="end_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
