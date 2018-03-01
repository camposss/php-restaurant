<?php 
define("TITLE", "Contact Us| Franklin's Fine Dining");

include('includes/header.php');

?>

<div id="contact">
    <hr>
    <h1>Get in touch with us</h1>
    <?php
        function has_header_injection($str){
            return preg_match("/[\r\n]/", $str );
        }
        if(isset($_POST['submit'])){
            //trim will clear white spaces from beg and end of the text
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $message = $_POST['message'];

            if(has_header_injection($name) || has_header_injection($email)){
                die();
            }
            if(!$name || !$email || !$message){
                echo "<h4 class= 'error'> All Fields Required</h4><a class= 'button block' href='contact.php'>Go back and try again</a>";
                exit;
            }

            $to= "ccamposs23@gmail.com";
            $subject= "$name sent you a message via your contact form";
            $email_message= "Name: $name\r\n";
            $email_message.= "Email: $email\r\n";
            $email_message .= "Message: \r\n$message";

            if(isset($_POST['subscribe']) && $_POST['subscribe']== 'Subscribe'){
                $email_message.= "\r\n\r\nPlease add $email to the mailing list. \r\n";
            }
            $email_message= wordwrap($email_message,72);

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
            $headers.= "From: $name <$email>\r\n";
            $headers.= "X-Priority: 1\r\n";
            $headers.= "X-MSMail-Priority: High\r\n\r\n";

            mail($to, $subject, $email_message, $headers);


    ?>
    <h5>Thanks for contacting Franklin's</h5>
    <p>Please allow 24 hours for a response.</p>
    <p><a href="/final" class="button block">&laquo; Go to Home Page</a></p>
    <?php }else {
         
    ?>
    <form action="" method= "post" name= "submit" id= "contact-form">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name">

        <label for="email">Your Email</label>
        <input type="email" id="email" name="email">

        <label for="message">Your Message</label>
        <textarea type="text" id="message" name="message"></textarea>

        <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">
        <label for="subscribe">Subscribe to newsletter</label>

        <input type="submit" class="button next" name="submit" value="Send Message">

    </form>
</div>

    <?php } ?>

<?php include('includes/footer.php');?>