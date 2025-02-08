<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
   
<div class="container">
    <header></header>

    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
              <h1>Personal Data</h1>

            <div class="fields">
                <div class="input-field">
                    <label>Last Name</label>
                    <input type="text" name="last_name" placeholder="Enter Last Name">
                </div>
                <div class="input-field">
                    <label>First Name</label>
                    <input type="text" name="first_name" placeholder="Enter First Name">
                </div>
                <div class="input-field">
                    <label>Middle Initial</label>
                    <input type="text" name="middle_initial" placeholder="Enter Middle Initial" >
                </div>
                <div class="input-field">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" >
                </div>
            </div>

            <div class="sex">
                <label for="Male">Sex:</label>  
                <input type="radio" id="Male" name="sex" value="Male" >
                <label for="Male">Male</label>
                <input type="radio" id="Female" name="sex" value="Female" >
                <label for="Female">Female</label>
            </div>

            <div class="status">
    <label for="civilStatus">Civil Status:</label> 
    <select id="civilStatus" name="civil_status"  onchange="toggleOtherField()">
        <option value="">Select Civil Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
        <option value="Separated">Legally Separated</option>
        <option value="Others">Others</option>
    </select>
    <input type="text" id="othersInput" name="other_civil_status" placeholder="Specify Others" style="display: none;">
</div>

            <div class="type">
                <div class="input-type">
                    <label>Tax Identification Number</label>
                    <input type="text" name="tax_id" placeholder="Enter Tax Number" required pattern="[0-9]+" title="Only numbers allowed">
                </div>
                <div class="input-type">
                    <label>Nationality</label>
                    <input type="text" name="nationality" placeholder="Enter Nationality" >
                </div>
                <div class="input-type">
                    <label>Religion</label>
                    <input type="text" name="religion" placeholder="Enter Religion" >
                </div>
            </div>

            <h2>Place of Birth</h2>
            <div class="place">
                <div class="input-place">
                    <label>RM/FLR/Unit No. & Bldg.Name</label>
                    <input type="text" name="unit" placeholder="Enter Unit" >
                </div>
                <div class="input-place">
                    <label>House/Lot & Blk.No</label>
                    <input type="text" name="blk_no" placeholder="Enter Blk.No" >
                </div>
                <div class="input-place">
                    <label>Street Name</label>
                    <input type="text" name="street_name" placeholder="Street Name" >
                </div>
                <div class="input-place">
                    <label>Subdivision</label>
                    <input type="text" name="subdivision" placeholder="Subdivision" >
                </div>
            </div>
            <div class="home">
                <div class="input-home">
                    <label>Brgy/District/Locality</label>
                    <input type="text" name="brgy" placeholder="Enter Brgy"  >
                </div>
                <div class="input-place">
                    <label>City/Municipality</label>
                    <input type="text" name="city" placeholder="Enter City"  >
                </div>
                <div class="input-place">
                    <label>Province</label>
                    <input type="text" name="province" placeholder="Province"  >
                </div>
                <div class="input-place">
                    <label>Zip Code</label>
                    <input type="text" name="zip_code" placeholder="Zip Code"  >
                </div>
            </div>
            
           
            <h2>Home Address</h2>
            <div class="place">
                <div class="input-place">
                    <label>RM/FLR/Unit No. & Bldg.Name</label>
                    <input type="text" name="unit" placeholder="Enter Unit" >
                </div>
                <div class="input-place">
                    <label>House/Lot & Blk.No</label>
                    <input type="text" name="blk_no" placeholder="Enter Blk.No" >
                </div>
                <div class="input-place">
                    <label>Street Name</label>
                    <input type="text" name="street_name" placeholder="Street Name" >
                </div>
                <div class="input-place">
                    <label>Subdivision</label>
                    <input type="text" name="subdivision" placeholder="Subdivision"   >
                </div>
            </div>

            <div class="home">
                <div class="input-home">
                    <label>Brgy/District/Locality</label>
                    <input type="text" name="brgy" placeholder="Enter Brgy"  >
                </div>
                <div class="input-place">
                    <label>City/Municipality</label>
                    <input type="text" name="city" placeholder="Enter City"  >
                </div>
                <div class="input-place">
                    <label>Province</label>
                    <input type="text" name="province" placeholder="Province"  >
                </div>
                <div class="input-place">
                    <label>Zip Code</label>
                    <input type="text" name="zip_code" placeholder="Zip Code"  >
                </div>
            </div>
            
        
            
            <h2>Contact Information</h2>
            <div class="number">
                <div class="input-number">
                    <label>Mobile/Cellphone Number</label>
                    <input type="text" name="mobile_phone" placeholder="Enter Mobile Number" 
                     pattern="[0-9]+" title="Must accept Numbers Only">
                </div>
                <div class="input-number">
                    <label>E-mail Address</label>
                    <input type="email" name="email" placeholder="Enter E-mail" 
                    >
                </div>
                <div class="input-number">
                    <label>Telephone Number</label>
                    <input type="text" name="telephone_number" placeholder="Enter Telephone Number" 
                     pattern="[0-9]+" title="Must accept Numbers Only">
                </div>
            </div>

            <h2>Father's Name</h2>
            <div class="type">
                <div class="input-type">
                    <label>Last Name</label>
                    <input type="text" name="father_last_name" placeholder="Enter Last Name" >
                </div>
                <div class="input-type">
                    <label>First Name</label>
                    <input type="text" name="father_first_name" placeholder="Enter First Name" >
                </div>
                <div class="input-type">
                    <label>Middle Initial</label>
                    <input type="text" name="father_middle_initial" placeholder="Enter Middle Initial" >
                </div>
            </div>

            <h2>Mother's Name</h2>
            <div class="type">
                <div class="input-type">
                    <label>Last Name</label>
                    <input type="text" name="mother_last_name" placeholder="Enter Last Name" >
                </div>
                <div class="input-type">
                    <label>First Name</label>
                    <input type="text" name="mother_first_name" placeholder="Enter First Name" >
                </div>
                <div class="input-type">
                    <label>Middle Initial</label>
                    <input type="text" name="mother_middle_initial" placeholder="Enter Middle Initial" >
                </div>
            </div>

            <div class="buttons">
                <button type="submit" class="subBtn">
                    <span class="btnText">Submit</span>
                </button>
            </div>
        </div>
    </form>
</div>
<script src="script.js"></script>

</body>

</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastName = $_POST['last_name'] ?? "";
        $firstName = $_POST['first_name'] ?? "";
        $middleInitial = $_POST['middle_initial'] ?? "";
        $dateOfBirth = $_POST['date_of_birth'] ?? "";
        
        $taxId = $_POST['tax_id'] ?? ""; 
        $mobilePhone = $_POST['mobile_phone'] ?? ""; 
        $telephoneNumber = $_POST['telephone_number'] ?? "";
        $email = $_POST['email'] ?? "";

        $fatherLastName = $_POST['father_last_name'] ?? "";
        $fatherFirstName = $_POST['father_first_name'] ?? "";
        $fatherMiddleName = $_POST['father_middle_name'] ?? "";
        
        $motherLastName = $_POST['mother_last_name'] ?? "";
        $motherFirstName = $_POST['mother_first_name'] ?? "";
        $motherMiddleName = $_POST['mother_middle_name'] ?? "";

        $errors = [];

        function validateName($name) {
            return preg_match("/^[a-zA-Z\s]+$/", $name);
        }

        function validatePhoneNumber($phone) {
            return preg_match("/^[0-9]{10,15}$/", $phone);
        }

        function validateNumber($number) {
            return preg_match("/^[0-9]+$/", $number);
        }
        function validateMiddleInitial($middleInitial) {
            return preg_match("/^[a-zA-Z]{1}$/", $middleInitial);
        }

        if (!validateName($lastName)) {
            $errors[] = "Last Name must not contain numbers or special characters.";
        }
        if (!validateName($firstName)) {
            $errors[] = "First Name must not contain numbers or special characters.";
        }
        if (!validateName($middleInitial) || strlen($middleInitial) > 1) {
            $errors[] = "Middle Initial must be a single letter.";
        }

        if (!empty($dateOfBirth)) {
            try {
                $dob = new DateTime($dateOfBirth);
                $today = new DateTime();
                $age = $today->diff($dob)->y; 
                if ($age < 18) {
                    $errors[] = "You must be at least 18 years old.";
                }
            } catch (Exception $e) {
                $errors[] = "Invalid Date of Birth format.";
            }
        } else {
            $errors[] = "Date of Birth is required.";
        }

        if (!empty($taxId) && !validateNumber($taxId)) {
            $errors[] = "Tax Identification Number must contain only numbers.";
        }

        if (!empty($mobilePhone) && !validatePhoneNumber($mobilePhone)) {
            $errors[] = "Mobile Phone number must be 10-15 digits long and contain only numbers.";
        }
        if (!empty($telephoneNumber) && !validatePhoneNumber($telephoneNumber)) {
            $errors[] = "Telephone number must be 10-15 digits long and contain only numbers.";
        }

        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address format.";
        }

        if (!validateMiddleInitial($fatherMiddleName)) {
            $errors[] = "Father's Middle Initial must be a single letter.";
        }

        if (!validateMiddleInitial($motherMiddleName)) {
            $errors[] = "Mother's Middle Initial must be a single letter.";
        }


        if (!empty($errors)) {
            echo "<div class='error-messages'>";
            foreach ($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
            echo "</div>";
        } else {
            echo "<p style='color:green;'>Form submitted successfully!</p>";
        }
    }
?>