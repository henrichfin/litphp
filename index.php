<?php
session_start();

$Status = [
    "Single", "Married", "Widowed", "Legally Separated", "Others"
];

function generateOptions($optionsArray, $selectedValue = '') {
    $options = "<option value='' disabled selected>Select an option</option>";
    foreach ($optionsArray as $option) {
        $isSelected = ($option === $selectedValue) ? 'selected' : '';
        $options .= "<option value='$option' $isSelected>$option</option>";
    }
    return $options;
}

$civilstatus = generateOptions($Status);
$countries = [
    "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia",
    "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas (the)", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize",
    "Benin", "Bermuda", "Bhutan", "Bolivia (Plurinational State of)", "Bonaire, Sint Eustatius and Saba", "Bosnia and Herzegovina",
    "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory (the)", "Brunei Darussalam", "Bulgaria", "Burkina Faso",
    "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Cayman Islands (the)", "Central African Republic (the)", "Chad",
    "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands (the)", "Colombia", "Comoros (the)", "Congo (the Democratic Republic of the)",
    "Congo (the)", "Cook Islands (the)", "Costa Rica", "Croatia", "Cuba", "Curaçao", "Cyprus", "Czechia", "Côte d'Ivoire", "Denmark",
    "Djibouti", "Dominica", "Dominican Republic (the)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia",
    "Eswatini", "Ethiopia", "Falkland Islands (the) [Malvinas]", "Faroe Islands (the)", "Fiji", "Finland", "France", "French Guiana",
    "French Polynesia", "French Southern Territories (the)", "Gabon", "Gambia (the)", "Georgia", "Germany", "Ghana", "Gibraltar",
    "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti",
    "Heard Island and McDonald Islands", "Holy See (the)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia",
    "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan",
    "Kazakhstan", "Kenya", "Kiribati", "Korea (the Democratic People's Republic of)", "Korea (the Republic of)", "Kuwait", "Kyrgyzstan",
    "Lao People's Democratic Republic (the)", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania",
    "Luxembourg", "Macao", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands (the)", "Martinique",
    "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia (Federated States of)", "Moldova (the Republic of)", "Monaco",
    "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands (the)",
    "New Caledonia", "New Zealand", "Nicaragua", "Niger (the)", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands (the)",
    "Norway", "Oman", "Pakistan", "Palau", "Palestine, State of", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines (the)",
    "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Republic of North Macedonia", "Romania", "Russian Federation (the)",
    "Rwanda", "Réunion", "Saint Barthélemy", "Saint Helena, Ascension and Tristan da Cunha", "Saint Kitts and Nevis", "Saint Lucia",
    "Saint Martin (French part)", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe",
    "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Sint Maarten (Dutch part)", "Slovakia", "Slovenia",
    "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "South Sudan", "Spain", "Sri Lanka",
    "Sudan (the)", "Suriname", "Svalbard and Jan Mayen", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan",
    "Tanzania, United Republic of", "Thailand", "Timor-Leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
    "Turkmenistan", "Turks and Caicos Islands (the)", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates (the)",
    "United Kingdom of Great Britain and Northern Ireland (the)", "United States Minor Outlying Islands (the)",
    "United States of America (the)", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela (Bolivarian Republic of)", "Viet Nam",
    "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabwe",
    "Åland Islands"
];

$countryOpt = generateOptions($countries);

function calculateAge($dob) {
    $dob = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dob)->y;
    return $age;
}

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastName = trim($_POST['last_name'] ?? '');
    $firstName = trim($_POST['first_name'] ?? '');
    $middleInitial = trim($_POST['middle_initial'] ?? '');
    $dateOfBirth = $_POST['date_of_birth'] ?? '';
    $sex = $_POST['sex'] ?? '';
    $civilStatus = $_POST['civil_status'] ?? '';
    $others = trim($_POST['others'] ?? '');
    $taxId = trim($_POST['tax_id'] ?? '');
    $nationality = trim($_POST['nationality'] ?? '');
    $religion = trim($_POST['religion'] ?? '');
    $birthunit = trim($_POST['birth_unit'] ?? '');
    $birthblk = trim($_POST['birth_blk_no'] ?? '');
    $birthstreetName = trim($_POST['birth_street_name'] ?? '');
    $birthsubdivision = trim($_POST['birth_subdivision'] ?? '');
    $birthbarangay = trim($_POST['birth_brgy'] ?? '');
    $birthcity = trim($_POST['birth_city'] ?? '');
    $birthprovince = trim($_POST['birth_province'] ?? '');
    $birthcountry = $_POST['birthcountry'] ?? '';
    $birthzipCode = trim($_POST['birth_zip_code'] ?? '');
    $unit = trim($_POST['unit'] ?? '');
    $blk = trim($_POST['blk_no'] ?? '');
    $streetName = trim($_POST['street_name'] ?? '');
    $subdivision = trim($_POST['subdivision'] ?? '');
    $barangay = trim($_POST['brgy'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $province = trim($_POST['province'] ?? '');
    $country = $_POST['country'] ?? '';
    $zipCode = trim($_POST['zip_code'] ?? '');

    $mobile = trim($_POST['mobile_phone'] ?? '');
    $telephone = trim($_POST['telephone_number'] ?? '');
    $email = trim($_POST['email'] ?? '');

    $fatherlastName = trim($_POST['father_last_name'] ?? '');
    $fatherfirstName = trim($_POST['father_first_name'] ?? '');
    $fathermiddleInitial = trim($_POST['father_middle_initial'] ?? '');

    $motherlastName = trim($_POST['mother_last_name'] ?? '');
    $motherfirstName = trim($_POST['mother_first_name'] ?? '');
    $mothermiddleInitial = trim($_POST['mother_middle_initial'] ?? '');

    if (empty($lastName) || preg_match('/[0-9]/', $lastName)) {
        $errors['last_name'] = "Must not contain numbers.";
    }

    if (empty($firstName) || preg_match('/[0-9]/', $firstName)) {
        $errors['first_name'] = "Must not contain numbers.";
    }

    if (!empty($middleInitial) && !preg_match('/^[A-Za-z]$/', $middleInitial)) {
        $errors['middle_initial'] = "Middle initial must contain only one letter.";
    }

    if (empty($fatherlastName) || preg_match('/[0-9]/', $fatherlastName)) {
        $errors['father_last_name'] = "Must not contain numbers.";
    }

    if (empty($fatherfirstName) || preg_match('/[0-9]/', $fatherfirstName)) {
        $errors['father_first_name'] = "Must not contain numbers.";
    }

    if (!empty($fathermiddleInitial) && !preg_match('/^[A-Za-z]$/', $fathermiddleInitial)) {
        $errors['father_middle_initial'] = "Father's middle initial must contain only one letter.";
    }

    if (empty($motherlastName) || preg_match('/[0-9]/', $motherlastName)) {
        $errors['mother_last_name'] = "Must not contain numbers.";
    }

    if (empty($motherfirstName) || preg_match('/[0-9]/', $motherfirstName)) {
        $errors['mother_first_name'] = "Must not contain numbers.";
    }

    if (!empty($mothermiddleInitial) && !preg_match('/^[A-Za-z]$/', $mothermiddleInitial)) {
        $errors['mother_middle_initial'] = "Mother's middle initial must contain only one letter.";
    }

    if (empty($dateOfBirth)) {
        $errors['date_of_birth'] = "Invalid Date of Birth.";
    } elseif (calculateAge($dateOfBirth) < 18) {
        $errors['date_of_birth'] = "You must be at least 18 years old.";
    }

    if (empty($sex)) {
        $errors['sex'] = "Select a Gender.";
    }

    if (empty($civilStatus)) {
        $errors['civil_status'] = "Select a Civil Status.";
    } elseif ($civilStatus === 'Others' && empty($otherCivil)) {
        $errors['others'] = "Please Specify Your Civil Status.";
    }

    if (empty($taxId) || !preg_match('/^[0-9]+$/', $taxId)) {
        $errors['tax_id'] = "Must contain numbers only.";
    }

    if (empty($nationality)) {
        $errors['nationality'] = "Field is required.";
    }

    if (empty($religion)) {
        $religion = "N/A";
    }

    if (empty($birthunit)) {
        $errors['birth_unit'] = "Field is required.";
    }

    if (empty($birthblk)) {
        $errors['birth_blk_no'] = "Field is required.";
    }

    if (empty($birthstreetName)) {
        $errors['birth_street_name'] = "Field is required.";
    }

    if (empty($birthsubdivision)) {
        $birthsubdivision = "N/A";
    }

    if (empty($birthbarangay)) {
        $birthbarangay = "N/A";
    }

    if (empty($birthcity)) {
        $birthcity = "N/A";
    }

    if (empty($birthprovince)) {
        $birthprovince = "N/A";
    }

    if (empty($birthzipCode) || !preg_match('/^[0-9]+$/', $birthzipCode)) {
        $errors['birth_zip_code'] = "Must contain numbers only.";
    }

    if (empty($birthcountry)) {
        $birthcountry = "N/A";
    }

    if (empty($unit)) {
        $errors['unit'] = "Field is required.";
    }

    if (empty($blk)) {
        $errors['blk_no'] = "Field is required.";
    }

    if (empty($streetName)) {
        $errors['street_name'] = "Field is required.";
    }

    if (empty($subdivision)) {
        $subdivision = "N/A";
    }

    if (empty($barangay)) {
        $barangay = "N/A";
    }

    if (empty($city)) {
        $city = "N/A";
    }

    if (empty($province)) {
        $province = "N/A";
    }

    if (empty($zipCode) || !preg_match('/^[0-9]+$/', $zipCode)) {
        $errors['zip_code'] = "Invalid Zip Code. Must contain numbers only.";
    }

    if (empty($country)) {
        $country = "N/A";
    }

    if (empty($mobile)) {
        $errors['mobile_phone'] = "Field is required.";
    } elseif (!preg_match('/^[0-9]+$/', $mobile)) {
        $errors['mobile_phone'] = "Must contain numbers only.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($telephone) || !preg_match('/^[0-9]+$/', $telephone)) {
        $errors['telephone_number'] = "Must contain numbers only.";
    }

    if (empty($errors)) {
        $_SESSION['form_data'] = [
           'last' => $lastName,
            'first' => $firstName,
            'middle' => $middleName,
            'dob' => $dateOfBirth,
            'age' => calculateAge($dateOfBirth),
            'sex' => $sex,
            'civilStatus' => $civilStatus,
            'otherCivil' => $otherCivil,
            'taxId' => $taxId,
            'nationality' => $nationality,
            'religion' => $religion,
            'birth' => [
                'birth_unit' => $birthunit,
                'birth_blk_no' => $birthblk,
                'birth_street_name' => $birthstreetName,
                'birth_subdivision' => $birthsubdivision,
                'birth_brgy' => $birthbarangay,
                'birth_city' => $birthcity,
                'birth_province' => $birthprovince,
                'birthcountry' => $birthcountry,
                'birth_zip_code' => $birthzipCode,
            ],
            'address' => [
                'unit' => $unit,
                'blk_no' => $blk,
                'street_name' => $streetName,
                'subdivision' => $subdivision,
                'brgy' => $barangay,
                'city' => $city,
                'province' => $province,
                'country' => $country,
                'zip_code' => $zipCode,
            ],
            'contact' => [
                'mobile' => $mobile,
                'telephone' => $telephone,
                'email' => $email,
            ],
            'father_last_name' => $fatherlastName,
            'father_first_name' => $fatherfirstName,
            'father_middle_initial' => $fathermiddleInitial,
            'mother_last_name' => $motherlastName,
            'mother_first_name' => $motherfirstName,
            'mother_middle_initial' => $mothermiddleInitial,
        ];
        header("Location: dislplay.php");
        exit();
    }
}
?>

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
    <input type="text" name="last_name" placeholder="Enter Last Name" required value="<?php echo htmlspecialchars($lastName ?? ''); ?>">
    <span class="error-message"><?php echo $errors['last_name'] ?? ''; ?></span>
</div>
<div class="input-field">
<label>First Name</label>
<input type="text" name="first_name" placeholder="Enter First Name" required value="<?php echo htmlspecialchars($firstName ?? ''); ?>">
<span class="error-message"><?php echo $errors['first_name'] ?? ''; ?></span>
</div>
<div class="input-field">
<label>Middle Initial</label>
<input type="text" name="middle_initial" placeholder="Enter Middle Initial" value="<?php echo htmlspecialchars($middleInitial ?? ''); ?>">
    <span class="error-message"><?php echo $errors['middle_initial'] ?? ''; ?></span>
  </div>
<div class="input-field">   
<label for="date_of_birth">Date of Birth:</label>
<input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo htmlspecialchars($dateOfBirth ?? ''); ?>">
<span class="error-message"><?php echo $errors['date_of_birth'] ?? ''; ?></span>
</div>
</div>

<div class="sex">
    <label>Sex:</label> 
    <input type="radio" id="male" name="sex" value="Male" <?php if(isset($_POST['sex']) && $_POST['sex'] == "Male") echo "checked"; ?>>
    <label for="male">Male</label>

    <input type="radio" id="female" name="sex" value="Female" <?php if(isset($_POST['sex']) && $_POST['sex'] == "Female") echo "checked"; ?>>
    <label for="female">Female</label>

    <span class="error-message"><?php echo $errors['sex'] ?? ''; ?></span>
</div>
<div class="status">
  <label for="civilStatus">Civil Status:</label>
  <select id="civilStatus" name="civil_status" onchange="toggleOtherField()">
    <option value="">Select Civil Status</option>
    <option value="Single" <?php echo (isset($civil_status) && $civil_status === 'Single') ? 'selected' : ''; ?>>Single</option>
    <option value="Married" <?php echo (isset($civil_status) && $civil_status === 'Married') ? 'selected' : ''; ?>>Married</option>
    <option value="Widowed" <?php echo (isset($civil_status) && $civil_status === 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
    <option value="Separated" <?php echo (isset($civil_status) && $civil_status === 'Separated') ? 'selected' : ''; ?>>Legally Separated</option>
    <option value="Others" <?php echo (isset($civil_status) && $civil_status === 'Others') ? 'selected' : ''; ?>>Others</option>
  </select>

  <input type="text" id="othersInput" name="others" 
         placeholder="Specify your civil status"
         style="display: <?php echo (isset($civil_status) && $civil_status === 'Others') ? 'block' : 'none'; ?>;"
         value="<?php echo htmlspecialchars($others ?? ''); ?>">

  <span class="error-message"><?php echo $errors['civil_status'] ?? ''; ?></span>
  <span class="error-message"><?php echo $errors['others'] ?? ''; ?></span>
</div>

<script>
  function toggleOtherField() {
    var civilStatus = document.getElementById("civilStatus").value;
    var othersInput = document.getElementById("othersInput");

    if (civilStatus === "Others") {
      othersInput.style.display = "block";
      othersInput.value = "";
    } else {
      othersInput.style.display = "none";
      othersInput.value = "";
    }
  }
</script>

<div class="type">
  <div class="input-type">
    <label>Tax Identification Number</label>
    <input type="text" name="tax_id" placeholder="Enter Tax Number" pattern="[0-9]+" title="Only numbers allowed"
           value="<?php echo htmlspecialchars($tax_id ?? ''); ?>">
    <span class="error-message"><?php echo $errors['tax_id'] ?? ''; ?></span>
  </div>
  <div class="input-type">
    <label>Nationality</label>
    <input type="text" name="nationality" placeholder="Enter Nationality"
           value="<?php echo htmlspecialchars($nationality ?? ''); ?>">
    <span class="error-message"><?php echo $errors['nationality'] ?? ''; ?></span>
  </div>
  <div class="input-type">
    <label>Religion</label>
    <input type="text" name="religion" placeholder="Enter Religion"
           value="<?php echo htmlspecialchars($religion ?? ''); ?>">
  </div>
</div>

<h2>Place of Birth</h2>
<div class="place">
  <div class="input-place">
    <label>RM/FLR/Unit No. & Bldg. Name</label>
    <input type="text" name="birth_unit" placeholder="Enter Unit"
           value="<?php echo htmlspecialchars($birth_unit ?? ''); ?>">
    <span class="error-message"><?php echo $errors['birth_unit'] ?? ''; ?></span>
  </div>
  <div class="input-place">
    <label>House/Lot & Blk. No.</label>
    <input type="text" name="birth_blk_no" placeholder="Enter Blk. No."
           value="<?php echo htmlspecialchars($birth_blk_no ?? ''); ?>">
    <span class="error-message"><?php echo $errors['birth_blk_no'] ?? ''; ?></span>
  </div>

  <div class="input-place">
    <label>Street Name</label>
    <input type="text" name="birth_street_name" placeholder="Street Name"
           value="<?php echo htmlspecialchars($birth_street_name ?? ''); ?>">
    <span class="error-message"><?php echo $errors['birth_street_name'] ?? ''; ?></span>
  </div>

  <div class="input-place">
    <label>Subdivision</label>
    <input type="text" name="birth_subdivision" placeholder="Subdivision"
           value="<?php echo htmlspecialchars($birth_subdivision ?? ''); ?>">
  </div>
</div>

<div class="home">
  <div class="input-home">
    <label>Brgy/District/Locality</label>
    <input type="text" name="birth_brgy" placeholder="Enter Brgy"
           value="<?php echo htmlspecialchars($birth_brgy ?? ''); ?>">
  </div>

  <div class="input-place">
    <label>City/Municipality</label>
    <input type="text" name="birth_city" placeholder="Enter City"
           value="<?php echo htmlspecialchars($birth_city ?? ''); ?>">
  </div>

  <div class="input-place">
    <label>Province</label>
    <input type="text" name="birth_province" placeholder="Province"
           value="<?php echo htmlspecialchars($birth_province ?? ''); ?>">
  </div>

  <div class="input-place">
    <label>Zip Code</label>
    <input type="text" name="birth_zip_code" placeholder="Zip Code"
           value="<?php echo htmlspecialchars($birth_zip_code ?? ''); ?>">
    <span class="error-message"><?php echo $errors['birth_zip_code'] ?? ''; ?></span>
  </div>

  <div class="country">
    <label>Country</label>
    <select name="birthcountry" id="birthcountry">
      <option value="" disabled>Select</option>
      <?php
      foreach ($countries as $country) {
        $selected = (isset($birthcountry) && $birthcountry === $country) ? 'selected' : '';
        echo "<option value=\"$country\" $selected>$country</option>";
      }
      ?>
    </select>
    <span class="error-message"><?php echo $errors['birthcountry'] ?? ''; ?></span>
  </div>
</div>
<h2>Home Address</h2>
<div class="place">
<div class="input-place">
<label>RM/FLR/Unit No. & Bldg.Name</label>
<input type="text" name="unit" placeholder="Enter Unit">
<span class="error-message"><?php echo $errors['unit'] ?? ''; ?></span>
</div>
<div class="input-place">
<label>House/Lot & Blk.No</label>
<input type="text" name="blk_no" placeholder="Enter Blk.No">
<span class="error-message"><?php echo $errors['blk_no'] ?? ''; ?></span>
</div>
<div class="input-place">
<label>Street Name</label>
<input type="text" name="street_name" placeholder="Street Name">
<span class="error-message"><?php echo $errors['street_name'] ?? ''; ?></span>
</div>
<div class="input-place">
<label>Subdivision</label>
<input type="text" name="subdivision" placeholder="Subdivision">
</div>
</div>
<div class="home">
<div class="input-home">
<label>Brgy/District/Locality</label>
<input type="text" name="brgy" placeholder="Enter Brgy">
</div>
<div class="input-place">
<label>City/Municipality</label>
<input type="text" name="city" placeholder="Enter City">
</div>
<div class="input-place">
<label>Province</label>
<input type="text" name="province" placeholder="Province">
</div>
<div class="input-place">
<label>Zip Code</label>
<input type="text" name="zip_code" placeholder="Zip Code">
<span class="error-message"><?php echo $errors['zip_code'] ?? ''; ?></span>
</div>
<div class="country">
    <label>Country</label>
    <select name="country" id="country" required>
        <option value="" disabled selected>Select</option>
        <?php
        foreach ($countries as $country) {
            echo "<option value=\"$country\">$country</option>";
        }
        ?>
    </select>
    <span class="error"><?php echo $errors['country'] ?? ''; ?></span>
</div>
</div>
<h2>Contact Information</h2>
<div class="number">
<div class="input-number">
<label>Mobile/Cellphone Number</label>
<input type="text" name="mobile_phone" placeholder="Enter Mobile Number" pattern="[0-9]+" title="Must accept Numbers Only">
<span class="error-message"><?php echo $errors['mobile_phone'] ?? ''; ?></span>
</div>
<div class="input-number">
<label>E-mail Address</label>
<input type="email" name="email" placeholder="Enter E-mail">
<span class="error-message"><?php echo $errors['email'] ?? ''; ?></span>
</div>
<div class="input-number">
<label>Telephone Number</label>
<input type="text" name="telephone_number" placeholder="Enter Telephone Number" pattern="[0-9]+" title="Must accept Numbers Only">
<span class="error-message"><?php echo $errors['telephone_number'] ?? ''; ?></span>
</div>
</div>

<h2>Father's Name</h2>
<div class="type">
<div class="input-type">
<label>Last Name</label>
<input type="text" name="father_last_name" placeholder="Enter Last Name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
<span class="error-message"><?php echo $errors['father_last_name'] ?? ''; ?></span>
</div>
<div class="input-type">
<label>First Name</label>
<input type="text" name="father_first_name" placeholder="Enter First Name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
<span class="error-message"><?php echo $errors['father_first_name'] ?? ''; ?></span>
</div>
<div class="input-type">
<label>Middle Initial</label>
<input type="text" name="father_middle_name" placeholder="Enter Middle Initial" pattern="[A-Za-z]" title="Only one letter allowed">
<span class="error-message"><?php echo $errors['father_middle_initial'] ?? ''; ?></span>
</div>
</div>

<h2>Mother's Name</h2>
<div class="type">
<div class="input-type">
<label>Last Name</label>
<input type="text" name="mother_last_name" placeholder="Enter Last Name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
<span class="error-message"><?php echo $errors['mother_last_name'] ?? ''; ?></span>
</div>
<div class="input-type">
<label>First Name</label>
<input type="text" name="mother_first_name" placeholder="Enter First Name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
<span class="error-message"><?php echo $errors['mother_first_name'] ?? ''; ?></span>
</div>
<div class="input-type">
<label>Middle Initial</label>
<input type="text" name="mother_middle_name" placeholder="Enter Middle Initial" pattern="[A-Za-z]" title="Only one letter allowed">
<span class="error-message"><?php echo $errors['mother_middle_initial'] ?? ''; ?></span>
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

</div>

<script src="script.js"></script>
</body>
</html>
