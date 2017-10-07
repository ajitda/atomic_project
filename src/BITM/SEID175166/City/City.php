<?php
namespace App\City;
use App\Message\Message;
use App\Model\Database;
use App\Utility\Utility;
use PDO;

class City extends Database
{
    protected $id, $city;
    public function setData($postDataArray)
    {
        if (array_key_exists('City',$postDataArray))
            $this->city=$postDataArray['City'];
        if(array_key_exists('id',$postDataArray))
              $this->id = $postDataArray['id'];
    }
    public function store(){
        if($this->city=="") {
            Message::message("Please enter all required fields perfectly Than Click the <b>Submit</b> button ");
            return "redirect_create";
        }
        else
        {
            $sqlQuery = "INSERT INTO city (city) VALUES (? )";
            $dataArray = [ $this->city ];
            $sth =  $this->dbh->prepare($sqlQuery);
            $status =  $sth->execute($dataArray);
            if($status)
                Message::setMessage("Success! Data has been inserted successfully. <br>");
            else
                Message::setMessage("Failed! Data has not been inserted. <br>");
            return "redirect_index";
        }
    }

    public function storeTowTable(){
        if($this->city=="") {
            Message::message("Please enter all required fields perfectly Than Click the <b>Submit</b> button ");
            return "redirect_create";
        }
        else
        {
            $sqlQuery1 = "INSERT INTO city (city) VALUES (? )";
            $dataArray1 = [ $this->city ];
            $sth1 =  $this->dbh->prepare($sqlQuery1);
            $status1 =  $sth1->execute($dataArray1);
            $sqlQuery2 = "INSERT INTO city_list (city_name) VALUES (? )";
            $dataArray2 = [ $this->city ];
            $sth2 =  $this->dbh->prepare($sqlQuery2);
            $status2 =  $sth2->execute($dataArray2);
            if($status1&&$status2)
                Message::setMessage("Success! Data has been inserted successfully. <br>");
            else
                Message::setMessage("Failed! Data has not been inserted. <br>");
            return "redirect_index";
        }
    }

    public function update(){

            $a=$this->id;
           // Utility::vd_die($a);
        $sqlQuery  = "UPDATE city SET city=? WHERE id=".$a;
        $dataArray = [$this->city];
        $sth = $this->dbh->prepare($sqlQuery);
        $status =  $sth->execute($dataArray);
        if($status)
            Message::setMessage("Success! Data has been updated successfully. <br>");
        else
            Message::setMessage("Failed! Data has not been updated. <br>");
    }
    public function getCityList()
    {
        $sql= "SELECT *FROM city_list ";
        $sth=$this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $temp= $sth->fetchAll();
        $cityList="";
        foreach ($temp as $cityName)
        {
            $cityList=$cityList."<option>".$cityName->city_name."</option>";
        }
        $cityList=$cityList."<option>Others</option>";

        return $cityList;
    }

    public function viewAllData(){
        $sql= "SELECT *FROM city WHERE is_trashed='NO'";
        $sth=$this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }
    public function viewSingleData(){

        $sqlQuery = "SELECT * FROM city WHERE id=".$this->id;
        $sth =  $this->dbh->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $oneData =  $sth->fetch();
        return $oneData;
    }
    public function delete()
    {
        $sqlQuery = "DELETE FROM city WHERE id=".$this->id;
        $status = $this->dbh->exec( $sqlQuery );
        if($status)
            Message::setMessage("Success! Data has been deleted successfully. <br>");
        else
            Message::setMessage("Failed! Data has not been deleted. <br>");
    }
    public function trash()
    {
        $sqlQuery = "UPDATE city SET is_trashed=NOW() WHERE id=" . $this->id;
        $status = $this->dbh->exec($sqlQuery);
        if ($status) {
            Message::setMessage("Success! Data has been trashed successfully. <br>");
            return true;
        } else {
            Message::setMessage("Failed! Data has not been trashed. <br>");
            return false;
        }
    }
    public function recover()
    {
        $sqlQuery = "UPDATE city SET is_trashed='NO' WHERE id=".$this->id;
        $status = $this->dbh->exec($sqlQuery);
        if ($status) {
            Message::setMessage("Success! Data has been recovered successfully. <br>");
            return true;
        } else {
            Message::setMessage("Failed! Data has not been recovered. <br>");
            return false;
        }
    }


    public function viewTrashData(){
        $sql= "SELECT *FROM city WHERE is_trashed <>'NO'"; // This is database not equal sign  <>
        $sth=$this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }


    public function trashMultiple($selectedIDs){
        if( count($selectedIDs) == 0) {
            Message::message("Empty Selection! Please Select Some Record(s).");
            return;
        }
        $status = true;
        foreach ($selectedIDs as $id){

            $sqlQuery = "UPDATE city SET is_trashed=NOW() WHERE id=$id"  ;

            if ( ! $this->dbh-> exec($sqlQuery) )
                $status = false;
        }
        if($status)
            Message::message("Success! All Seleted Data Has Been Trashed");
        else
            Message::message("Failed! All Seleted Data Has Not Been Trashed");

    }

    public function deleteMultiple($selectedIDs){
        if( count($selectedIDs) == 0) {
            Message::message("Empty Selection! Please Select Some Record(s).");
            return;
        }
        $status = true;
        foreach ($selectedIDs as $tempID)
        {
            $sqlQuery = "DELETE FROM city WHERE id=".$tempID;
            $status = $this->dbh->exec($sqlQuery);
            if ($status) {
                Message::setMessage("Success! Data has been deleted successfully. <br>");
                return true;
            } else {
                Message::setMessage("Failed! Data has not been deletedd. <br>");
                return false;
            }

        }
    }
    public function recoverMultiple($selectedIDs){
        if( count($selectedIDs) == 0) {
            Message::message("Empty Selection! Please Select Some Record(s).");
            return;
        }
        $status = true;
        foreach ($selectedIDs as $id){
            $sqlQuery = "UPDATE city SET is_trashed='NO' WHERE id=$id"  ;
            if ( ! $this->dbh-> exec($sqlQuery) )
                $status = false;
        }
        if($status)
            Message::message("Success! All Seleted Data Has Been Recovered");
        else
            Message::message("Failed! All Seleted Data Has Not Been Recovered");
    }

    public function index(){
        $sqlQuery = "Select * from city WHERE is_trashed='NO'";
        $sth =  $this->dbh->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allData =  $sth->fetchAll();
        return $allData;
    }

    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `city` WHERE `is_trashed` ='No' AND (`city` LIKE '%".$requestArray['search']."%' OR `author_name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `city` WHERE `is_trashed` ='No' AND `city` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `city` WHERE `is_trashed` ='No' AND `author_name` LIKE '%".$requestArray['search']."%'";
        $STH  = $this->dbh->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();
        return $someData;

    }// end of search()
    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->city);
        }
        $allData = $this->index();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->city);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end
        return array_unique($_allKeywords);
    }// get all keywords


    public function indexPaginator($page=1,$itemsPerPage=3){
        try{
            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from city  WHERE is_trashed = 'NO' LIMIT $start,$itemsPerPage";

        }catch (PDOException $error){
            $sql = "SELECT * from city  WHERE is_trashed = 'NO'";
        }
        $STH = $this->dbh->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }
    public function trashedPaginator($page=1,$itemsPerPage=3){

        try{
            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from city  WHERE is_trashed <>'NO' LIMIT $start,$itemsPerPage";

        }catch (PDOException $error){
            $sql = "SELECT * from city  WHERE is_trashed <> 'NO'";
        }
        $STH = $this->dbh->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }









}
