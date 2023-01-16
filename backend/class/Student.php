<?php 
require_once ("class/DBController.php");
class Student
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }

    function addStudent($pass, $fname, $lname, $cell_number, $dob, $school_id) {
        $query = "INSERT INTO tbl_student (pass,fname,lname,cell_number,dob,school_id) VALUES (?, ?, ?, ?, ?, ?)";
        $paramType = "sssisi";
        $paramValue = array(
            $pass,
            $fname,
            $lname,
            $cell_number,
            $dob,
            $school_id
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    
    function addStudent_1($pass, $fname, $lname, $cell_number, $dob, $school_id ) {
       // $query = "INSERT INTO tbl_student (pass,fname,lname,cell_number,dob,school_id) VALUES (?,?,?,?,?,?)";
        $query1 ="insert into tbl_student values (NULL, '".$pass."', '".$fname."', '".$lname."', '.$cell_number.', '".$dob."', '.$school_id.')";
        $query= "INSERT INTO tbl_student (pass, fname, lname, cell_number,dob, school_id) VALUES ('$pass','$fname','$lname',$cell_number,'$dob', $school_id)";
        $paramType = "sssisi";
        $paramValue = array(
            $pass,
            $fname,
            $lname,
            $cell_number,
            $dob,
            $school_id
        );
        
        // $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        $insertId = $this->db_handle->insert();
        return $insertId;
    }

    function editStudent($pass, $fname, $lname, $cell_number, $dob, $school_id, $student_id) { 
        $query = "UPDATE tbl_student SET pass = ?,fname = ?,lname = ?,cell_number = ?,dob = ?,school_id = ? WHERE student_id = ?";
        $paramType = "sssisii";
        $paramValue = array(
            $pass, 
            $fname, 
            $lname, 
            $cell_number, 
            $dob, 
            $school_id, 
            $student_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    
    function editStudent_1($pass = null,$fname = null, $lname = null, $cell_number = null,$dob = null, $school_id = null) {
       // $sql = "UPDATE `tbl_student` SET `school_id` = \'5005\' WHERE `tbl_student`.`student_id` = 2001;";
     //  UPDATE `tbl_student` SET `pass` = '12345', `fname` = 'Congg', `lname` = 'Shawade', `cell_number` = '2001342343', `dob` = '2000-06-06', `school_id` = '5004' WHERE `tbl_student`.`student_id` = 2002;
      //  $sql = "UPDATE tbl_student SET pass = \'12345\', fname = \'Congg\', lname = \'Shawade\', cell_number = \'2001342343\', dob = \'2000-06-06\', school_id = \'5004\' WHERE tbl_student.student_id = 2002;";
        $query = "UPDATE tbl_student SET pass ='?', fname = '?',lname='?', cell_number = ?, dob='?', school_id = ? WHERE student_id = ?";
        // $paramType = "sssii";
        $paramType = "sssisi";
        $paramValue = array(
            $pass,
            $fname,
            $lname,
            $cell_number,
            $dob,
            $school_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteStudent($student_id) {
        $query = "DELETE FROM tbl_student WHERE student_id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getStudentById($student_id) {
        $query = "SELECT * FROM tbl_student WHERE student_id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllStudent() {
        $sql = "SELECT * FROM tbl_student ORDER BY student_id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>