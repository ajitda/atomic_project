<?php
namespace App\ProfilePicture;

use App\Message\Message;
use App\Model\Database;
use App\Utility\Utility;
use PDO;

class ProfilePicture extends Database
{
     public $id, $name, $profilePicture;

     
     public function setData($postArray){

         if(array_key_exists("id",$postArray))
             $this->id = $postArray["id"];

         if(array_key_exists("Name",$postArray))
             $this->name = $postArray["Name"];
         
         if(array_key_exists("ProfilePicture",$postArray))
               $this->profilePicture = $postArray["ProfilePicture"];
         

     }// end of setData Method


    public function store(){

        $sqlQuery = "INSERT INTO profile_picture ( name, profile_picture) VALUES ( ?, ?)";
        $sth = $this->dbh->prepare( $sqlQuery );
      
      
        $dataArray = [ $this->name, $this->profilePicture ];
    
        $status = $sth->execute($dataArray);

        if($status)
    
            Message::message("Success! Data has been inserted successfully<br>");
        else
            Message::message("Failed! Data has not been inserted<br>");

    }// end of store() Method
    
    
    
    
    
    
    
    public function index(){
        
          $sqlQuery = "SELECT * FROM profile_picture  WHERE is_trashed='NO' ";
        
          $sth = $this->dbh->query($sqlQuery);
           
          $sth->setFetchMode(PDO::FETCH_OBJ);
        
          $allData=  $sth->fetchAll();
          return $allData;
        
    }// end of index() Method






    public function view(){

        $sqlQuery = "SELECT * FROM profile_picture WHERE id=".$this->id;

        $sth = $this->dbh->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $oneData=  $sth->fetch();
        return $oneData;

    }// end of index() Method






    public function update(){

        $sqlQuery = "UPDATE profile_picture SET name=?, profile_picture=? WHERE id=".$this->id;

        $sth = $this->dbh->prepare( $sqlQuery );


        $dataArray = [ $this->name, $this->profilePicture ];

        $status = $sth->execute($dataArray);

        if($status)

            Message::message("Success! Data has been updated successfully<br>");
        else
            Message::message("Failed! Data has not been updated<br>");

    }// end of store() Method




    public function delete(){

        $sqlQuery = "DELETE FROM profile_picture where id=".$this->id;

        $status = $this->dbh->exec($sqlQuery);


        if($status)

            Message::message("Success! Data has been deleted successfully<br>");
        else
            Message::message("Failed! Data has not been deleted<br>");


    }//end of delete() Method




    public function trash(){


        $sqlQuery = "UPDATE profile_picture SET is_trashed=NOW() WHERE id=".$this->id;


        $status = $this->dbh->exec($sqlQuery);

        if($status)

            Message::message("Success! Data has been trashed successfully<br>");
        else
            Message::message("Failed! Data has not been trashed<br>");



    }// end of trash()




    public function trashed(){

        $sqlQuery = "SELECT * FROM profile_picture  WHERE is_trashed<>'NO'";

        $sth = $this->dbh->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $allData=  $sth->fetchAll();
        return $allData;

    }// end of trashed() Method





    public function recover(){


        $sqlQuery = "UPDATE profile_picture SET is_trashed='NO' WHERE id=".$this->id;


        $status = $this->dbh->exec($sqlQuery);

        if($status)

            Message::message("Success! Data has been recovered successfully<br>");
        else
            Message::message("Failed! Data has not been recovered<br>");



    }// end of recover()




    public function trashMultiple($selectedIDs){

        if( count($selectedIDs) == 0 ){
            Message::message("Empty Selection! Please Select Some Records.<br>");
            return;
        }


        $status = true;

        foreach ($selectedIDs as $id){

            $sqlQuery = "UPDATE profile_picture SET is_trashed=NOW() WHERE id=$id";

             if( !  $this->dbh->exec($sqlQuery)  )   $status = false;
        }

        if($status)
            Message::message("Success! All Selected Data Has Been Trashed Successfully<br>");
        else
            Message::message("Failed! All Selected Data Has Not Been Trashed<br>");



    }// end of trashMultiple




    public function recoverMultiple($selectedIDs){

        if( count($selectedIDs) == 0 ){
            Message::message("Empty Selection! Please Select Some Records.<br>");
            return;
        }


        $status = true;

        foreach ($selectedIDs as $id){

            $sqlQuery = "UPDATE profile_picture SET is_trashed='NO' WHERE id=$id";

            if( !  $this->dbh->exec($sqlQuery)  )   $status = false;
        }

        if($status)
            Message::message("Success! All Selected Data Has Been Recovered Successfully<br>");
        else
            Message::message("Failed! All Selected Data Has Not Been Recovered<br>");



    }// end of recoverMultiple


 public function deleteMultiple($selectedIDs){

        if( count($selectedIDs) == 0 ){
            Message::message("Empty Selection! Please Select Some Records.<br>");
            return;
        }


        $status = true;

        foreach ($selectedIDs as $id){

            $sqlQuery = "DELETE FROM profile_picture  WHERE id=$id";

             if( !  $this->dbh->exec($sqlQuery)  )   $status = false;
        }

        if($status)
            Message::message("Success! All Selected Data Has Been Deleted Successfully<br>");
        else
            Message::message("Failed! All Selected Data Has Not Been Deleted<br>");



    }// end of deleteMultiple





    public function indexPaginator($page=1,$itemsPerPage=3){


            $start = (($page-1) * $itemsPerPage);  // start means offset
            if($start<0) $start = 0;
            $sql = "SELECT * from profile_picture  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


            $STH = $this->dbh->query($sql);

            $STH->setFetchMode(PDO::FETCH_OBJ);

            $arrSomeData  = $STH->fetchAll();
            return $arrSomeData;


    }// end of indexPaginator() Method



    public function trashedPaginator($page=1,$itemsPerPage=3){



            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from profile_picture  WHERE is_trashed = 'Yes' LIMIT $start,$itemsPerPage";



            $STH = $this->dbh->query($sql);

            $STH->setFetchMode(PDO::FETCH_OBJ);

            $arrSomeData  = $STH->fetchAll();
            return $arrSomeData;




    }// end of trashPaginator() Method







    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byName']) && isset($requestArray['byPicture']) )  $sql = "SELECT * FROM `profile_picture` WHERE `is_trashed` ='No' AND (`name` LIKE '%".$requestArray['search']."%' OR `profile_picture` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byName']) && !isset($requestArray['byPicture']) ) $sql = "SELECT * FROM `profile_picture` WHERE `is_trashed` ='No' AND `name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byName']) && isset($requestArray['byPicture']) )  $sql = "SELECT * FROM `profile_picture` WHERE `is_trashed` ='No' AND `profile_picture` LIKE '%".$requestArray['search']."%'";


       

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
            $_allKeywords[] = trim($oneData->name);
        }



        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->name);
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
            $_allKeywords[] = trim($oneData->profile_picture);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->profile_picture);
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







}// end of ProfilePicture Class