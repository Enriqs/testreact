<?php require_once "web/header.php"; ?>
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=student-add"><img src="web/image/icon-add.png" />Add Student</a>
    </div>
    <div id="toys-grid">
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>student_id</strong></th>
                    <th><strong>pass</strong></th>
                    <th><strong>name</strong></th>
                    <th><strong>cell_number</strong></th>
                    <th><strong>dob</strong></th>
                    <th><strong>school_id</strong></th>
                    <th><strong>Action</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                    ?>
          <tr>
                    <td><?php echo $result[$k]["student_id"]; ?></td>
                    <td><?php echo $result[$k]["pass"]; ?></td>
                    <td><?php echo $result[$k]["fname"]. $result[$k]["lname"]; ?></td>
                    <td><?php echo $result[$k]["cell_number"]; ?></td>
                    <td><?php echo $result[$k]["dob"]; ?></td>
                    <td><?php echo $result[$k]["school_id"]; ?></td>
                    <td><a class="btnEditAction"
                        href="index.php?action=student-edit&id=<?php echo $result[$k]["student_id"]; ?>">
                        <img src="web/image/icon-edit.png" />
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=student-delete&id=<?php echo $result[$k]["student_id"]; ?>">
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