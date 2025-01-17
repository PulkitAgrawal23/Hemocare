<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Donation Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php
  $active = 'donate';
  include('head.php');
  ?>
  <style>
    body {
      background-color: #f9fafb;
      font-family: 'Arial', sans-serif;
    }

    .container {
      max-width: 800px;
      margin-top: 10px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 2.5rem;
      color: #007bff;
      margin-bottom: 20px;
      text-align: center;
    }

    .form-group label {
      font-weight: bold;
      color: #333;
    }

    .form-control {
      border-radius: 10px;
      padding: 10px;
      border: 1px solid #ced4da;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      font-size: 1.1rem;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .location-btn {
      margin-top: 10px;
      background-color: #28a745;
      border: none;
      padding: 8px 15px;
      font-size: 1rem;
      border-radius: 5px;
      color: white;
      cursor: pointer;
    }

    .location-btn:hover {
      background-color: #218838;
    }

    .error-msg {
      color: red;
      font-weight: bold;
    }

    .form-row>.form-group {
      padding-left: 15px;
      padding-right: 15px;
    }

    .form-group select.form-control {
      padding: 0.375rem 1rem;
    }

    @media (max-width: 768px) {
      .container {
        padding: 15px;
      }

      .form-row>.form-group {
        padding-left: 0;
        padding-right: 0;
      }

      #last_donation_date {
        width: 180px;
        /* Adjust width as needed */
        padding: 5px;
        /* Adjust padding for a more compact look */
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>Donate Blood</h1>
    <form name="donor" action="savedata.php" method="post">
      <div class="row">
        <div class="col-lg-6 form-group">
          <label for="fullname">Full Name<span style="color:red">*</span></label>
          <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="col-lg-6 form-group">
          <label for="mobileno">Mobile Number<span style="color:red">*</span></label>
          <input type="text" name="mobileno" class="form-control" required>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 form-group">
          <label for="emailid">Email Id</label>
          <input type="email" name="emailid" class="form-control">
        </div>
        <div class="col-lg-6 form-group">
          <label for="age">Age<span style="color:red">*</span></label>
          <input type="text" name="age" class="form-control" required>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 form-group">
          <label for="gender">Gender<span style="color:red">*</span></label>
          <select id="gender" name="gender" class="form-control" required>
            <option value="" disabled selected>Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="col-lg-6 form-group">
          <label for="blood">Blood Group<span style="color:red">*</span></label>
          <select name="blood" class="form-control" required>
            <option value="" selected disabled>Select</option>
            <!-- PHP loop for blood groups will go here -->
            <?php
            include 'conn.php';  // Make sure you have the correct connection
            $sql = "SELECT * FROM blood";
            $result = mysqli_query($conn, $sql) or die("Query failed");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['blood_id'] . '">' . $row['blood_group'] . '</option>';
              }
            }
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 form-group">
          <label for="hbLevel">Hemoglobin Level (g/dL)<span style="color:red">*</span></label>
          <select id="hbLevel" name="hbLevel" class="form-control" required>
            <option value="" disabled selected>Select</option>
            <!-- PHP loop for hemoglobin levels will go here -->
            <?php
            for ($i = 6.5; $i <= 20; $i += 0.1) {
              echo "<option value='" . number_format($i, 1) . "'>" . number_format($i, 1) . "</option>";
            }
            ?>
          </select>
          <p id="hb-error" class="error-msg"></p>
        </div>

        <div class="col-lg-6 form-group">
          <label for="address">Address<span style="color:red">*</span></label>
          <input type="text" name="address" class="form-control" required>
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
        <label for="last_donation_date">Last Donation Date:</label>
        <input type="date" id="last_donation_date" name="last_donation_date" class="form-control"
          max="<?php echo date('Y-m-d'); ?>" style="width: 180px; padding: 5px;" required>
      </div>

      <div class="row">
        <div class="col-lg-6 form-group">
          <input type="submit" id="submit-btn" name="submit" class="btn btn-primary" value="Submit">
        </div>
      </div>

    </form>
  </div>
  <?php include('footer.php'); ?>
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