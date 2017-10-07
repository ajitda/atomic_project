<?php
    require_once ("../../../vendor/autoload.php");

    $obj  = new \App\ProfilePicture\ProfilePicture();

   
     // Start of physically moving file to its destination 
   
     $fileName =   time().$_FILES["File2Upload"]["name"];
     
     $source = $_FILES["File2Upload"]["tmp_name"];
         
     $destination = "Uploads/".$fileName;
         
     move_uploaded_file($source, $destination);
    
     // End of physically moving file to its destination 



    // Start of the process to store file name to the table  
    $_POST["ProfilePicture"] = $fileName;
    
    $obj->setData($_POST);
    
    $obj->store();
   
   // End of the process to store file name to the table  



    \App\Utility\Utility::redirect("index.php");













