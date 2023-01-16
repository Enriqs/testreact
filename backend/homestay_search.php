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

<h4>Homestay Search List</h4>

<div class="row">
<div class="container">
    <form action="./homestay_search.php" method="GET">
        <input type="hidden" name="action"  value="home-search"/>
        <input type="hidden" name="category"  value="name"/>
        <input type="text" name="keyword" />
        <input type="submit" value="Search" />
    </form>
</div>    
<?php
        // $keyword = $_GET['keyword'];
    if (! empty($result)  ) {
        foreach ($result as $k => $v) {
            // print_r ($sortValue);
            // if(strpos($result[$k]["name"],$keyword)) {
            //     print_r($result);
            //     } 
         
?>
<div class="column">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <img src="web/image/homestay/<?php echo $result[$k]["home_id"]; ?>.png" alt="<?php echo $result[$k]["home_id"]; ?>" style="width:100%">
                <li class="breadcrumb-item">
                    <a class="btnEditAction" href="index.php?action=home-detail&id=<?php echo $result[$k]["home_id"]; ?>">
                        <?php echo $result[$k]["name"]; ?>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $result[$k]["price"]; ?> CAD</li>
                <li class="breadcrumb-item active">Amenities: <?php echo $result[$k]["amenities"]; ?></li>
                <li class="breadcrumb-item">Score: 
                    <?php 
                        $score = $result[$k]["score"];
                        switch ($score) {
                            case $score >= 90:
                                echo $score."<img src='web/image/medal/gold.JPG' style='width:10%'>";
                                break;
                            case $score >= 80:
                                echo $score."<img src='web/image/medal/silver.JPG' style='width:10%'>";
                                break;
                            case $score >= 70:
                                echo $score."<img src='web/image/medal/bronze.JPG' style='width:10%'>";
                                break;
                            default:
                                echo $score;
                                break;
                        }
                    ?>
                </li>
            </ul>
        </nav>
      </div>
  </div>

<?php
    }
}
?>
</div>

</body>
</html>