<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">home_id</label> <span
            id="home_id-info" class="info"></span><br /> <input type="text"
            name="home_id" id="home_id" class="demoInputBox">
    </div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span
            id="name-info" class="info"></span><br /> <input type="text"
            name="name" id="name" class="demoInputBox">
    </div>
    <div>
        <label style="padding-top: 20px;">phone_number</label> <span
            id="phone_number-info" class="info"></span><br /> <input type="text"
            name="phone_number" id="phone_number" class="demoInputBox">
    </div>
    <div>
        <label style="padding-top: 20px;">score</label> <span
            id="score-info" class="info"></span><br /> <input type="text"
            name="score" id="score" class="demoInputBox">
    </div>
    <div>
        <label>price</label> <span id="price-info" class="info"></span><br />
        <input type="date" name="price" id="price" class="demoInputBox">
    </div>
    <div>
        <label>location1</label> <span id="location1-info"
            class="info"></span><br /> <input type="text"
            name="location1" id="location1" class="demoInputBox">
    </div>
    <div>
        <label>location2</label> <span id="location2-info"
            class="info"></span><br /> <input type="text"
            name="location2" id="location2" class="demoInputBox">
    </div>
    <div>
        <label>zip_number</label> <span id="zip_number-info"
            class="info"></span><br /> <input type="text"
            name="zip_number" id="zip_number" class="demoInputBox">
    </div>
    <div>
        <label>amenities</label> <span id="amenities-info"
            class="info"></span><br /> <input type="text"
            name="amenities" id="amenities" class="demoInputBox">
    </div>
    <div>
        <label>start_date</label> <span id="start_date-info"
            class="info"></span><br /> <input type="text"
            name="start_date" id="start_date" class="demoInputBox">
    </div>
    <div>
        <label>introduction</label> <span id="introduction-info"
            class="info"></span><br /> <input type="text"
            name="introduction" id="introduction" class="demoInputBox">
    </div>
    <div>
        <label>meal_id</label> <span id="meal_id-info"
            class="info"></span><br /> <input type="text"
            name="meal_id" id="meal_id" class="demoInputBox">
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
    
    if(!$("#name").val()) {
        $("#name-info").html("(required)");
        $("#name").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#phone_number").val()) {
        $("#phone_number-info").html("(required)");
        $("#phone_number").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#score").val()) {
        $("#score-info").html("(required)");
        $("#score").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#price").val()) {
        $("#price-info").html("(required)");
        $("#price").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#location1").val()) {
        $("#location1-info").html("(required)");
        $("#location1").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#location2").val()) {
        $("#location2-info").html("(required)");
        $("#location2").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#zip_number").val()) {
        $("#zip_number-info").html("(required)");
        $("#zip_number").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#amenities").val()) {
        $("#amenities-info").html("(required)");
        $("#amenities").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#start_date").val()) {
        $("#start_date-info").html("(required)");
        $("#start_date").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#introduction").val()) {
        $("#introduction-info").html("(required)");
        $("#introduction").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#meal_id ").val()) {
        $("#meal_id-info").html("(required)");
        $("#meal_id ").css('background-color','#FFFFDF');
        valid = false;
    }   
    return valid;
}
</script>
</body>
</html>