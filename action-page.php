<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "sebastiaanjooste@gmail.com";
    $email_subject = "New form submissions";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic website</title>
    <link 
    rel="stylesheet" 
    href="style.css"
    />
    <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    />
    <link
    href="https://fonts.googleapis.com/css?family=Poppins:200i,300,400&display=swap"
    rel="stylesheet"
    />
</head>
<body>
    <div class="navbar">
        <div class="logo"><i class="fas fa-atom social fa-fw fa-large" ></i><i class="text-logo fa-fw">X Cranium</i>
           <!-- <img src="images/XCranium.png" alt="logo" height="60px"> -->
         </div>
         
         <div class="navbar-link navbar-link-toggle">
           <i class="fas fa-bars"></i>
         </div>

       <nav class="navbar-menu navbar-menu-right">
         <div class="navbar-link"> 
            <a href="#home">Home</a>
         </div>
         <div class="navbar-link">
            <a href="#about">About</a>
         </div>
         <div class="navbar-link">
            <a href="#why">Why us</a>
         </div>
         <div class="navbar-link">
            <a href="#contact">Contact</a>
        </div>
       </nav>
     </div>

     <header id="home" class="hero">

         <div class="hero-text">
             <div>
                <h1>Thank you for contacting us.</h1>
                <p>We will be in touch with you very soon.</p>
                    <a href="index.html" class="button">
                        <i class="fa fa-home"></i> RETURN TO HOME
                    </a>
            </div>
         </div>
     
    </header>

<main style="padding-bottom: 0px;">


<script src="index.js"></script>
</main>
<footer>
    <div class="rights">
    <p>
      &copy; Created by
      <a href="#" target="_blank"
        >X Cranium</a>
    </p>
    </div>
    <div class="fa-jumbo">
        <a href="#"><i class="fab fa-facebook social"></i></a>
        <a href="#"><i class="fab fa-instagram social"></i></a>
        <a href="#"><i class="fab fa-snapchat social"></i></a>
        <a href="#"><i class="fab fa-pinterest-p social"></i></a>
        <a href="#"><i class="fab fa-twitter social"></i></a>
        <a href="#"><i class="fab fa-linkedin social"></i></a> 
    </div>
  </footer> 
</body>
</html>

<?php
}
?>