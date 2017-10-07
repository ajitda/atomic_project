<?php
include_once ('../../../vendor/autoload.php');

use App\Utility\Utility;
use App\Birthday\Birthday;

$obj= new Birthday();
$allData=$obj->index();
//var_dump($allData);
$trs="";
$sl=0;
foreach($allData as $oneData) {
    $id =  $oneData->id;
    $name = $oneData->name;
    $birthday =$oneData->birthday;

    $sl++;
    if($sl%2==0)
        $colour='\'aqua\'';
    else
        $colour='\'#f0f8ff\'';
    $trs .= "<tr  bgcolor=$colour>";
    $trs .= "<td  width='50'> $sl</td>";
    $trs .= "<td width='150'> $id </td>";
    $trs .= "<td width='150'> $name </td>";
    $trs .= "<td width='150'> $birthday</td>";
    $trs .= "</tr>";
}
$html= <<<BITM
<div class="table-responsive">
            <table align="center"  class="table table-bordered">
                <thead >
                <tr bgcolor="#ffebcd">
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Name</th>
                    <th align='left' >Birthday</th>                    
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
$mpdf->Output('birthday.pdf', 'D');