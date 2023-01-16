<?php
require_once ("class/DBController.php");
require_once ("class/Student.php");
require_once ("class/Attendance.php");
require_once ("class/Reservation.php");
require_once ("class/Homestay.php");

$db_handle = new DBController();

$action = "";
if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "attendance-add":
        if (isset($_POST['add'])) {
            $attendance = new Attendance();
            
            $attendance_timestamp = strtotime($_POST["attendance_date"]);
            $attendance_date = date("Y-m-d", $attendance_timestamp);
            
            if(!empty($_POST["student_id"])) {
                $attendance->deleteAttendanceByDate($attendance_date);
                foreach($_POST["student_id"] as $k=> $student_id) {
                    $present = 0;
                    $absent = 0;
                    
                    if($_POST["attendance-$student_id"] == "present") {
                        $present = 1;
                    }
                    else if($_POST["attendance-$student_id"] == "absent") {
                        $absent = 1;
                    }
                    
                    $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
                }
            }
            header("Location: index.php?action=attendance");
        }
        $student = new Student();
        $studentResult = $student->getAllStudent();
        require_once "web/attendance-add.php";
        break;
    
    case "attendance-edit":
        $attendance_date = $_GET["date"];
        $attendance = new Attendance();
        if (isset($_POST['add'])) {
            $attendance->deleteAttendanceByDate($attendance_date);
            if(!empty($_POST["student_id"])) {
                foreach($_POST["student_id"] as $k=> $student_id) {
                    $present = 0;
                    $absent = 0;
                    
                    if($_POST["attendance-$student_id"] == "present") {
                        $present = 1;
                    }
                    else if($_POST["attendance-$student_id"] == "absent") {
                        $absent = 1;
                    }
                    
                    $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
                }
            }
            header("Location: index.php?action=attendance");
        }
        
        $result = $attendance->getAttendanceByDate($attendance_date);
        
        $student = new Student();
        $studentResult = $student->getAllStudent();
        require_once "web/attendance-edit.php";
        break;
    
    case "attendance-delete":
        $attendance_date = $_GET["date"];
        $attendance = new Attendance();
        $attendance->deleteAttendanceByDate($attendance_date);
        
        $result = $attendance->getAttendance();
        require_once "web/attendance.php";
        break;
    
    case "attendance":
        $attendance = new Attendance();
        $result = $attendance->getAttendance();
        require_once "web/attendance.php";
        break;
    
    case "reservation-add":
        if (isset($_POST['add'])) {
            $reservation = new Reservation();
            
            $reservation_timestamp = strtotime($_POST["start_date"]);
            $reservation_date = date("Y-m-d", $reservation_timestamp);
            
            if(!empty($_POST["reservation_id "])) {
                $reservation->deleteReservationByDate($reservation_date);
                foreach($_POST["reservation_id "] as $k=> $reservation_id ) {
                    $reservation->addReservation($student_id, $home_id, $school_id, $start_date, $end_date, $meal_id, $total_price) ;
                }
            }
            header("Location: index.php?action=reservation");
        }
        $student = new Student();
        $studentResult = $student->getAllStudent();
        require_once "web/reservation-add.php";
        break;
    
    case "reservation-edit":
        $reservation_date = $_GET["date"];
        $reservation = new Reservation();
        if (isset($_POST['add'])) {
            $attendance->deleteReservationByDate($start_date);
            if(!empty($_POST["reservation_id "])) {
                foreach($_POST["reservation_id "] as $k=> $reservation_id ) {
                    $reseravation->addReservation($student_id, $home_id, $school_id, $start_date, $end_date, $meal_id, $total_price);
                }
            }
            header("Location: index.php?action=reservation");
        }
        
        $result = $reservation->getReservationByDate($reservation_date);
        
        $student = new Student();
        $studentResult = $student->getAllStudent();
        require_once "web/reservation-edit.php";
        break;
    
    case "reservation-delete":
        $reservation_date = $_GET["date"];
        $reservation = new Reservation();
        $reservation->deleteReservationByDate($start_date);
        
        $result = $reservation->getReservation();
        require_once "web/reservation.php";
        break;
    
    case "reservation":
        $reservation = new Reservation();
        $result = $reservation->getReservation();
        require_once "web/reservation.php";
        break;
    case "reservation-add":
        if (isset($_POST['add'])) {
            $reservation = new Reservation();
            
            $reservation_timestamp = strtotime($_POST["start_date"]);
            $reservation_date = date("Y-m-d", $reservation_timestamp);
            
            if(!empty($_POST["reservation_id "])) {
                $reservation->deleteReservationByDate($reservation_date);
                foreach($_POST["reservation_id "] as $k=> $reservation_id ) {
                    $reservation->addReservation($student_id, $home_id, $school_id, $start_date, $end_date, $meal_id, $total_price) ;
                }
            }
            header("Location: index.php?action=reservation");
        }
        $reservation = new Reservation();
        $reservationResult = $reservation->getAllReservation();
        require_once "web/reservation-add.php";
        break;
    
    case "home-edit":
        $home_date = $_GET["date"];
        $home = new Homestay();
        if (isset($_POST['add'])) {
            $home->deleteHomeByDate($home_id);
            if(!empty($_POST["home_id "])) {
                foreach($_POST["home_id "] as $k=> $home_id ) {
                    $home->addHome($home_id, $name, $phone_number, $score, $price, $location1, $location2, $zip_number, $amenities, $start_date, $introduction, $meal_id);
                }
            }
            header("Location: index.php?action=home");
        }
        
        $result = $home->getHomeByDate($home_id);
        
        $home = new Homestay();
        $homeResult = $home->getAllHome();
        require_once "web/homestay-edit.php";
        break;
    
    case "home-delete":
        $home_date = $_GET["date"];
        $home = new Homestay();
        $home->deleteHomeByDate($home_id);
        
        $result = $home->getHome();
        require_once "web/homestay_delete.php";
        break;
        
    case "home-detail":
        $home_id = $_GET["id"];
        $home = new Homestay();
        $result = $home->getHomeByIdWmom($home_id);
        require_once "web/homestay_detail.php";
        break;

    case "home-search":
        $keyword = $_GET["keyword"];
        $home = new Homestay();
        $result = $home->getHome();
        // $result = $home->searchHomeByName($keyword);
        require_once "web/homestay.php";
        break;

    case "home-sort":
            $home = new Homestay();
            $result = $home->getHomeSort();
            require_once "web/homestay_sort.php";
            break;

    case "home-rsort":
            $home = new Homestay();
            $result = $home->getHomeRSort();
            require_once "web/homestay_rsort.php";
            break;

    case "home-scoresort":
            $home = new Homestay();
            $result = $home->getHomeScoreSort();
            require_once "web/homestay_scoresort.php";
            break;

    case "home-pricesort":
            $home = new Homestay();
            $result = $home->getHomePriceSort();
            require_once "web/homestay_pricesort.php";
            break;

    case "home":
        $home = new Homestay();
        $result = $home->getHome();
        require_once "web/homestay.php";
        break;

    case "student-add":
        if (isset($_POST['add'])) {
            $pass = $_POST['pass'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $cell_number = $_POST['cell_number'];
            
            $dob = "";
            if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $school_id = $_POST['school_id'];
            
            $student = new Student();
            $insertId = $student->addStudent($pass, $fname,$lname,$cell_number, $dob, $school_id);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php");
            }
        }
        require_once "web/student-add.php";
        break;
    
    case "student-edit":
        $student_id = $_GET["id"];
        $student = new Student();
        
        if (isset($_POST['add'])) {
            $pass = $_POST['pass'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $cell_number = $_POST['cell_number'];
            $dob = "";
            if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $school_id = $_POST['school_id'];
            
            $student->editStudent($pass, $fname, $lname, $cell_number, $dob, $school_id, $student_id);
            
            header("Location: index.php");
        }
        
        $result = $student->getStudentById($student_id);
        require_once "web/student-edit.php";
        break;
        
    
    case "student-delete":
        $student_id = $_GET["id"];
        $student = new Student();
        
        $student->deleteStudent($student_id);
        
        $result = $student->getAllStudent();
        require_once "web/student.php";
        break;
    
    default:
        $student = new Student();
        $result = $student->getAllStudent();
        require_once "web/student.php";
        break;
}
?>