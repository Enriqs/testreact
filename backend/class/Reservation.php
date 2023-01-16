<?php 
require_once ("class/DBController.php");
class Reservation {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addReservation($student_id, $home_id, $school_id, $start_date, $end_date, $meal_id, $total_price) {
        $query = "INSERT INTO tbl_reservation (student_id,home_id,school_id,start_date,end_date, meal_id,total_price) VALUES (?, ?, ?, ?,?,?,?)";
        $paramType = "siii";
        $paramValue = array(
            $student_id,
            $home_id, 
            $school_id, 
            $start_date, 
            $end_date, 
            $meal_id, 
            $total_price
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function deleteReservationByDate($start_date) {
        $query = "DELETE FROM tbl_reservation WHERE start_date = ?";
        $paramType = "s";
        $paramValue = array(
            $start_date
        );
        $this->db_handle->update($query,$paramType, $paramValue);
    }
    
    function getReservationByDate($start_date) {
        $query = "SELECT * FROM tbl_reservation as r LEFT JOIN tbl_student as s ON r.student_id = s.student_id ORDER By s.student_id";
        $paramType = "s";
        $paramValue = array(
            $start_date
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getReservation() {
        // $sql = "SELECT * FROM tbl_reservation as r LEFT JOIN tbl_student as s ON r.student_id = s.student_id ORDER By s.student_id";
        $sql = "SELECT r.*, s.*, sch.*, m.*
        FROM tbl_reservation as r
        INNER JOIN tbl_student as s on r.student_id = s.student_id
        INNER JOIN tbl_school as sch on r.school_id = sch.school_id
        INNER JOIN tbl_meal as m on r.meal_id = m.meal_id";
        // $sql = "SELECT reservation_id, start_date, sum(total_price) as present, sum(absent) as absent FROM tbl_reservation GROUP By start_date";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>