<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\ProfilePicture\ProfilePicture;

$obj = new ProfilePicture();
$obj->setData($_GET);

$oneData  =  $obj->view();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>



    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>




</head>
<body>

<div class="container">


<?php

         echo "
             <h1> Single Profile Information </h1>
               
             <table class='table table-bordered table-striped'>
             
                    <tr>                   
                        <td>  <b>ID</b>  </td>                
                        <td>  <b>$oneData->id</b>  </td>                
                      
                    </tr>
        
                     <tr>                   
                        <td>  <b>Name</b>  </td>                
                        <td>  <b>$oneData->name</b>  </td>                
                      
                    </tr>
                         
                     <tr>                   
                        <td>  <b>Profile Picture</b>  </td>                
                        <td><img width='400px' height='400px' src='Uploads/$oneData->profile_picture'> </td>
                      
                    </tr>
                    
                    <tr>                  
                        <td class='text-center' colspan='2'>  <a class='btn bg-primary' href='index.php'> Back to Active List</a> </td>
                    </tr>
                
             
             </table>
             
             
             

         ";


?>

</div>

</body>
</html>