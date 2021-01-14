<html>

<head>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700;900&family=Montserrat:wght@400;700;900&family=Pacifico&family=Playfair+Display:wght@400;700;900&family=Poppins:wght@400;700;900&display=swap"
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

    header {
        width: 100%;
        height: 6rem;
        display: flex;
        justify-content: space-between;
        padding: 0 7%;
        font-family: var(--poppins);
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px,
            rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    header .logo img {
        height: 6rem;
        width: auto;
        object-fit: contain;
    }

    header ul {
        display: flex;
        align-items: center;
    }

    header ul li {
        list-style: none;
        margin-left: 3rem;
    }

    header ul li a {
        text-decoration: none;
        font-size: 1rem;
        color: black;
    }
    </style>
</head>

<body>
    <header>
        <div class="logo"><img src="image/logo.jpg" alt="" /></div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </header>


</body>

</html>