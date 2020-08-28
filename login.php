<?php
    session_start();
    $server     = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "project";

   $con = mysqli_connect($server, $username, $password, $database);

   if(!$con){
      die("Error : " . $con->connect_error);
   }
   if(isset($_SESSION['userid']) and isset($_SESSION['password']) and strlen($_SERVER['REQUEST_URI'])<40){ echo "<script>window.location='profile.php';</script>";}
   else{
   if(isset($_POST['login'])){
  isset($_SESSION['userid']);
  isset($_SESSION['password']);
   if(isset($_POST['userid']) )
    $_SESSION['userid']= $_POST["userid"];
        $_SESSION['password'] = $_POST['password'];
        $result=$con->query("select * from login where userid='{$_SESSION['userid']}' and password='{$_SESSION['password']}'");
        if($result->num_rows>0){
            if(strlen($_SERVER['REQUEST_URI'])>40){
                
                echo "<script>var next=window.location.href;
                next=next.substring(next.indexOf('?')+1);
                window.location='products.php/'+next;
                </script>";
                
            }
            else{
            echo "<script>window.location='profile.php';</script>";
            }
            
        }
        else{
             session_unset();
                    session_destroy();
             session_start();
            
            echo "<script>if(alert('Username or password incorrect!')){window.location = 'login.php';}</script>";
                }
                

            
        }
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
    <link rel="stylesheet" href="#">
    <title>Login</title>
</head>
<body>
<div id="slideout-menu">
        <ul>
                <li><a href="components.php">Components</a></li>
                <li><a href="processor.html">Build your PC</a></li>
                
                    
                <li>
                            
                            <a href="#"><i class="fa fa-shopping-cart">Cart</i></a>
                            
                </li>
                <li>
                            <a href="login.php"><i class="fa fa-user">Account</i></a>
                            
                </li>
            </ul>
</div>
    <nav>
        <a href="home.html"><h1>PC Builder</h1></a>
<div id="menu-icon">
    <i class="fas fa-bars"></i>
</div>
<ul>
    
    <li><a href="components.php">Components</a></li>
    <li><a href="processor.html">Build your PC</a></li>
    
    <li><div id="cart-icon">
            <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
        </div></li>
    <li><div id="user-icon">
            <a href="login.php"><i class="fa fa-user"></i></a>
    </div></li>
</ul>
    
</nav>        
<div class="Login-page">
        <div class="form">
          <form class="regsiter-form" method="POST" action="login.php">
            <input type="email" name="userid" placeholder="Email-id" maxlength=50/>
            <input type="password" name="password" placeholder="Password" maxlength=25/>
            <button type="submit" name="login" value="Login">Login</button>
            <p class="message"><a href="resetpassword.php">Forgot Password?</a>
            </p>
            <p class="message"><font color = "white">Not Registered?</font> <a href="registration.php">Register</a>
            </p>
        </div>
</div>
<footer>
    <div id="left-footer">
        
        <ul>
            <li><h3>Quick Links</h3></li>
            <li><a href="notice.html">Terms of Service</a></li>
            <li><a href="notice.html">Privacy Policy</a></li>
            <li><a href="notice.html">About Us</a></li>
            <li><a href="notice.html">Contact Us</a></li>
        </ul>
    </div>
        <div id="left-footer2">
        
        <ul>
            <li><h3>Services</h3></li>
            <li><a href="components.php">Components</a></li>
            <li><a href="processor.html">Build your PC</a></li>
        </ul>
    </div>
    
    <div id="right-footer">
        
        <ul>
            <li><h3>Follow us</h3></li>
                <li><a href="notice.html"><i class="fab fa-facebook">  Facebook</i></a></li>
                <li><a href="notice.html"><i class="fab fa-instagram">  Instagram</i></a></li>
                <li><a href="notice.html"><i class="fab fa-youtube">  Youtube</i></a></li>
            </ul>
    </div>
    
</footer>
<div id="lastline"><p>© 2019, TechEx Pvt Ltd. All Rights Reserved.</p></div>
</main>
<script>
const menuIcon = document.getElementById("menu-icon");
        const slideoutmenu=document.getElementById("slideout-menu");
        menuIcon.addEventListener('click', function(){
            if(slideoutmenu.style.opacity=="1"){
                slideoutmenu.style.opacity='0';
                slideoutmenu.style.pointerEvents='none';
            }
            else{
                slideoutmenu.style.opacity='1';
                slideoutmenu.style.pointerEvents='auto';
            }
        });
</script>
</body>
<style>
body{
    font-family: sans-serif;
    margin:0;
    background-image: url('CPU-Wallpaper-Free-Download.jpg');
}
h1{
    margin-top: 0.3vw;
    font-size: 3.7vw;
    color: whitesmoke;
}
h2{
    color: whitesmoke;
}
p{
    line-height: 1.5;
    color: white;
}
main{
    margin: 0 auto;
}
a{
    text-decoration: none;
    color: #ff0000cc;
}
a:hover{
    color:black;
}

#cart-icon{
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
#cart-icon:hover{
    color: black;

}
#user-icon{
    height: 100%;
    font-size: 2.3vw;
    color: whitesmoke;
    cursor: pointer;
    padding: 0 4px;
    transition: 0.4s;
    align-items: center;
    justify-content: stretch;
}
#user-icon:hover{
    color: black;

}

#menu-icon{
    display:none;
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
#menu-icon:hover{
    color: black;
    transition: 0.4s;
    cursor: pointer;
}
#searchbox{
    left: 0;
    widows: 10vw;
    z-index: 50;
    transition: 0.4s;
}
#searchbox input{
    height:48px;
    width: 100%;
}
input, textarea{
    height: 32px;
    padding: 0 4px;
    font-size: 20px;
    box-shadow: inset 8px 3px 18px -4px #00000066
}
input:focus,textarea:focus{
    outline: none;
}
nav{
    height: 62px;
    background:#ff0000;
    width:100%;
    margin: 0;
    position:fixed;
    font-size:2vw;
    display: flex;
    justify-content: stretch;
    padding:0 2vw;
    box-sizing: border-box;
    z-index: 100;
}
nav a{
    padding: 0 3vw;
    color: whitesmoke;
    transition: 0.4s;
}
nav a :hover{
    text-decoration: none;
    color: black;
    transition: 0.4s;
}
nav ul{
    display:inline-flex;
    list-style: none;
    justify-content: space-between;
    align-items: center;
    align-content: flex-start;
    margin-left: 4vw;
}
nav li a {
    display: flex;
  }
  
#slideout-menu{
    display: none;
    background-color: firebrick;
    transition: 0.4s;
    margin-top: 5.1vw;
    position:fixed;
    text-align: center;
    width: 100%;
    z-index: 100;
    opacity: 0;
    pointer-events: none;
    }

@media(max-width:900px){
    nav ul{
        display:none;
    }
    #menu-icon{
    display:flex;
    }   
    #slideout-menu{
    display: block;
    }
    nav{
        height: 7.5vw;
    }
    
}
@media(max-width:1350px)
{
    h1{
        font-size: 2.3vw;
        margin-top:1.2vw;
        margin-bottom:0.3vw;
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
#slideout-menu ul{
    list-style: none;
    color: white;
    
    margin: 1.3vw;
    
}
#slideout-menu ul li{
    padding: 1vw 0;
}
#slideout-menu a:hover{
    color: black;
    transition: 0.4s;
}
#slideout-menu a{
    color: white;
    padding: 2vw 0;
    margin: 10px;
    font-size: 3vw;
}

.Login-page{
    width: 360px;
    padding: 10% 0 0;
    margin: auto;
  }
  
  
  .form{
    position: relative;
    z-index: 1;
    background: #0a0a0a;
    max-width: 65%;
    margin: 4vw auto 6vw;
    padding: 45px;
    text-align: center;
    opacity: 0.9;
  }
  
  .form input{
    font-family: "Roboto", sans-serif;
    outline: 1;
    background: #f2f2f2;
    width: 75%;
    border: 0;
    margin-bottom:15px;
    /*margin: 0 0 15px;*/
    padding: 1.1vw;
    box-sizing: border-box;
    font-size: 14px;
  }
  
  .form button{
    font-family: "Roboto",sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: dodgerblue;
    width: 100%;
    border: 0%;
    padding: 1.1vw;
    color: #ffffff;
    font-size: 14px;
    cursor: pointer;
  }
  @media(max-width:900px){
      .form input{
          font-size:3vw;
          height:5.5vw;
      }
      .form{
          width:75%;
      }
      .form button{
        font-size:3vw;
        width:50%
      }
      .form a{
          font-size:3.5vw;
      }
      .form p{
        font-size:3vw;
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

<body>

</body>

</html>