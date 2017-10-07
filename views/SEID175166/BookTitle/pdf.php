<?php
include_once ('../../../vendor/autoload.php');
use App\ProfilePicture\ProfilePicture;
use App\Utility\Utility;
use App\BookTitle\BookTitle;

$obj= new BookTitle();
$allData=$obj->index();
//var_dump($allData);
$trs="";
$sl=0;
foreach($allData as $oneData) {
    $id =  $oneData->id;
    $bookTitle = $oneData->book_title;
    $authorName =$oneData->author_name;

    $sl++;
    if($sl%2==0)
        $colour='\'aqua\'';
    else
        $colour='\'#f0f8ff\'';
    $trs .= "<tr  bgcolor=$colour>";
    $trs .= "<td  width='50'> $sl</td>";
    $trs .= "<td width='150'> $id </td>";
    $trs .= "<td width='150'> $bookTitle </td>";
    $trs .= "<td width='150'> $authorName</td>";
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