<?php
namespace App\BookTitle;
use App\Message\Message;
use App\Model\Database;
use App\ProfilePicture\ProfilePicture;
use App\Utility\Utility;
use PDO;

class BookTitle extends Database
{
    protected $id, $bookTitle, $authorName;
    public function setData($postDataArray)
    {
        if (array_key_exists('City',$postDataArray))
            $this->bookTitle=$postDataArray['City'];
        if(array_key_exists('id',$postDataArray))
              $this->id = $postDataArray['id'];
        if(array_key_exists('AuthorName',$postDataArray))
             $this->authorName = $postDataArray['AuthorName'];
    }
    public function store(){
        if($this->bookTitle==""||$this->authorName=="") {
            Message::message("Please enter all required fields perfectly Than Click the <b>Submit</b> button ");
            return "redirect_create";
        }
        else
        {
            $sqlQuery = "INSERT INTO book_title (book_title, author_name) VALUES (? , ?)";
            $dataArray = [ $this->bookTitle, $this->authorName ];
            $sth =  $this->dbh->prepare($sqlQuery);
            $status =  $sth->execute($dataArray);
            if($status)
                Message::setMessage("Success! Data has been inserted successfully. <br>");
            else
                Message::setMessage("Failed! Data has not been inserted. <br>");
            return "redirect_index";
        }
    }

    public function update(){

            $a=$this->id;
           // Utility::vd_die($a);
        $sqlQuery  = "UPDATE book_title SET book_title=?, author_name = ? WHERE id=".$a;
        $dataArray = [$this->bookTitle, $this->authorName];
        $sth = $this->dbh->prepare($sqlQuery);
        $status =  $sth->execute($dataArray);
        if($status)
            Message::setMessage("Success! Data has been updated successfully. <br>");
        else
            Message::setMessage("Failed! Data has not been updated. <br>");
    }

    public function viewAllData(){
        $sql= "SELECT *FROM book_title WHERE is_trashed='NO'";
        $sth=$this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }
    public function viewSingleData(){

        $sqlQuery = "SELECT * FROM book_title WHERE id=".$this->id;
        $sth =  $this->dbh->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $oneData =  $sth->fetch();
        return $oneData;
    }
    public function delete()
    {
        $sqlQuery = "DELETE FROM book_title WHERE id=".$this->id;
        $status = $this->dbh->exec( $sqlQuery );
        if($status)
            Message::setMessage("Success! Data has been deleted successfully. <br>");
        else
            Message::setMessage("Failed! Data has not been deleted. <br>");
    }
    public function trash()
    {
        $sqlQuery = "UPDATE book_title SET is_trashed=NOW() WHERE id=" . $this->id;
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
        $sqlQuery = "UPDATE book_title SET is_trashed='NO' WHERE id=".$this->id;
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
        $sql= "SELECT *FROM book_title WHERE is_trashed <>'NO'"; // This is database not equal sign  <>
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

            $sqlQuery = "UPDATE book_title SET is_trashed=NOW() WHERE id=$id"  ;

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
            $sqlQuery = "DELETE FROM book_title WHERE id=".$tempID;
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
            $sqlQuery = "UPDATE book_title SET is_trashed='NO' WHERE id=$id"  ;
            if ( ! $this->dbh-> exec($sqlQuery) )
                $status = false;
        }
        if($status)
            Message::message("Success! All Seleted Data Has Been Recovered");
        else
            Message::message("Failed! All Seleted Data Has Not Been Recovered");
    }

    public function index(){
        $sqlQuery = "Select * from book_title WHERE is_trashed='NO'";
        $sth =  $this->dbh->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allData =  $sth->fetchAll();
        return $allData;
    }

    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `book_title` WHERE `is_trashed` ='No' AND (`book_title` LIKE '%".$requestArray['search']."%' OR `author_name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `book_title` WHERE `is_trashed` ='No' AND `book_title` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `book_title` WHERE `is_trashed` ='No' AND `author_name` LIKE '%".$requestArray['search']."%'";
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
            $_allKeywords[] = trim($oneData->book_title);
        }
        $allData = $this->index();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->book_title);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end
        // for each search field block start
        $allData = $this->index();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->author_name);
        }
        $allData = $this->index();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->author_name);
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
            $sql = "SELECT * from book_title  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";

        }catch (PDOException $error){
            $sql = "SELECT * from book_title  WHERE is_trashed = 'No'";
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
            $sql = "SELECT * from book_title  WHERE is_trashed = 'Yes' LIMIT $start,$itemsPerPage";

        }catch (PDOException $error){
            $sql = "SELECT * from book_title  WHERE is_trashed = 'Yes'";
        }
        $STH = $this->dbh->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }









}
