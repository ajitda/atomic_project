<?php
include_once ('../../../vendor/autoload.php');
use App\ProfilePicture\ProfilePicture;

$obj= new ProfilePicture();
$allData=$obj->index();
 //var_dump($allData);
$trs="";
$sl=0;

    foreach($allData as $oneData) {
        $id =  $oneData->id;
        $name = $oneData->name;
        $picture =$oneData->profile_picture;

        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='10'> $sl</td>";
        $trs .= "<td width='50'> $id </td>";
        $trs .= "<td width='100'> $name </td>";
        $trs .= "<td width='250'><img height='100px' width='100px' src='Uploads/$picture'>  </td>";

        $trs .= "</tr>";
    }

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Name</th>
                    <th align='left' >Profile Pic</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>


BITM;


// Require composer autoload
require_once ('../../../vendor/mpdf/mpdf/src/Mpdf.php');
//Create an instance of the class:

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('profile_picture_list.pdf', 'D');