<!-- TODO Employee view -->
<?php
//if user isn't logged in, can't access the dashboard and redirects to index
session_start();
if(!isset($_SESSION['userId'])){
  header("Location: ../../index.php");
}
readfile('../assets/html/header.html');
?>
<section>
  <form class="employee-form">
    <!--first row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-name">Name</label>
        <input type="text" class="form-control" placeholder="Name" id="employeeForm-name" value = "<?= !isset($_GET['name']) ? "" : $_GET['name']?>">
      </div>
      <div class="col">
        <label for="employeeForm-lastname">Last Name</label>
        <input type="text" class="form-control" placeholder="Last name" id="employeeForm-lastname" value = "<?= !isset($_GET['lastName']) ? "" : $_GET['lastName']?>">
      </div>
    </div>
    <!--second row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-email">Email address</label>
        <input type="email" class="form-control" placeholder="Email" id="employeeForm-email" value = "<?= !isset($_GET['email']) ? "" : $_GET['email']?>">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="col">
        <label for="employeeForm-gender">Gender</label>
        <select class="form-control" id="employeeForm-gender">
          <option value="male" <?=$_GET['gender'] == 'man' ? ' selected="selected"' : '';?>>Male</option>
          <option value="female" <?=$_GET['gender'] == 'woman' ? ' selected="selected"' : '';?>>Female</option>
          <option value="other" <?=$_GET['gender'] == 'other' ? ' selected="selected"' : '';?>>Other</option>
        </select>
      </div>
    </div>
      <!--third row-->
      <div class="form-row">
      <div class="col">
        <label for="employeeForm-city">City</label>
        <input type="text" class="form-control" placeholder="City" id="employeeForm-city" value = "<?= !isset($_GET['city']) ? "" : $_GET['city']?>">
      </div>
      <div class="col">
        <label for="employeeForm-street">Street Address</label>
        <input type="text" class="form-control" placeholder="Street Address" id="employeeForm-street" value = "<?= !isset($_GET['streetAddress']) ? "" : $_GET['streetAddress']?>">
      </div>
    </div>
    <!--fourth row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-state">State</label>
        <input type="text" class="form-control" placeholder="State" id="employeeForm-state" value = "<?= !isset($_GET['state']) ? "" : $_GET['state']?>">
      </div>
      <div class="col">
        <label for="employeeForm-age">Age</label>
        <input type="text" class="form-control" placeholder="Age" id="employeeForm-age" value = "<?= !isset($_GET['age']) ? "" : $_GET['age']?>">
      </div>
    </div>
    <!--fifth row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-postalcode">Postal Code</label>
        <input type="text" class="form-control" placeholder="Postal Code" id="employeeForm-postalcode" value = "<?= !isset($_GET['postalCode']) ? "" : $_GET['postalCode']?>">
      </div>
      <div class="col">
        <label for="employeeForm-phone">Phone Number</label>
        <input type="tel" class="form-control" placeholder="Phone Number" id="employeeForm-phone" value = "<?= !isset($_GET['phoneNumber']) ? "" : $_GET['phoneNumber']?>">
      </div>
    </div>
    <!--Buttons-->
    <div class="buttons-container">
    <button type="submit" class="btn btn-info" name="employeeSubmit">Submit</button>
    <button type="submit" class="btn btn-secondary" name="return">Return</button>
    </div>
  </form>
</section>
<?php
readfile('../assets/html/footer.html');


?>