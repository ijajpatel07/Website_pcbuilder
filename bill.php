<?php
session_start();

$server     = "localhost";
$username   = "root";
$password   = "";
$database   = "project";
$con = mysqli_connect($server, $username, $password, $database);
$products = array();
$price = array();
$item = "";
$userid = $_SESSION['userid'];
if (!$con) {
    die("Error : " . $con->connect_error);
}
$query = $con->query("select pdt_name from invoice where userid=('$userid')");
if ($query->num_rows > 0) {
    echo "<script>alert('Hello');</script>";
    while ($item = ($query->fetch_row())) {
        array_push($products, $item[0]);
    }
}
$len = count($products);
$query1 = $con->query("select price from invoice where userid=('$userid')");
if ($query1->num_rows > 0) {
    while ($item1 = ($query1->fetch_row())) {
        array_push($price, $item1[0]);
    }
}
echo "<script>alert('Hello');</script>";
if (($con->query("select name from customer where userid='$userid'"))->num_rows > 0) {
    $name = (($con->query("select name from customer where userid='$userid'"))->fetch_row())[0];
    $contact = (($con->query("select contact from customer where userid='$userid'"))->fetch_row())[0];
    $address = (($con->query("select address from customer where userid='$userid'"))->fetch_row())[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f70f5cadbf.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Bahianita|DM+Serif+Display|Roboto&display=swap" rel="stylesheet">

    <title>Invoice</title>
    <style>

    </style>
</head>

<body>

    <body>
        <div id="slideout-menu">
            <ul>
                <li><a href="components.php">Components</a></li>
                <li><a href="processor.html">Build your PC</a></li>


                <li>

                    <a href="cart.php"><i class="fa fa-shopping-cart">Cart</i></a>

                </li>
                <li>
                    <a href="login.php"><i class="fa fa-user">Account</i></a>

                </li>
            </ul>
        </div>
        <nav>
            <a href="home.html">
                <h1>PC Builder</h1>
            </a>
            <div id="menu-icon">
                <i class="fas fa-bars"></i>
            </div>
            <ul>

                <li><a href="components.php">Components</a></li>
                <li><a href="processor.html">Build your PC</a></li>

                <li>
                    <div id="cart-icon">
                        <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </li>
                <li>
                    <div id="user-icon">
                        <a href="login.php"><i class="fa fa-user"></i></a>
                    </div>
                </li>
            </ul>

        </nav>
        <div id="order-summary">
            <h1 align="center" style="color:white;">Order Summary</h1>

            <div id="details">
                <h2 style="color:white;">Customer details</h2>
                <p style="color:white;">Name:<?php echo $name; ?></p>
                <p style="color:white;">Contact:<?php echo $contact; ?></p>
                <p style="color:white;">Address:<?php echo $address; ?></p>
            </div>
            <table id="order" align="center"></table>
            <script>
                var i = 0;
                var l = <?php echo $len; ?>;
                var str = [<?php echo '"' . implode('","',  $products) . '"' ?>];
                alert(str);
                var total = 0;
                var price = [<?php echo '"' . implode('","',  $price) . '"' ?>];
                table = "<tr><th>Sr.No.</th><th>Product Name</th><th>Price(Rs.)</th></tr>";
                for (i = 0; i < l; i++) {
                    table += "<tr><td>" + (i + 1) +
                        '</td><td>' +
                        str[i] +
                        "</td><td>" + price[i] +
                        "</td></tr>";
                    total += parseInt(price[i]);

                }
                table += "<tr><td></td><td >Total" +
                    "</td><td>" + total +
                    "</td></tr>";
                var gst = total * 1.125;
                table += "<tr><td></td><td>GST" +
                    "</td><td>" + gst +
                    "</td></tr>";
                tot = total + gst + 50;
                table += "<tr><td></td><td>Delivery charges</td><td>50</td></tr>";
                table += "<tr><td></td><td>Total amount" +
                    "</td><td>" + tot +
                    "</td></tr>";
                document.getElementById("order").innerHTML = table;


                function func() {
                    window.location = "home.html";
                }
            </script>
            <p align="center" style="font-size:1.3vw;">Order will be delivered within 5-7 business days</p>
            <button onclick="func();" style="font-family: 'Roboto',sans-serif; text-transform: uppercase;outline: 0;background: dodgerblue;width: 30%;border: 0%;padding: 1.1vw;color: #ffffff;font-size: 1.5vw;cursor: pointer;margin-left:60vw;margin-bottom:3vw;">Continue shopping</button>
        </div>
        <footer>
            <div id="left-footer">

                <ul>
                    <li>
                        <h3>Quick Links</h3>
                    </li>
                    <li><a href="notice.html">Terms of Service</a></li>
                    <li><a href="notice.html">Privacy Policy</a></li>
                    <li><a href="notice.html">About Us</a></li>
                    <li><a href="notice.html">Contact Us</a></li>
                </ul>
            </div>
            <div id="left-footer2">

                <ul>
                    <li>
                        <h3>Services</h3>
                    </li>
                    <li><a href="components.php">Components</a></li>
                    <li><a href="processor.html">Build your PC</a></li>
                </ul>
            </div>

            <div id="right-footer">

                <ul>
                    <li>
                        <h3>Follow us</h3>
                    </li>
                    <li><a href="notice.html"><i class="fab fa-facebook"> Facebook</i></a></li>
                    <li><a href="notice.html"><i class="fab fa-instagram"> Instagram</i></a></li>
                    <li><a href="notice.html"><i class="fab fa-youtube"> Youtube</i></a></li>
                </ul>
            </div>

        </footer>
        <div id="lastline">
            <p>© 2019, TechEx Pvt Ltd. All Rights Reserved.</p>
        </div>
        </main>
        <script>
            const menuIcon = document.getElementById("menu-icon");
            const slideoutmenu = document.getElementById("slideout-menu");
            menuIcon.addEventListener('click', function() {
                if (slideoutmenu.style.opacity == "1") {
                    slideoutmenu.style.opacity = '0';
                    slideoutmenu.style.pointerEvents = 'none';
                } else {
                    slideoutmenu.style.opacity = '1';
                    slideoutmenu.style.pointerEvents = 'auto';
                }
            });
        </script>
    </body>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            background-image: url('CPU-Wallpaper-Free-Download.jpg');
        }

        h1 {
            margin-top: 0.3vw;
            font-size: 3.7vw;
            color: whitesmoke;
        }

        h2 {
            color: whitesmoke;
        }

        p {
            line-height: 1.5;
            color: white;
        }

        main {
            margin: 0 auto;
        }

        a {
            text-decoration: none;
            color: #ff0000cc;
        }

        a:hover {
            color: black;
        }

        #cart-icon {
            height: 100%;
            font-size: 2.3vw;
            color: whitesmoke;
            cursor: pointer;
            padding: 0 4px;
            transition: 0.4s;
            align-items: center;
            justify-content: stretch;
            margin-left: 8px;
        }

        #cart-icon:hover {
            color: black;

        }

        #user-icon {
            height: 100%;
            font-size: 2.3vw;
            color: whitesmoke;
            cursor: pointer;
            padding: 0 4px;
            transition: 0.4s;
            align-items: center;
            justify-content: stretch;
        }

        #user-icon:hover {
            color: black;

        }

        #menu-icon {
            display: none;
            height: 100%;
            font-size: 3.5vw;
            color: whitesmoke;
            padding: 0 80vw;
            margin-top: 1vw;
            margin-bottom: 2vw;
            margin-right: 0.2vw;
            right: 0;
            align-content: center;
        }

        #menu-icon:hover {
            color: black;
            transition: 0.4s;
            cursor: pointer;
        }

        #searchbox {
            left: 0;
            widows: 10vw;
            z-index: 50;
            transition: 0.4s;
        }

        #searchbox input {
            height: 48px;
            width: 100%;
        }

        input,
        textarea {
            height: 32px;
            padding: 0 4px;
            font-size: 20px;
            box-shadow: inset 8px 3px 18px -4px #00000066
        }

        input:focus,
        textarea:focus {
            outline: none;
        }

        nav {
            height: 62px;
            background: #ff0000;
            width: 100%;
            margin: 0;
            position: relative;
            font-size: 2vw;
            display: flex;
            justify-content: stretch;
            padding: 0 2vw;
            box-sizing: border-box;
            z-index: 100;
        }

        nav a {
            padding: 0 3vw;
            color: whitesmoke;
            transition: 0.4s;
        }

        nav a :hover {
            text-decoration: none;
            color: black;
            transition: 0.4s;
        }

        nav ul {
            display: inline-flex;
            list-style: none;
            justify-content: space-between;
            align-items: center;
            align-content: flex-start;
            margin-left: 4vw;
        }

        nav li a {
            display: flex;
        }

        #slideout-menu {
            display: none;
            background-color: firebrick;
            transition: 0.4s;
            margin-top: 5.1vw;
            position: fixed;
            text-align: center;
            width: 100%;
            z-index: 100;
            opacity: 0;
            pointer-events: none;
        }

        @media(max-width:900px) {
            nav ul {
                display: none;
            }

            #menu-icon {
                display: flex;
            }

            #slideout-menu {
                display: block;
            }

            nav {
                height: 7.5vw;
            }

            body {
                background-image: none;
                background-color: black;
            }

        }

        @media(max-width:1350px) {
            nav h1 {
                font-size: 2.3vw;
                margin-top: 1.2vw;
                margin-bottom: 0.3vw;
            }

        }

        @media(max-width:900px) {
            nav h1 {
                font-size: 5.4vw;
                margin-top: 0.4vw;
                position: fixed;
            }

        }

        @media(max-width:600px) {
            nav {
                height: 9vw;
            }

            h1 {
                font-size: 6.7vw;
            }

            #menu-icon {
                font-size: 6vw;
            }

            #slideout-menu {
                margin-top: 7vw;
            }
        }

        #slideout-menu ul {
            list-style: none;
            color: white;

            margin: 1.3vw;

        }

        #slideout-menu ul li {
            padding: 1vw 0;
        }

        #slideout-menu a:hover {
            color: black;
            transition: 0.4s;
        }

        #slideout-menu a {
            color: white;
            padding: 2vw 0;
            margin: 10px;
            font-size: 3vw;
        }

        #order-summary h1 {
            font-size: 4vw;
        }

        #details {
            margin-left: 20vw;
        }

        #details h2 {
            font-size: 2vw;
        }

        #details p {
            font-size: 1.3vw;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 0.1vw solid rgb(255, 95, 95);
            /*: white;*/
            font-size: 1.2vw;
        }

        th,
        td {
            padding: 1.5vw;
        }

        th {
            color: #ff0000;
            font-size: 2.8vw;
        }

        td {
            color: white;
        }

        table {
            margin-bottom: 3.7vw;
            /*margin-left: 10vw;*/
        }

        @media(max-width:600px) {

            table,
            th,
            td {

                font-size: 2.5vw;

            }

            th,
            td {
                padding: 1vw;
            }

            th {
                color: #ff0000;
                font-size: 2.8vw;
            }

            td {
                color: white;
            }

            table {
                top: 3.7vw;
                margin-bottom: 3.7vw;
                
            }
        }

        footer {
            display: inline-flex;
            text-align: center;
            color: white;
            font-size: 1.61vw;
            background: #000000e6;
            width: 100%;
            position: relative;
        }

        footer a {
            color: whitesmoke;
            padding-bottom: 1.5vw;
        }

        footer a:hover {
            color: red;
            transition: 0.4s;
        }

        footer ul {
            list-style: none;

        }

        footer ul li {
            padding: 0.3vw 0;
        }

        footer h3 {
            color: red;
            text-decoration: underline;
        }

        #left-footer {
            /*margin-left: 12.95vw;
    margin-right: 9.14vw;*/
            padding-left: 10.1vw;
            justify-content: center;

        }

        #left-footer a {
            padding-bottom: 1.5vw;
        }

        #left-footer2 {
            /*margin-left: 125px;
    margin-right: 125px;*/
            padding-left: 19.1vw;
            justify-content: center;
        }

        #right-footer {
            /*margin-left: 125px;
    margin-right: 175px;*/
            padding-left: 19.1vw;

            justify-content: center;
        }

        #lastline {
            text-align: center;
            font-size: 1.2vw;
        }

        @media(max-width:900px) {
            footer {
                display: block;
                font-size: 3vw;
                background: rgb(17, 17, 17);
                padding: 1px 0;
                size: 100%;
                text-align: start;
            }

            p {
                font-size: 1.9vw;
            }

            #left-footer {
                padding-left: 0;
            }

            #left-footer a {
                padding-bottom: 1.5vw;
            }

            #left-footer2 {
                padding-left: 0;

            }

            #right-footer {
                padding-left: 0;
            }
        }
    </style>

</html>