<?php
include 'navbar.php';

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

    form {
        width: 80%;
        margin: 3rem auto;
        background-color: white;
        font-family: var(--poppins);
        padding: 2rem 5rem;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    form ul {
        margin-top: 2rem;
    }

    form ul li {
        list-style: none;
        display: flex;
        margin: 1rem 0;
    }

    form ul li label {
        flex: 1;
    }

    form ul li input {
        flex: 3;
        height: 2rem;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid black;
        font-family: var(--poppins);
    }

    form ul li input[type="submit"] {
        background-color: black;
        border: none;
        color: white;
        font-family: var(--poppins);
    }

    form ul li textarea {
        flex: 3;
        background-color: transparent;
    }

    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
    }

    form ul li span {
        flex: 1;
    }

    form h2 {
        text-align: center;
        font-family: var(--playfair);
        font-weight: bold;
    }

    form p {
        text-align: center;
    }

    .map-text {
        margin: 3rem 0;
        font-family: var(--playfair);
    }
    </style>

</head>

<body>
    <form action="">
        <h2>Contact Us</h2>
        <p>Fill this form for any query related to our products and company</p>
        <ul>
            <li>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Write Your Full Name" />
            </li>

            <li>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Write Your Email" />
            </li>

            <li>
                <label for="contact">Contact</label>
                <input type="tel" name="mobile" placeholder="Write Your Contact Number" />
            </li>

            <li>
                <label for="reference-no.">Reference Number</label>
                <input type="number" name="reference" placeholder="Reference number here" />
            </li>

            <li>
                <label for="date">Date of purchase</label>
                <input type="date" name="date" />
            </li>

            <li>
                <label for=" message">Message</label>
                <textarea name="message" id="message" placeholder="Type your query here" cols="30" rows="10"></textarea>
            </li>

            <li>
                <span></span>
                <input type="submit" value="Submit" />
            </li>
        </ul>
    </form>
    <div class="mapouter">
        <div class="map-text">
            <h1>Reach Us</h1>
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



</body>

</html>
<?php
include 'footer.php';
?>