<?php require 'PHPMailer/PHPMailerAutoload.php';?>
<?php
function Redirect_to($New_Location)
{header("Location:" . $New_Location);
    exit;
}

if (isset($_POST['submit'])) {
    contact();
}

function contact()
{
    if (isset($_POST['submit'])) {

        $fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$phoneNum = $_POST['phoneumber'];
	$email = $_POST['email'];
	$package = $_POST['country'];
	$message = $_POST['subject'];


        date_default_timezone_set('Etc/UTC');

        $mail = new PHPMailer();

        $mail->setFrom('jemina.cayme.sy@gmail.com');
        $mail->addAddress('jemina.cayme.sy@gmail.com');

        $mail->Subject = 'New form Submission (Contact Us)';

        $mail->Body = "<h3>First Name: $fname <br /> 
			Last Name: $lname <br />
			Phone Number: $phoneNum <br /> 
			Email: $email <br /> 
			Package: $package <br /> 
			Message: $message</h3>";

        $mail->isHTML(true);

        if ($mail->send()) {
            $alert = '<div class = "alert-success">
			<span>Message sent! Thank you for contacting us.</span>
			</div>';
        } else {
            $alert = '<div class = "alert-error">
			<span>Something went wrong! Please try again later.</span>
			</div>';
        }

    } 

}

?>
