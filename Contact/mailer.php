<html>

<head>

    <style>
    .message {
        background-color: lightpink;
        width: 100%;
        height: 100vh;
        font-size: 1.5rem;
        color: green;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .countdown {
        margin-top: 3rem;
        color: red;
        font-weight: bolder;
    }
    </style>

</head>

<body>

    <div class="message">

        <?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $reference = $_POST['reference'];
    $date=$_POST["date"];
    $msg = $_POST['message'];

    $to = 'mkd0017@gmail.com';
    $subject = 'Form Submission Report';
    $message = " Name : " .$name."\n"." Phone : " .$mobile."\n"."E-Mail : " .$email."\n"."Reference Number : " .$reference."\n"."date :".$date. " Message : " .$msg."\n\n"."Wrote the following Message : "."\n".$msg;
    $headers = "From : ".$email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo "Mail sent sucessfully! Thank you"." ".$name.",We will get back to you shortly."; ?>

        <!-- url of hosting website -->

        <META HTTP-EQUIV="Refresh" CONTENT="7 URL=">


        <?php
    } else {
        echo "something went wrong!";
    }
}

?>



        <div id="countdown" class="countdown"></div>

    </div>


    <script>
    var timeleft = 7;
    var downloadTimer = setInterval(function() {
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
            document.getElementById("countdown").innerHTML = "Redirected";
        } else {
            document.getElementById("countdown").innerHTML = "Redirecting in " + timeleft;
        }
        timeleft -= 1;
    }, 1000);
    </script>


</body>

</html>