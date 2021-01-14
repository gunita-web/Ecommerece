<?php
include ('header.php');
include ('form.php');

?>
<html>

<head>
    <link
        href="https://fonts.googleapis.com/css2?:wght@400;700;900&family=Pacifico&family=Playfair+Display:wght@400;700;900&family=Poppins:wght@400;700;900&display=swap"
        rel="stylesheet" />

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --playfair: "Playfair Display", serif;
        --poppins: "Poppins", sans-serif;
    }



    .map-text {
        margin: 3rem 0;
        font-family: var(--playfair);
    }

    .map-text h1 {
        font-size: 2.5rem;
        color: #266de9;
        text-align: center;
    }

    .map-text p {
        font-family: var(--poppins);
        text-align: center;
        color: black;
        font-size: 1rem;
        line-height: 2rem;
    }
    </style>

</head>

<body>

    <div class="mapouter">
        <div class="map-text">
            <h1>Reach Us</h1>
            <p>5km away from downtown Montreal and 7km away from International Airport</p>
        </div>
        <div class="gmap_canvas"><iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89524.96911819051!2d-73.68685445473095!3d45.47674755074872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc918e0c061b07f%3A0x647a6b6d7cb681a7!2sISI%2C%20L&#39;institut%20Sup%C3%A9rieur%20d&#39;Informatique!5e0!3m2!1sen!2sca!4v1606542156656!5m2!1sen!2sca"
                width="80%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
        <style>
        .mapouter {
            /* position: relative; */
            text-align: center;
            height: auto;
            width: 100%;
        }

        .gmap_canvas {
            /* overflow: hidden; */
            background: none !important;
            height: auto;
            width: 100%;
            margin-bottom: 3rem;
        }
        </style>
    </div>

    <?php include 'footer.php'?>

</body>

</html>