<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pet Shop</title>
  <meta charset="utf-8">
  
  <?php include_once 'helper/template/include.php'; ?>
</head>
<body>

<?php include_once 'helper/template/header.php'; ?>
  
<div class="container text-center">
  <h3>
  
    <?php
      include "./database/db.php";
      $query = "SELECT * FROM pets";
      $res = $conn->query($query);
      if( isset($_SESSION["username"]) ) {
    ?>
      Welcome, <?php echo $_SESSION["username"]; ?>
      <?php } else{ ?>
      Welcome, Guest
    <?php  } ?>
  </h3><br>
  <div class="row">
  <?php while($row = $res->fetch_assoc()) {?>
    <div class="col-sm-4 distance">
      <p><b> <?php echo $row["type"]; ?> </b></p>
      <center>
        <img src="./public/image/product/<?php echo $row["image"]; ?>" class="img-responsive" alt="Image">
      </center>
      <p><?php echo $row["breed"]; ?></p>
      <p>Rp <?php echo $row["price"]; ?></p>
      <?php if( isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {?>
      <a class="btn btn-warning" href="./checkout.php?id=<?php echo $row["id"]; ?>">Purchase</a>
      <?php }?>
      <?php if( isset($_SESSION["username"]) && $_SESSION["username"] == "admin") {?>
      <a class="btn btn-warning" href="./update.php?id=<?php echo $row["id"]; ?>">Update</a>     
      <a class="btn btn-danger" href="./controller/doDelete.php?id=<?php echo $row["id"]; ?>">Delete</a>
      <?php }?>     
    </div>

      <?php
        }?>
  </div>
</div><br>

<?php include_once 'helper/template/footer.php' ?>

</body>
</html>
