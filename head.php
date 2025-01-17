<html>

<head>
    <style>
        .header-panel {
            background-color: #780606;
            padding: 10px 0;
            width: 100%;
            box-sizing: border-box;
        }

        .header {
            position: relative;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: transparent;
            width: 100%;
            color: #FF0404;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
            padding-left: 1rem;
            display: flex;
            align-items: center;
        }

        .header a.logo img {
            width: 30px;
            height: auto;
            margin-right: 10px;
        }

        .header-links {
            display: flex;
            align-items: center;
            /* Align items vertically */
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .header-links li {
            margin-right: 1rem;
            /* Spacing between list items */
        }

        .header a {
            color: white;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header .dropdown {
            display: inline-block;
        }

        .header .dropdown .dropbtn {
            font-size: 17px;
            border: none;
            outline: none;
            color: white;
            font-weight: bold;
            padding: 12px;
            background-color: inherit;
            font-family: inherit;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .header .dropdown-content {
            display: none;
            position: absolute;
            list-style-type: none;
            background-color: #333;
            padding: 12px;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        .header .dropdown-content a {
            font-size: 16px;
            color: #fff;
            padding: 8px;
            text-decoration: none;
            display: block;
        }

        .header .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        a.act {
            background: linear-gradient(to right, #fd746c 0%, #ff9068 100%);
            color: white;
            border-radius: 30px;
        }

        a.logo2 {
            background-color: #333;
        }

        /* Add media queries for responsiveness */
        @media screen and (max-width: 500px) {

            .header a,
            .header .dropbtn {
                float: none;
                display: block;
                text-align: left;
            }

            .header-links {
                flex-direction: column;
                /* Stack items vertically on small screens */
                align-items: flex-start;
            }

            .header-links li {
                margin-right: 0;
                margin-bottom: 10px;
                /* Space between items on small screens */
            }
        }
    </style>
</head>

<body>

    <div class="header-panel">
        <div class="header">
            <a href="home.php" class="logo" <?php if ($active == 'home')
                echo "class='logo2'"; ?>>
                <img src="image\logo.jpg" alt="Logo"> Hemocare
            </a>

            <ul class="header-links">
                <li class="dropdown">
                    <button class="dropbtn" <?php if ($active == 'about')
                        echo "class='act'"; ?>>About Us
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-content">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="about_us.php">About Blood Bank</a></li>
                        <li><a href="contact_us.php">Contact Us</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <button class="dropbtn" <?php if ($active == 'looking_for_blood')
                        echo "class='act'"; ?>>Looking for
                        Blood
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-content">
                        <li><a href="need_blood.php">Blood Availability</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <button class="dropbtn" <?php if ($active == 'want_to_donate')
                        echo "class='act'"; ?>>Want to Donate
                        Blood
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-content">
                        <li><a href="donate_blood.php">Donate Blood</a></li>
                        <li><a href="why_donate_blood.php">About Blood Donation</a></li>
                    </ul>
                </li>

                <li>
                    <a href="admin\login.php" class="btn btn-danger">Admin Login</a>
                </li>
            </ul>
        </div>
    </div>


</body>

</html>