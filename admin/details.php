<?
include_once('includes/config.php');
 
$rs=mysqli_query($con,"Select * from `student` where student_id='".$_GET['id']."'");   
$rw=mysqli_fetch_assoc($rs); 
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->Image('/images/details.jpg', 0, 0, 20, 30);	
$mpdf->showImageErrors = true;
$pdf_content="<p>Student Name: ".$rw['student_name']."</p> 
               <p>Student ID No: ".$rw['student_idno']."</p>
               <p>Student Email: ".$rw['student_email']."</p>
			   <p>Student Phone Number:".$rw['student_no']."</p> 
			   <p>Branch:".$rw['student_branch']."</p>
			   <p>Student Batch:".$rw['student_batch']."</p>
			   <p>Student Address:".$rw['student_address']."</p>
			   <p>1st Year 1st Sem %:".$rw['student_1_1']."</p>
			   <p>1st Year 2nd Sem %:".$rw['student_1_2']."</p>
			   <p>2nd Year 1st Sem %:".$rw['student_2_1']."</p>
			   <p>2nd Year 2nd Sem %:".$rw['student_2_2']."</p>
			   <p>3rd year 1st Sem %:".$rw['student_3_1']."</p>
			   <p>3rd year 2nd Sem %:".$rw['student_3_2']."</p>
			   <p>4th Year 1st Sem %:".$rw['student_4_1']."</p>
			   <p>4th Year 2nd Sem %:".$rw['student_4_2']."</p>
			   <p>Students Tenth %:".$rw['student_tenth']."</p>
               <p>Students Inter %:".$rw['student_inter']."</p>
               <p>Students Graduation %:".$rw['student_grad']."</p>";  
	 


$mpdf->WriteHTML($pdf_content); 
$mpdf->output(); 
?>