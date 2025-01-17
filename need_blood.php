<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  $active = 'need';
  include('head.php'); ?>

  <div id="page-container" style="margin-top:50px; position: relative;min-height: 70vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">

        <div class="row">
          <div class="col-lg-6">
            <h1 class="mt-4 mb-3">Need Blood</h1>
          </div>
        </div>

        <form name="needblood" action="" method="post">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Blood Group<span style="color:red">*</span></div>
              <div>
                <select name="blood" class="form-control" required>
                  <option value="" selected disabled>Select</option>
                  <?php
                  include 'conn.php';
                  $sql = "SELECT * FROM blood";
                  $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo htmlspecialchars($row['blood_id']); ?>">
                      <?php echo htmlspecialchars($row['blood_group']); ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-4 mb-4">
              <div class="font-italic">Reason, why do you need blood?<span style="color:red">*</span></div>
              <!-- <div><textarea class="form-control" name="reason" required></textarea></div> -->
              <div>
                <select class="form-control" name="reason" id="reasonDropdown" onchange="toggleOtherReason()" required>
                  <option value="" selected disabled>Select a reason</option>
                  <option value="Accident/Emergency">Accident/Emergency</option>
                  <option value="Surgery">Surgery</option>
                  <option value="Cancer Treatment">Cancer Treatment</option>
                  <option value="Thalassemia">Thalassemia</option>
                  <option value="Anemia">Anemia</option>
                  <option value="Organ Transplant">Organ Transplant</option>
                  <option value="Blood Disorder">Blood Disorder</option>
                  <option value="Pregnancy Complications">Pregnancy Complications</option>
                  <option value="Burns">Burns</option>
                  <option value="Chronic Illness">Chronic Illness</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div id="otherReasonInput" style="display:none; margin-top:10px;">
              <input type="text" class="form-control" name="other_reason" placeholder="Please specify your reason">
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4 mb-4">
              <div><input type="submit" name="search" class="btn btn-primary" value="Search" style="cursor:pointer">
              </div>
            </div>
          </div>

          <div class="row">
            <?php
            if (isset($_POST['search'])) {
              // Get the selected blood group from the form
              $bg = trim($_POST['blood']);

              // Use a prepared statement to prevent SQL injection
              $stmt = $conn->prepare("
        SELECT donor_details.*, blood.blood_group 
        FROM donor_details 
        JOIN blood ON donor_details.donor_blood = blood.blood_id 
        WHERE donor_details.donor_blood = ? 
          AND (
            (donor_details.donor_gender = 'Male' AND DATEDIFF(CURRENT_DATE, donor_details.last_donation_date) > 90) OR
            (donor_details.donor_gender = 'Female' AND DATEDIFF(CURRENT_DATE, donor_details.last_donation_date) > 120)
          ) 
        ORDER BY RAND() 
        LIMIT 5
    ");
              $stmt->bind_param("i", $bg); // 'i' indicates that $bg is an integer
            
              // Execute the statement
              $stmt->execute();
              $result = $stmt->get_result();

              // Check if any rows were returned
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  ?>
                  <div class="col-lg-4 col-sm-6 portfolio-item"><br>
                    <div class="card" style="width:300px">
                      <img class="card-img-top" src="image/blood_drop_logo.jpg" alt="Card image"
                        style="width:100%;height:300px">
                      <div class="card-body">
                        <h3 class="card-title"><?php echo htmlspecialchars($row['donor_name']); ?></h3>
                        <p class="card-text">
                          <b>Blood Group: </b><b><?php echo htmlspecialchars($row['blood_group']); ?></b><br>
                          <b>Mobile No.: </b><?php echo htmlspecialchars($row['donor_number']); ?><br>
                          <b>Gender: </b><?php echo htmlspecialchars($row['donor_gender']); ?><br>
                          <b>Age: </b><?php echo htmlspecialchars($row['donor_age']); ?><br>
                          <b>Address: </b><?php echo htmlspecialchars($row['donor_address']); ?><br>
                          <b>Location : </b>
                          <a href="https://www.google.com/maps?q=<?php echo $row['donor_latitude']; ?>,<?php echo $row['donor_longitude']; ?>"
                            target="_blank">
                            <button type="button" class="btn btn-info">View on Map</button>
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              } else {
                echo '<div class="alert alert-danger">No Donor Found For your search Blood group</div>';
              }
              $stmt->close(); // Close the prepared statement
            }
            ?>
          </div>
        </form>
      </div>

    </div>
  </div>
  <?php include 'footer.php'; ?>

  <script>
    function toggleOtherReason() {
      var reasonDropdown = document.getElementById("reasonDropdown");
      var otherReasonInput = document.getElementById("otherReasonInput");

      // Show the text input only if "Other" is selected
      if (reasonDropdown.value === "Other") {
        otherReasonInput.style.display = "block";
        otherReasonInput.querySelector("input").required = true;
      } else {
        otherReasonInput.style.display = "none";
        otherReasonInput.querySelector("input").required = false;
      }
    }
  </script>
</body>

</html>