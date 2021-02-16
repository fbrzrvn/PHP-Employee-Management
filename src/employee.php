<!-- TODO Employee view -->
<?php
//if user isn't logged in, can't access the dashboard and redirects to index
session_start();
if(!isset($_SESSION['userId'])){
  header("Location: ../../index.php");
}
include 'library/sessionHelper.php';
readfile('../assets/html/header.html');

if(isset($_GET['employee'])){
  echo '<div class="alert alert-success alert-dismissible fade show message">
  <strong>New!</strong> Employee has been added.
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>';
}
?>
<section>
  <form class="employee-form" method="POST" action="library/employeeController.php">
    <!-- avatar -->
    <?php
      if(isset($_GET['avatar']) && $_GET['avatar'] != ""){
        echo "<img src=".$_GET['avatar']." width='100px' />";
      }
      else{
        echo "<p>Choose an avatar</p>";
        include './imageGallery.php';
      }
    ?>
    <!--first row-->
    <input type="hidden" id="id" name="id" value = "<?= !isset($_GET['id']) ? "" : $_GET['id']?>">
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-name">Name</label>
        <input type="text" class="form-control" placeholder="Name" id="name" name="name" value = "<?= !isset($_GET['name']) ? "" : $_GET['name']?>" required>
      </div>
      <div class="col">
        <label for="employeeForm-lastname">Last Name</label>
        <input type="text" class="form-control" placeholder="Last name" id="lastName" name="lastName" value = "<?= !isset($_GET['lastName']) ? "" : $_GET['lastName']?>" required>
      </div>
    </div>
    <!--second row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-email">Email address</label>
        <input type="email" class="form-control" placeholder="Email" id="email" name="email" value = "<?= !isset($_GET['email']) ? "" : $_GET['email']?>" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="col">
        <label for="employeeForm-gender">Gender</label>
        <select class="form-control" id="gender" name="gender" required>
          <option value="man" <?=!isset($_GET['gender']) ? "" : ($_GET['gender'] == 'man' ? ' selected="selected"' : '');?>>Man</option>
          <option value="woman" <?=!isset($_GET['gender']) ? "" : ($_GET['gender'] == 'woman' ? ' selected="selected"' : '');?>>Woman</option>
          <option value="other" <?=!isset($_GET['gender']) ? "" : ($_GET['gender'] == 'other' ? ' selected="selected"' : '');?>>Other</option>
        </select>
      </div>
    </div>
      <!--third row-->
      <div class="form-row">
      <div class="col">
        <label for="employeeForm-city">City</label>
        <input type="text" class="form-control" placeholder="City" id="city" name="city" value = "<?= !isset($_GET['city']) ? "" : $_GET['city']?>">
      </div>
      <div class="col">
        <label for="employeeForm-street">Street Address</label>
        <input type="text" class="form-control" placeholder="Street Address" id="streetAddress" name="streetAddress" value = "<?= !isset($_GET['streetAddress']) ? "" : $_GET['streetAddress']?>">
      </div>
    </div>
    <!--fourth row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-state">State</label>
        <input type="text" class="form-control" placeholder="State" id="state" name="state" value = "<?= !isset($_GET['state']) ? "" : $_GET['state']?>">
      </div>
      <div class="col">
        <label for="employeeForm-age">Age</label>
        <input type="text" class="form-control" placeholder="Age" id="age" name="age" value = "<?= !isset($_GET['age']) ? "" : $_GET['age']?>" required>
      </div>
    </div>
    <!--fifth row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-postalcode">Postal Code</label>
        <input type="text" class="form-control" placeholder="Postal Code" id="postalCode" name="postalCode" value = "<?= !isset($_GET['postalCode']) ? "" : $_GET['postalCode']?>">
      </div>
      <div class="col">
        <label for="employeeForm-phone">Phone Number</label>
        <input type="tel" class="form-control" placeholder="Phone Number" id="phoneNumber" name="phoneNumber" value = "<?= !isset($_GET['phoneNumber']) ? "" : $_GET['phoneNumber']?>">
      </div>
    </div>
    <!--Buttons-->
    <div class="buttons-container">
    <button type="submit" class="btn btn-info" name="employeeSubmit">Submit</button>
    <button type="reset" class="btn btn-secondary" name="return">Return</button>
    </div>
  </form>
</section>
<?php
readfile('../assets/html/footer.html');


?>