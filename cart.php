<?php
session_start();
if (isset($_SESSION["userid"])) {
    if (isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
        $len = count($cart);
    }
} else {
    echo "<script>window.location='login.php';</script>";
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

    <title>Processor</title>
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
        <br><br><br><br>
        <div id=title>
            <h2 align='center' style=" align-items: center; font-size: 3.7vw; color: whitesmoke;">Shopping Cart</h2>
            <style>
                @media(max-width:900px) {
                    #title {
                        margin-top: 0vw;
                    }
                }

                @media(max-width:500px) {
                    #title {
                        margin-top: 0vw;
                    }
                }
            </style>
        </div>
        <div id="shop-cart">
            <table id="demo" align="start"></table>
            <div id="disp" style="display:inline-flex">
                <div id='total'></div>
                <div id='final'></div>
            </div>
            <script>
                var i = 0;
                var l = <?php echo $len ?>;
                var total = 0;
                var str = [<?php echo '"' . implode('","',  $cart) . '"' ?>];
                var price = [];
                //alert(str[0]);
                var k = 0;

                function display_products() {

                    //alert("The URL of this page is: " + typeof(uri));
                    var xmlhttp = new XMLHttpRequest();
                    alert("Hello");
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            //alert();

                            myProducts(this);
                        }
                    };
                    xmlhttp.open("GET", "product.xml", true);
                    xmlhttp.send();
                }

                function myProducts(xml) {
                    //alert(i);

                    var xmlDoc = xml.responseXML;
                    var x = xmlDoc.getElementsByTagName("product");
                    //alert((x[0].getElementsByTagName("pd")[0].childNodes[0].nodeValue).toString());
                    var k;
                    var table = "<tr><th>   </th><th>Product name</th><th>Price</th></tr>";
                    //alert(str[0]);
                    var image = [];

                    for (j = 0; j < str.length; j++) {


                        for (k = 0; k < x.length; k++) {
                            if (str[j] == ((x[k].getElementsByTagName("pd")[0].childNodes[0].nodeValue).toString())) {

                                price.push(parseInt((x[k].getElementsByTagName("price")[0].childNodes[0].nodeValue).toString()));
                                total += parseInt((x[k].getElementsByTagName("price")[0].childNodes[0].nodeValue).toString());
                                table += "<tr><td><img src='" +
                                    x[k].getElementsByTagName("image")[0].childNodes[0].nodeValue +
                                    "' alt='unavailable' height=70vw width=70vw></img></td><td>" +
                                    x[k].getElementsByTagName("pd")[0].childNodes[0].nodeValue +
                                    "</td><td>Rs." +

                                    x[k].getElementsByTagName("price")[0].childNodes[0].nodeValue +
                                    "</td></tr>";
                                break;
                            }
                        }


                    }
                    document.getElementById("demo").innerHTML = table;
                    var gst = total * 0.125;
                    var final = total + gst + 100;
                    document.getElementById("total").innerHTML = "Total<br><br>GST(12.5%)<br><br>Assembly charges<br><br>Total amount";
                    document.getElementById("final").innerHTML = "Rs." + total + "<br><br>Rs." + gst + "<br><br>Rs.50" + "<br><br>Rs." + final + "<br><br><br>";
                }

                display_products();

                function func() {
                    var next = "";
                    for (i = 0; i < str.length; i++) {
                        next += ("prod" + i + "=" + str[i] + "&price" + i + "=" + price[i] + "&");
                    }
                    window.location = ("index.php?" + next);
                }
            </script>
            <button type="submit" name="pay" onclick="func();" style="font-family: 'Roboto',sans-serif; text-transform: uppercase;outline: 0;background: dodgerblue;width: 30%;border: 0%;padding: 1.1vw;color: #ffffff;font-size: 1.5vw;cursor: pointer;margin-left:60vw;margin-bottom:3vw;">Proceed to payment</button>
        </div>
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
            position: fixed;
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

        }

        @media(max-width:1350px) {
            h1 {
                font-size: 2.3vw;
                margin-top: 1.2vw;
                margin-bottom: 0.3vw;
            }

        }

        @media(max-width:900px) {
        h1 {
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

        table,
        th,
        td {
            border-collapse: collapse;
            /*: white;*/
            font-size: 2vw;
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
            margin-left: 10vw;
        }

        #total {
            color: white;
            font-size: 2vw;
            margin-left: 27vw;
        }

        #final {
            color: white;
            font-size: 2vw;
            margin-left: 6.25vw;
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

<body>

</body>

</html>