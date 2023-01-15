<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">student_id</label> <span
            id="name-info" class="info"></span><br /> <input type="text"
            name="student_id" id="student_id" class="demoInputBox"
            value="<?php echo $result[0]["student_id"]; ?>" readonly>
    </div>
    <div>
        <label style="padding-top: 20px;">pass</label> <span
            id="name-info" class="info"></span><br /> <input type="text"
            name="pass" id="pass" class="demoInputBox"
            value="<?php echo $result[0]["pass"]; ?>">
    </div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span
            id="fname-info" class="info"></span><br /> <input type="text"
            name="fname" id="fname" class="demoInputBox"
            value="<?php echo $result[0]["fname"]; ?>">
    </div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span
            id="lname-info" class="info"></span><br /> <input type="text"
            name="lname" id="lname" class="demoInputBox"
            value="<?php echo $result[0]["lname"]; ?>">
    </div>
    <div>
        <label>cell_number</label> <span id="cell-number-info"
            class="info"></span><br /> <input type="text"
            name="cell_number" id="cell_number" class="demoInputBox"
            value="<?php echo $result[0]["cell_number"]; ?>">
    </div>
    <div>
        <label>dob</label> <span id="dob-info"
            class="info"></span><br /> <input type="text"
            name="dob" id="dob" class="demoInputBox"
            value="<?php echo $result[0]["dob"]; ?>">
    </div>
    <div>
        <label>school_id</label> <span id="class-info" class="info"></span><br />
        <input type="text" name="school_id" id="school_id" class="demoInputBox"
            value="<?php echo $result[0]["school_id"]; ?>">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Edit" />
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script>
function validate() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#pass").val()) {
        $("#pass-info").html("(required)");
        $("#pass").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#fname").val()) {
        $("#fname-info").html("(required)");
        $("#fname").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#lname").val()) {
        $("#lname-info").html("(required)");
        $("#lname").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#cell_number").val()) {
        $("#cell-number-info").html("(required)");
        $("#cell_number").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#dob").val()) {
        $("#dob-info").html("(required)");
        $("#dob").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#school_id").val()) {
        $("#school_id-info").html("(required)");
        $("#school_id").css('background-color','#FFFFDF');
        valid = false;
    }   
    return valid;
}
</script>
    </body>
    </html>