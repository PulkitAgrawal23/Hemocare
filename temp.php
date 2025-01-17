<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .home-main {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            width: 100%;
        }

        .homeee {
            min-height: 100vh;
            width: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.35)), url('/BDMS/image/home2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .homeee::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .home-main .container {
            position: relative;
            z-index: 2;
        }

        .homeee img {
            object-fit: cover;
            object-position: center;
        }

        .card-container-header {
            margin: 3rem 0;
        }

        .card-container h1 {
            text-align: center;
        }

        .cards {
            display: flex;
            align-items: center;
            padding: 20px;
            gap: 1.8rem;
        }

        .card-main {
            flex: 1;
            max-width: 30%;
        }

        .card {
            width: 100%;
            border: 1px solid #333;
            border-radius: 12px;
            margin-inline: 2rem;
            overflow: hidden;
            max-height: 200px;
        }

        .card-header {
            background-color: #c95151;
            padding: 1rem;
        }

        .card-body {
            padding: 1rem;
            overflow-y: auto;
        }

        .donors {
            background-color: #eea29a;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .all-donors {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .donor-card {
            max-width: 320px;
            border-radius: 24px;
            overflow: hidden;
        }

        .donor-card-wrapper {
            background-color: #fff;
            padding: 1rem;
            overflow: hidden;
        }

        .donor-card-body {
            overflow-y: auto;
        }

        .features {
            padding: 3rem;
        }

        .feature-container h2 {
            margin-bottom: 2rem;
        }

        .feature-container p,
        .feature-container ul li {
            font-size: 18px;
        }

        .feature-bottom {
            margin-top: 2rem;
            width: 100%;
        }

        .feature-bottom img {
            width: 100%;
        }

        .donate {
            padding-inline: 3rem;
            margin-bottom: 2rem;
        }

        .donate-container h2 {
            margin-bottom: 2rem;
        }

        .donate-container p {
            font-size: 18px;
        }

        .donate-bottom a {
            display: inline-block !important;
            margin-top: 2rem;
            text-decoration: none;
            color: #fff;
            background-color: #c95151;
            padding: 1rem;
            border-radius: 12px;
        }
    </style>
</head>

<body>
    <div class="header">
        <?php
        $active = "home";
        include('head.php'); ?>
    </div>

    <?php include 'ticker.php'; ?>

    <div class="home-main">
        <div class="container">
            <div id="content-wrap" style="padding-bottom:75px;">

                <div class="homeee"></div>

                <div class="card-container">
                    <h1 class="card-container-header">Welcome to BloodBank & Donor Management System</h1>

                    <div class="cards">
                        <div class="card-main">
                            <div class="card">
                                <h4 class="card-header">The need for blood</h4>

                                <p class="card-body">
                                    <?php
                                    include 'conn.php';
                                    $sql = $sql = "select * from pages where page_type='needforblood'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo $row['page_data'];
                                        }
                                    }

                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-main">
                            <div class="card">
                                <h4 class="card-header">Blood Tips</h4>

                                <p class="card-body overflow-auto"
                                    style="padding-left:2%;height:120px;text-align:left;">
                                    <?php
                                    include 'conn.php';
                                    $sql = $sql = "select * from pages where page_type='bloodtips'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo $row['page_data'];
                                        }
                                    }

                                    ?>
                                </p>

                            </div>
                        </div>
                        <div class="card-main">
                            <div class="card">
                                <h4 class="card-header">Who you could Help</h4>

                                <p class="card-body overflow-auto"
                                    style="padding-left:2%;height:120px;text-align:left;">
                                    <?php
                                    include 'conn.php';
                                    $sql = $sql = "select * from pages where page_type='whoyouhelp'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo $row['page_data'];
                                        }
                                    }

                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="donors">
                    <h2>Blood Donor Names</h2>
                    <!-- <div class="all-donors"> -->
                        <?php
                        include 'conn.php';
                        $sql = "select * from donor_details join blood where donor_details.donor_blood=blood.blood_id order by rand() limit 6";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="donor-info">
                                    <div class="donor-card">
                                        <img class="card-img-top" src="image\blood_drop_logo.jpg" alt="Card image"
                                            style="width:100%;height:300px">
                                        <div class="donor-card-wrapper">
                                            <di class="donor-card-body">
                                                <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                                                <p class="card-text">
                                                    <b>Blood Group : </b> <b><?php echo $row['blood_group']; ?></b><br>
                                                    <b>Mobile No. : </b> <?php echo $row['donor_number']; ?><br>
                                                    <b>Gender : </b><?php echo $row['donor_gender']; ?><br>
                                                    <b>Age : </b> <?php echo $row['donor_age']; ?><br>
                                                    <b>Address : </b> <?php echo $row['donor_address']; ?><br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    <!-- </div> -->
                </div>

                <div class="features">
                    <div class="feature-container">
                        <h2>BLOOD GROUPS</h2>
                        <p>
                            <?php
                            include 'conn.php';
                            $sql = $sql = "select * from pages where page_type='bloodgroups'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['page_data'];
                                }
                            }

                            ?>
                        </p>
                    </div>
                    <div class="feature-bottom">
                        <img class="img-fluid rounded" src="image\blood_donationcover.jpeg" alt="">
                    </div>
                </div>

                <div class="donate">
                    <div class="donate-container">
                        <h2>UNIVERSAL DONORS AND RECIPIENTS</h2>
                        <p>
                            <?php
                            include 'conn.php';
                            $sql = $sql = "select * from pages where page_type='universal'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['page_data'];
                                }
                            }

                            ?>
                        </p>
                    </div>
                    <div class="donate-bottom">
                        <a href="donate_blood.php">Become a Donor </a>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>