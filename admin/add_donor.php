<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Donor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    #sidebar {
      position: relative;
      margin-top: -20px;
    }

    #content {
      position: relative;
      margin-left: 210px;
    }

    @media screen and (max-width: 600px) {
      #content {
        margin-left: auto;
        margin-right: auto;
      }
    }

    .page-title {
      margin-bottom: 20px;
    }

    .error-msg {
      color: red;
    }

    #last_donation_date {
      width: 180px;
      padding: 5px;
    }
  </style>
</head>

<body style="color:black">
  <?php
  include 'conn.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
    <div id="header">
      <?php $active = "add";
      include 'header.php'; ?>
    </div>

    <div id="sidebar">
      <?php include 'sidebar.php'; ?>
    </div>

    <div id="content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h1 class="page-title">Add Donor</h1>
              <hr>
              <form name="donor" action="save_donor_data.php" method="post">
                <div class="row">
                  <div class="col-lg-4 mb-4">
                    <label for="fullname">Full Name<span style="color:red">*</span></label>
                    <input type="text" name="fullname" class="form-control" required>
                  </div>
                  <div class="col-lg-4 mb-4">
                    <label for="mobileno">Mobile Number<span style="color:red">*</span></label>
                    <input type="text" name="mobileno" class="form-control" required>
                  </div>
                  <div class="col-lg-4 mb-4">
                    <label for="emailid">Email Id</label>
                    <input type="email" name="emailid" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 mb-4">
                    <label for="age">Age<span style="color:red">*</span></label>
                    <input type="text" name="age" class="form-control" required>
                  </div>
                  <div class="col-lg-4 mb-4">
                    <label for="gender">Gender<span style="color:red">*</span></label>
                    <select name="gender" id="gender" class="form-control" required>
                      <option value="">Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="col-lg-4 mb-4">
                    <label for="blood">Blood Group<span style="color:red">*</span></label>
                    <select name="blood" class="form-control" required>
                      <option value="" disabled selected>Select</option>
                      <?php
                      $sql = "SELECT * FROM blood";
                      $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['blood_id'] . '">' . $row['blood_group'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 mb-4">
                    <label for="hbLevel">Hemoglobin Level (g/dL)<span style="color:red">*</span></label>
                    <select id="hbLevel" name="hbLevel" class="form-control" required>
                      <option value="" disabled selected>Select</option>
                      <?php
                      for ($i = 6.5; $i <= 20; $i += 0.1) {
                        echo "<option value='" . number_format($i, 1) . "'>" . number_format($i, 1) . "</option>";
                      }
                      ?>
                    </select>
                    <p id="hb-error" class="error-msg"></p>
                  </div>
                  <div class="col-lg-8 mb-4">
                    <label for="address">Address<span style="color:red">*</span></label>
                    <textarea class="form-control" name="address" required></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 form-group">
                    <label>Current Location<span style="color:red">*</span></label>
                    <button type="button" class="location-btn" onclick="getLocation()">Get My Location</button>
                    <input type="hidden" id="latitude" name="latitude" required>
                    <input type="hidden" id="longitude" name="longitude" required>
                    <p id="location" class="mt-2"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_donation_date">Donation Date:</label>
                  <input type="date" id="last_donation_date" name="last_donation_date" class="form-control"
                    max="<?php echo date('Y-m-d'); ?>" style="width: 180px; padding: 5px;" required>
                </div>

                <div class="row">
                  <div class="col-lg-4 mb-4">
                    <input type="submit" id="submit-btn" name="submit" class="btn btn-primary" value="Submit">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
  } else {
    echo '<div class="alert alert-danger"><b>Please Login First To Access Admin Portal.</b></div>';
    ?>
    <form method="post" action="login.php" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4">
          <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
        </div>
      </div>
    </form>
  <?php }
  ?>

  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        document.getElementById("location").innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      document.getElementById("latitude").value = position.coords.latitude;
      document.getElementById("longitude").value = position.coords.longitude;
      document.getElementById("location").innerHTML =
        "Location Captured";
    }

    document.getElementById("hbLevel").addEventListener("change", function () {
      const gender = document.getElementById("gender").value;
      const hbLevel = parseFloat(this.value);
      let minHb, maxHb;

      if (gender === "Male") {
        minHb = 13.8;
        maxHb = 17.2;
      } else if (gender === "Female") {
        minHb = 12.1;
        maxHb = 15.1;
      } else {
        document.getElementById("hb-error").innerHTML = "Please select gender first.";
        document.getElementById("submit-btn").disabled = true;
        return;
      }

      if (hbLevel < 6.5 || hbLevel > 20) {
        document.getElementById("hb-error").innerHTML = "Hb level must be between 6.5 and 20.";
        document.getElementById("submit-btn").disabled = true;
        return;
      }

      if (hbLevel >= minHb && hbLevel <= maxHb) {
        document.getElementById("hb-error").innerHTML = "";
        document.getElementById("submit-btn").disabled = false;
      } else {
        document.getElementById("hb-error").innerHTML = "Donor is not fit for donating blood.";
        document.getElementById("submit-btn").disabled = true;
      }
    });
  </script>
</body>

</html>