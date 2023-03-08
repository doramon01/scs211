<?php
// Include config file
require_once "../config.php";
// Prepare a select statement
$sql = "SELECT * FROM products WHERE id = '{$_GET["id"]}'";
// echo $sql;
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 0) {
    // URL doesn't contain valid id parameter. Redirect to error page
    header("location: ../error.php");
    exit();
}
/* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Record</title>
    <?php include('../layouts/employee-style.php'); ?>
</head>

<body>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">แสดงรายละเอียดข้อมูลสินค้า</h1>
                    <div class="form-group">
                        <label>ชื่อสินค้า</label>
                        <p><b><?= $row["title"] ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>รายละเอียดสินค้า</label>
                        <p><b><?= $row["description"] ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>ราคา</label>
                        <p><b><?= $row["price"] ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-body">
    Hello, world! This is a toast message.
    <div class="mt-2 pt-2 border-top">
      <button type="button" class="btn btn-primary btn-sm">Take action</button>
      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
    </div>
  </div>
</div>
    <?php include('../layouts/employee-script.php'); ?>
</body>

</html>