<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Service de dispozitive</title>
    <link rel="stylesheet" href="anthstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&family=Sono:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <section class="header">
        <nav>
            <a hre="index.html"><imag src="imagine.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About us</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">
                    <?php
                        session_start();
                        $connected_email = $_SESSION['Email'];
                        if($_GET)
                        {
                            $connected_email = $_GET['Email'];
                            
                        }
                        echo "Welcome, ";
                        echo $connected_email; 
                    ?>
                    </a></li>
                    <li><a href="devicerepair.html">Repair a device</a></li>
                    <?php
                        $_SESSION['Email'] = $connected_email;

                    ?>
                    <li><a href="mydevices.php">My devices</a></li>
                    <li><a href="changepassword.html">Change Password</a></li>
                    <li><a href="index.html">Log Out</a></li>
                    <?php
                        $_SESSION['Email'] = $connected_email;
                    ?>
                    <li><a href="deleteaccount.html">Delete Account</a></li>
                </ul>
            </div>
        </nav>
        <div class="text-box">
            <h1>Service de dispozitive</h1>
            <p>Oferim servicii excelente</p>
        </div>
    </section>
    
</body>
</html>
