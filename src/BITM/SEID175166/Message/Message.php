<?php
namespace App\Message;
if(!isset($_SESSION)) session_start();

class Message
{
    
    public static function setMessage($msg){
        
        $_SESSION['message'] = $msg;
        
    }
    
    
    public static function getMessage(){

          $messageTemp =  $_SESSION['message'];

           $_SESSION['message'] = "";

          return $messageTemp;
     
    }
    
    
    public static function message($msg = NULL){
        
        if(is_null($msg)){
            
           return  self::getMessage();
        }
        else
        {
            self::setMessage($msg);
            
        }
        
    }
    
    
}