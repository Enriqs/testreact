<?php require_once "web/header.php"; ?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

</style>
</head>
<body>

<h5>Homestay Detail</h5>

<div class="row">
<div class="container">
    <form action=<?php echo $_SERVER['PHP_SELF'] ?> method="GET">
        <input type="hidden" name="action"  value="home-search"/>
        <input type="hidden" name="category"  value="name"/>
        <input type="submit" value="Reservation" />
    </form>
</div>    
<?php
    if (! empty($result)) {
        foreach ($result as $k => $v) {
            // print_r ($result);
            $imgId = substr($_GET["id"], 1);
?>
<div class="row">
    <div class="row">
        <div class="col-5">
            <?php
                echo "<img src='web/image/homemom/1".$imgId.".JPG' >";
            ?>
            
        </div>
        <div class="col-7">
            <?php echo $result[$k]["introduction"] ?>
        </div>
    </div>
    <div class="alert alert-primary" role="alert"> HOMENAME <?php echo $result[$k]["name"]; ?></div>
    <div class="alert alert-secondary" role="alert">PHONE NUMBER : <?php echo $result[$k]["phone_number"]; ?></div>
    <div class="alert alert-success" role="alert">SCORE :  <?php echo $result[$k]["score"]; ?></div>
    <div class="alert alert-danger" role="alert">PRICE :  <?php echo $result[$k]["price"]; ?></div>
    <div class="alert alert-warning" role="alert">ZIPCODE :  <?php echo $result[$k]["zip_number"]; ?></div>
    <div class="alert alert-info" role="alert">LOCATION1 :  <?php echo $result[$k]["location1"]; ?></div>
    <div class="alert alert-light" role="alert">LOCATION2 :  <?php echo $result[$k]["location2"]; ?></div>
    <div class="alert alert-dark" role="alert">AMENITIES :  <?php echo $result[$k]["amenities"]; ?></div>
    <div class="alert alert-primary" role="alert">INTRODUCTION  : <?php echo $result[$k]["introduction"]; ?></div>
    <div class="alert alert-success" role="alert">meal_kind :  <?php echo $result[$k]["meal_kind"]; ?></div>
    <div class="alert alert-danger" role="alert">meal_count :  <?php echo $result[$k]["meal_count"]; ?></div>
    <div class="alert alert-warning" role="alert">meal_price :  <?php echo $result[$k]["meal_price"]; ?></div>
    <div class="alert alert-info" role="alert">allergies :  <?php echo $result[$k]["allergies"]; ?></div>
</div>



<?php
    }
}
?>
</div>

</body>
</html>