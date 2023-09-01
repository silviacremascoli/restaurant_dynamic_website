<?php
const TITLE = "Contact us | Franklin's Fine Dining";

include("includes/header.php");

?>

<div id="contact">
    <h1>Get in touch with us!</h1>

    <?php

    // checks for header injections
    function has_header_injections($str): false|int
    {
        return preg_match("/[\r\n]/", $str);
    }

    // checks whether the submit button has been clicked
    if (isset ($_POST['contact_submit'])) {
        // value in the name input
        $name = trim($_POST['name']);
        // value in the email input
        $email = trim($_POST['email']);
        // value in the textarea input
        $msg = $_POST['message'];
        
        // checks whether $name or $email have header injections
        if (has_header_injections($name) || has_header_injections($email)) {
            die(); // if true, kills the script
        }

        // checks whether the inputs have been filled
        if (!$name || !$email || !$msg) {
            echo '<div class="error-page"><h4 class="error">All fields required. Please fill in the missing fields.</h4><a href="contact.php" class="button">Go back and try again.</a></div>';
            exit;
        }

        // add the recipient's email to a variable
        $to = "silcremascoli@gmail.com";

        // create a subject
        $subject = "$name sent you a message via your contact form!";

        // construct the message (\r\n adds a break line)
        $message = "Name: $name\r\n";
        $message .= "Email: $email\r\n"; // concatenates the email to the previous text
        $message .= "Message:\r\n$msg"; // concatenates the message to the previous text

        // checks whether the subscribe box has been checked and the collected value is equal to 'Subscribe'
        if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {
            // add a new line to the message
            $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
        }

        // formats the text to have a maximum of 72 characters per line
        $message = wordwrap($message, 72);

        // set the mail headers into a variable
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: $name <$email> \r\n";
        // sets the priority for the email
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n\r\n";

        // send the email
        mail($to, $subject, $msg, $headers);

    ?>
    <!-- shows success message after email has been sent -->
        <div class="success-page">
            <h4>Thanks for contacting Franklin's!</h4>
            <p>Please allow 24 hours for a response.</p>
            <p><a href="index.php" class="button">← &nbsp; Go back to homepage</a></p>
        </div>
    <?php } else {

    ?>

    <form method="post" action="" id="contact-form">

        <label for="name">Your name</label>
        <input type="text" id="name" name="name">

        <label for="email">Your email</label>
        <input type="email" id="email" name="email">

        <label for="message">Your message</label>
        <textarea id="message" name="message"></textarea>

        <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">
        <label for="subscribe">Subscribe to our newsletter</label>

        <input type="submit" class="button" name="contact_submit" value="Send Message">

    </form>
    <?php } ?>
</div>



<?php include("includes/footer.php"); ?>
