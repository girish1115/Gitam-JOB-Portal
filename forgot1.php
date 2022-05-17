<?
include "includes/config.php";
ob_start();

session_start();
    if(isset($_POST['btn_submit']))
    {
        $sqk=mysqli_query($con,"SELECT * from student where student_email='".$_POST['student_email']."'");
        $count  = mysqli_num_rows($sqk);
        $row= mysqli_fetch_assoc($sqk);
        require 'class/class.phpmailer.php';
        if($count>0){
            $output = '';
            $mail = new PHPMailer;
            $mail->IsSMTP();								//Sets Mailer to send message using SMTP
            $mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
            $mail->Port = '587';								//Sets the default SMTP server port
            $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
            $mail->Username = 'nsritengtpo@gmail.com';					//Sets SMTP username
            $mail->Password = 'nsrit_tpo123';					//Sets SMTP password
            $mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
            $mail->From = 'nsritengtpo@gmail.com';			//Sets the From email address for the message
            $mail->FromName = 'Training and Placement';					//Sets the From name of the message
            $mail->AddAddress($row["student_email"], $row["student_name"]);	//Adds a "To" address
            $mail->IsHTML(true);							//Sets message type to HTML
            $mail->Subject = 'Forgot Password'; //Sets the Subject of the message
            //An HTML or plain text message body
                $pass=$row['student_password'];
            $mail->Body = "<h2>Hello</h2><br/><p>Your Password is $pass</p>"; 
            $mail->AltBody = '';    
            $result = $mail->Send();						//Send an Email. Return true on success or false on error
            echo "<script>alert('Your request has sent to the admin');</script>";
            header( "location:index1.php" ); 
        }
        else {
            echo "<script>alert('Unsuccessful request');</script>";
        }
            if($result["code"] == '400')
            {
                $output .= html_entity_decode($result['full_error']);
            } 
    }    
?>