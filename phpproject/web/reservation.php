<?php require_once "web/header.php"; ?>
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=reservation-add"><img src="web/image/icon-add.png" />Add Reservation</a>
    </div>
    <div id="toys-grid">
        <table cellpadding="10" cellspacing="1" class="reservation_table">
            <thead>
                <tr>
                    <th><strong>reservation_id</strong></th>
                    <th><strong>student_name</strong></th>
                    <th><strong>student_dob</strong></th>
                    <th><strong>student_phone</strong></th>
                    <th><strong>home_id</strong></th>
                    <th><strong>School_name</strong></th>
                    <th><strong>start_date</strong></th>
                    <th><strong>end_date</strong></th>
                    <th><strong>meal_id</strong></th>
                    <th><strong>total_price</strong></th>
                    <th><strong>Edit/Del</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            // print_r($result);
                            ?>
          <tr>
              <td><?php echo $result[$k]["reservation_id"]; ?></td>
              <td><?php echo $result[$k]["fname"]." ".$result[$k]["lname"]; ?></td>
              <td><?php echo $result[$k]["dob"]; ?></td>
              <td><?php echo $result[$k]["cell_number"]; ?></td>
              <td><?php echo $result[$k]["home_id"]; ?></td>
              <td><?php echo $result[$k]["name"]; ?></td>
                    <td><?php 
                    $start_date = "";
                    if(!empty($result[$k]["start_date"])) {
                        $reservation_timestamp = strtotime($result[$k]["start_date"]);
                        $start_date = date("m-d-Y", $reservation_timestamp);
                    }
                    echo $start_date; ?></td>
                    <td><?php 
                    $end_date = "";
                    if(!empty($result[$k]["end_date"])) {
                        $reservation_timestamp = strtotime($result[$k]["end_date"]);
                        $end_date = date("m-d-Y", $reservation_timestamp);
                    }
                    echo $end_date; ?></td>
                    <td><?php echo $result[$k]["meal_id"]; ?></td>
                    <td><?php echo $result[$k]["total_price"]; ?></td>
                    <td><a class="btnEditAction"
                        href="index.php?action=reservation-edit&date=<?php echo $result[$k]["start_date"]; ?>">
                        <img src="web/image/icon-edit.png" />
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=reservation-delete&date=<?php echo $result[$k]["total_price"]; ?>">
                        <img src="web/image/icon-delete.png" />
                        </a>
                    </td>
                </tr>
                    <?php
                        }
                    }
                    ?>
                
            
            
            <tbody>
        
        </table>
    </div>
</body>
</html>