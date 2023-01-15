<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">pass</label> <span
            id="pass-info" class="info"></span><br /> <input type="text"
            name="pass" id="pass" class="demoInputBox">
    </div>
    <div>
        <label style="padding-top: 20px;">First Name</label> <span
            id="fname-info" class="info"></span><br /> <input type="text"
            name="fname" id="fname" class="demoInputBox">
    </div>
    <div>
        <label style="padding-top: 20px;">Last Name</label> <span
            id="lname-info" class="info"></span><br /> <input type="text"
            name="lname" id="lname" class="demoInputBox">
    </div>
    <div>
        <label style="padding-top: 20px;">cell_number</label> <span
            id="cell_number-info" class="info"></span><br /> <input type="text"
            name="cell_number" id="cell_number" class="demoInputBox">
    </div>
    <div>
        <label>Date of Birth</label> <span id="dob-info" class="info"></span><br />
        <input type="date" name="dob" id="dob" class="demoInputBox">
    </div>
    <div>
        <label>school_id</label> <span id="school_id-info"
            class="info"></span><br /> <input type="text"
            name="school_id" id="school_id" class="demoInputBox">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Add" />
    </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
<script>
function validate() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');

    return valid;
}
</script>
</body>
</html>