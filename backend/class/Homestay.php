<?php 
require_once ("class/DBController.php");
class Homestay
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addHome($name, $phone_number, $score, $price, $location1, $location2, $zip_number, $amenities, $start_date, $introduction, $meal_id ) {
        $query = "INSERT INTO tbl_home (name,phone_number,score,price,location1,location2,zip_number,amenities,start_date,introduction,meal_id) VALUES (?, ?, ?, ?,?,?,?,?,?,?,?)";
        $paramType = "siiissssdsi";
        $paramValue = array(
            $name,
            $phone_number, 
            $score, 
            $price, 
            $location1, 
            $location2, 
            $zip_number, 
            $amenities, 
            $start_date, 
            $introduction, 
            $meal_id 
        );
        
        $insertId = $this->db_handle->insert($query,$paramType, $paramValue);
        return $insertId;
    }
    
    function editHome($name, $phone_number, $score, $price, $location1, $location2, $zip_number, $amenities, $start_date, $introduction, $meal_id) {
        $query = "UPDATE tbl_home SET name = ?,phone_number=?, score = ?,price = ?,location1 = ?,location2 = ?,zip_number = ?,amenities = ?,start_date = ?, introduction = ? , meal_id = ? WHERE home_id = ?";
        $paramType = "siiissssdsi";
        $paramValue = array(
            $name,
            $phone_number, 
            $score, 
            $price, 
            $location1, 
            $location2, 
            $zip_number, 
            $amenities, 
            $start_date, 
            $introduction, 
            $meal_id 
        );
        
        $this->db_handle->update($query,$paramType, $paramValue);
    }
    
    function deleteHome($home_id) {
        $query = "DELETE FROM tbl_home WHERE home_id = ?";
        $paramType = "i";
        $paramValue = array(
            $home_id
        );
        $this->db_handle->update($query,$paramType, $paramValue);
    }
    
    // function getHomeById($home_id) {
    //     $query = "SELECT * FROM tbl_home WHERE home_id = ?";
    //     $paramType = "i";
    //     $paramValue = array(
    //         $home_id
    //     );
        
    //     $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
    //     return $result;
    // }
    
    function getHomeByIdWmom($home_id) {
        $query = "SELECT h.*, o.*, m.* FROM tbl_home as h 
                  LEFT JOIN tbl_owner as o ON h.home_id = o.home_id 
                  LEFT JOIN tbl_meal as m ON h.meal_id = m.meal_id 
                  WHERE h.home_id = ?";

        $paramType = "s";
        $paramValue = array(
            $home_id
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function searchHomeByName($keyword) {
        $query = "SELECT * FROM tbl_home WHERE name like '%$keyword%'";
        // $query = "SELECT h.*, o.*, m.* FROM tbl_home as h 
        // LEFT JOIN tbl_owner as o ON h.home_id = o.home_id 
        // LEFT JOIN tbl_meal as m ON h.meal_id = m.meal_id 
        // WHERE h.name = ?";
        print_r($query);

        $paramType = "s";
        $paramValue = array(
            $keyword
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getHome() {
        $sql = "SELECT * FROM tbl_home ORDER BY home_id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    
    // 오름차순
    function getHomeSort() {
        $sql = "SELECT * FROM tbl_home ORDER BY name  ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    // 내림차순
    function getHomeRSort() {
        $sql = "SELECT * FROM tbl_home ORDER BY name DESC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    //  키값으로 배열 정렬
    function getHomeScoreSort() {
        $sql = "SELECT * FROM tbl_home ORDER BY score desc";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    // 키값으로 배열 정렬
    function getHomePriceSort() {
        $sql = "SELECT * FROM tbl_home ORDER BY price asc";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>