<?php
include "config.php";

if (isset($_POST['submit_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "SELECT * FROM invoice WHERE `date` BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <th>invoice_no</th>
                    <th>date</th>
                    <th>customer</th>
                    <th>item_count</th>
                    <th>amount</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['invoice_no'] ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['customer'] ?></td>
                            <td><?= $row['item_count'] ?></td>
                            <td><?= $row['amount'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "No data found";
    }

    // Stop further execution to prevent displaying the initial data table
    exit();
}

$sql = "SELECT * FROM invoice";
$run = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Filter between two dates</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <section style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <h1>Data Filter between two dates</h1>
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
                            <input type="submit" name="submit_date" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
