<?php
$lastName = "";
$firstName = "";
$middleInitial = "";
$dateOfBirth = "";
$taxId = ""; 
$mobilePhone = ""; 
$telephoneNumber = "";
$email = "";
$zipCode = "";

$fatherLastName = "";
$fatherFirstName = "";
$fatherMiddleName = "";

$motherLastName = "";
$motherFirstName = "";
$motherMiddleName = "";
$errors = [];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        $lastName = $_POST['last_name'] ?? "";
        $firstName = $_POST['first_name'] ?? "";
        $middleInitial = $_POST['middle_initial'] ?? "";
        $dateOfBirth = $_POST['date_of_birth'] ?? "";
        
        $taxId = $_POST['tax_id'] ?? ""; 
        $mobilePhone = $_POST['mobile_phone'] ?? ""; 
        $telephoneNumber = $_POST['telephone_number'] ?? "";
        $email = $_POST['email'] ?? "";
        $zipCode = $_POST['zip_code']??"";

        $fatherLastName = $_POST['father_last_name'] ?? "";
        $fatherFirstName = $_POST['father_first_name'] ?? "";
        $fatherMiddleName = $_POST['father_middle_name'] ?? "";
        
        $motherLastName = $_POST['mother_last_name'] ?? "";
        $motherFirstName = $_POST['mother_first_name'] ?? "";
        $motherMiddleName = $_POST['mother_middle_name'] ?? "";
    
        function validateName($name) {
            return preg_match("/^[a-zA-Z\s]+$/", $name);
        }

        function validatePhoneNumber($mobilePhone) {
            return preg_match("/^[0-9]{10,15}$/", $mobilePhone);
        }
        function validateTelephoneNumber($telephoneNumber) {
            return preg_match("/^[0-9]{10,15}$/", $telephoneNumber);
        }


        function validateNumber($number) {
            return preg_match("/^[0-9]+$/", $number);
        }
        function validateMiddleInitial($middleInitial) {
            return preg_match("/^[a-zA-Z]{1}$/", $middleInitial);
        }   
        function validateZipCode($zipCode) {
            return preg_match("/^\d{5}(-\d{4})?$/", $zipCode);
        }
     
         if (!validateName($lastName)) {
        $errors['last_name'] = "Last Name must only contain letters.";
    }

    if (!validateName($firstName)) {
        $errors['first_name'] = "First Name must only contain letters.";
    }

    if (!empty($middleInitial) && !validateMiddleInitial($middleInitial)) {
        $errors['middle_initial'] = "Middle Initial must be a single letter.";
    }
    

        if (empty($_POST['date_of_birth'])) {
            $errors['date_of_birth'] = "Date of Birth is .";
        } else {
            try {
                $dob = new DateTime($_POST['date_of_birth']);
                $today = new DateTime();
                $age = $today->diff($dob)->y;
                if ($age < 18) {
                    $errors['date_of_birth'] = "You must be at least 18 years old.";
                }
            } catch (Exception $e) {
                $errors['date_of_birth'] = "Invalid Date of Birth format.";
            }
        

            if (!empty($_POST['tax_id']) && !validateNumber($_POST['tax_id'])) {
                $errors['tax_id'] = "Tax Identification Number must contain only numbers.";
            }
            if (!empty($_POST['mobile_phone']) && !validatePhoneNumber($_POST['mobile_phone'])) {
                $errors['mobile_phone'] = "Mobile Phone must be 10-15 digits.";
            }
            if (!empty($_POST['telephone_number']) && !validateTelephoneNumber($_POST['telephone_number'])) {
                $errors['telephone_number'] = "Telephone must be 10-15 digits.";
            }
            if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format.";
            }
            if (!empty($_POST['zip_code']) && !validateZipCode($_POST['zip_code'])) {
                $errors['zip_code'] = "Zip Code must be 4 to 6 digits.";
            }
        }
        if (!validateName($fatherLastName)) {
            $errors['father_last_name'] = "Father's Last Name must only contain letters.";
        }    
        if (!validateName($fatherFirstName)) {
            $errors['father_first_name'] = "Father's First Name must only contain letters.";
        }
    
       
    if (!empty($fatherMiddleName) && !validateMiddleInitial($fatherMiddleName)) {
        $errors['father_middle_name'] = "Father's Middle Initial must be a single letter.";
    }
    if (!validateName($motherLastName)) {
        $errors['mother_last_name'] = "Mother's Last Name must only contain letters.";
    }

    if (!validateName($motherFirstName)) {
        $errors['mother_first_name'] = "Mother's First Name must only contain letters.";
    }

    if (!empty($motherMiddleName) && !validateMiddleInitial($motherMiddleName)) {
        $errors['mother_middle_name'] = "Mother's Middle Initial must be a single letter.";
    }
if (empty($errors)) {
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
 <form action="dislplay.php" method="POST">     
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">     
<div class="form first">
<div class="details personal">
<h1>Personal Data</h1>

<div class="fields">
<div class="input-field">
    <label>Last Name</label>
    <input type="text" name="last_name" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($lastName ?? ''); ?>">
    <span class="error-message"><?php echo $errors['last_name'] ?? ''; ?></span>
</div>
<div class="input-field">
<label>First Name</label>
<input type="text" name="first_name" placeholder="Enter First Name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
</div>
<div class="input-field">
<label>Middle Initial</label>
<input type="text" name="middle_initial" placeholder="Enter Middle Initial" pattern="[A-Za-z]" title="Only one letter allowed">

</div>
<div class="input-field">
<label for="date_of_birth">Date of Birth:</label>
<input type="date" id="date_of_birth" name="date_of_birth"> 
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
<input type="text" name="tax_id" placeholder="Enter Tax Number" pattern="[0-9]+" title="Only numbers allowed">
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
<input type="text" name="zip_code" placeholder="Zip Code" >
</div>
<div class=country>
              <label>Country</label>
            <select name="birthcountry" id="country" >
                <option value=""disabled selected>Select</option>
            <?php

            $countries = [  "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia","Aruba",            "Australia", "Austria", "Azerbaijan", "Bahamas (the)", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize",  "Benin", "Bermuda",            "Bhutan",            "Bolivia (Plurinational State of)",            "Bonaire, Sint Eustatius and Saba",            "Bosnia and Herzegovina",            "Botswana",            "Bouvet Island",            "Brazil",            "British Indian Ocean Territory (the)",            "Brunei Darussalam",            "Bulgaria",            "Burkina Faso",            "Burundi",            "Cabo Verde",            "Cambodia",            "Cameroon",            "Canada",            "Cayman Islands (the)",            "Central African Republic (the)",            "Chad",            "Chile",            "China",            "Christmas Island",            "Cocos (Keeling) Islands (the)",            "Colombia",            "Comoros (the)",            "Congo (the Democratic Republic of the)",            "Congo (the)",            "Cook Islands (the)",            "Costa Rica",            "Croatia",            "Cuba",            "Curaçao",            "Cyprus",            "Czechia",            "Côte d'Ivoire",            "Denmark",            "Djibouti",            "Dominica",            "Dominican Republic (the)",            "Ecuador",            "Egypt",            "El Salvador",            "Equatorial Guinea",            "Eritrea",            "Estonia",            "Eswatini",            "Ethiopia",            "Falkland Islands (the) [Malvinas]",            "Faroe Islands (the)",            "Fiji",            "Finland",            "France",            "French Guiana",            "French Polynesia",            "French Southern Territories (the)",            "Gabon",            "Gambia (the)",            "Georgia",            "Germany",            "Ghana",            "Gibraltar",            "Greece",            "Greenland",            "Grenada",            "Guadeloupe",            "Guam",            "Guatemala",            "Guernsey",            "Guinea",            "Guinea-Bissau",            "Guyana",            "Haiti",            "Heard Island and McDonald Islands",            "Holy See (the)",            "Honduras",            "Hong Kong",            "Hungary",            "Iceland",            "India",            "Indonesia",            "Iran (Islamic Republic of)",            "Iraq",            "Ireland",            "Isle of Man",            "Israel",            "Italy",            "Jamaica",            "Japan",            "Jersey",            "Jordan",            "Kazakhstan",            "Kenya",            "Kiribati",            "Korea (the Democratic People's Republic of)",            "Korea (the Republic of)",            "Kuwait",            "Kyrgyzstan",            "Lao People's Democratic Republic (the)",            "Latvia",            "Lebanon",            "Lesotho",            "Liberia",            "Libya",            "Liechtenstein",            "Lithuania",            "Luxembourg",            "Macao",            "Madagascar",            "Malawi",            "Malaysia",            "Maldives",            "Mali",            "Malta",            "Marshall Islands (the)",            "Martinique",            "Mauritania",            "Mauritius",            "Mayotte",            "Mexico",            "Micronesia (Federated States of)",            "Moldova (the Republic of)",            "Monaco",            "Mongolia",            "Montenegro",            "Montserrat",            "Morocco",            "Mozambique",            "Myanmar",            "Namibia",            "Nauru",            "Nepal",            "Netherlands (the)",            "New Caledonia",            "New Zealand",            "Nicaragua",            "Niger (the)",            "Nigeria",            "Niue",            "Norfolk Island",            "Northern Mariana Islands (the)",            "Norway",            "Oman",            "Pakistan",            "Palau",            "Palestine, State of",            "Panama",            "Papua New Guinea",            "Paraguay",            "Peru",            "Philippines (the)",            "Pitcairn",            "Poland",            "Portugal",            "Puerto Rico",            "Qatar",            "Republic of North Macedonia",            "Romania",            "Russian Federation (the)",            "Rwanda",            "Réunion",            "Saint Barthélemy",            "Saint Helena, Ascension and Tristan da Cunha",            "Saint Kitts and Nevis",            "Saint Lucia",            "Saint Martin (French part)",            "Saint Pierre and Miquelon",            "Saint Vincent and the Grenadines",            "Samoa",            "San Marino",            "Sao Tome and Principe",            "Saudi Arabia",            "Senegal",            "Serbia",            "Seychelles",            "Sierra Leone",            "Singapore",            "Sint Maarten (Dutch part)",            "Slovakia",            "Slovenia",            "Solomon Islands",            "Somalia",            "South Africa",            "South Georgia and the South Sandwich Islands",            "South Sudan",            "Spain",            "Sri Lanka",            "Sudan (the)",            "Suriname",            "Svalbard and Jan Mayen",            "Sweden",            "Switzerland",            "Syrian Arab Republic",            "Taiwan",            "Tajikistan",            "Tanzania, United Republic of",            "Thailand",            "Timor-Leste",            "Togo",            "Tokelau",            "Tonga",            "Trinidad and Tobago",            "Tunisia",            "Turkey",            "Turkmenistan",            "Turks and Caicos Islands (the)",            "Tuvalu",            "Uganda",            "Ukraine",            "United Arab Emirates (the)",            "United Kingdom of Great Britain and Northern Ireland (the)",            "United States Minor Outlying Islands (the)",            "United States of America (the)",            "Uruguay",            "Uzbekistan",            "Vanuatu",            "Venezuela (Bolivarian Republic of)",            "Viet Nam",            "Virgin Islands (British)",            "Virgin Islands (U.S.)",            "Wallis and Futuna",            "Western Sahara",            "Yemen",            "Zambia",            "Zimbabwe",            "Åland Islands"
        ];

        foreach($countries as $country){
            echo"<option value=\"$country\">$country</option>";
        }
        ?>
        </select>
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
<input type="text" name="zip_code" placeholder="Zip Code">
</div>
<div class=country>
              <label>Country</label>
            <select name="birthcountry" id="country" >
                <option value=""disabled selected>Select</option>
            <?php

            $countries = [  "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia","Aruba",            "Australia", "Austria", "Azerbaijan", "Bahamas (the)", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize",  "Benin", "Bermuda",            "Bhutan",            "Bolivia (Plurinational State of)",            "Bonaire, Sint Eustatius and Saba",            "Bosnia and Herzegovina",            "Botswana",            "Bouvet Island",            "Brazil",            "British Indian Ocean Territory (the)",            "Brunei Darussalam",            "Bulgaria",            "Burkina Faso",            "Burundi",            "Cabo Verde",            "Cambodia",            "Cameroon",            "Canada",            "Cayman Islands (the)",            "Central African Republic (the)",            "Chad",            "Chile",            "China",            "Christmas Island",            "Cocos (Keeling) Islands (the)",            "Colombia",            "Comoros (the)",            "Congo (the Democratic Republic of the)",            "Congo (the)",            "Cook Islands (the)",            "Costa Rica",            "Croatia",            "Cuba",            "Curaçao",            "Cyprus",            "Czechia",            "Côte d'Ivoire",            "Denmark",            "Djibouti",            "Dominica",            "Dominican Republic (the)",            "Ecuador",            "Egypt",            "El Salvador",            "Equatorial Guinea",            "Eritrea",            "Estonia",            "Eswatini",            "Ethiopia",            "Falkland Islands (the) [Malvinas]",            "Faroe Islands (the)",            "Fiji",            "Finland",            "France",            "French Guiana",            "French Polynesia",            "French Southern Territories (the)",            "Gabon",            "Gambia (the)",            "Georgia",            "Germany",            "Ghana",            "Gibraltar",            "Greece",            "Greenland",            "Grenada",            "Guadeloupe",            "Guam",            "Guatemala",            "Guernsey",            "Guinea",            "Guinea-Bissau",            "Guyana",            "Haiti",            "Heard Island and McDonald Islands",            "Holy See (the)",            "Honduras",            "Hong Kong",            "Hungary",            "Iceland",            "India",            "Indonesia",            "Iran (Islamic Republic of)",            "Iraq",            "Ireland",            "Isle of Man",            "Israel",            "Italy",            "Jamaica",            "Japan",            "Jersey",            "Jordan",            "Kazakhstan",            "Kenya",            "Kiribati",            "Korea (the Democratic People's Republic of)",            "Korea (the Republic of)",            "Kuwait",            "Kyrgyzstan",            "Lao People's Democratic Republic (the)",            "Latvia",            "Lebanon",            "Lesotho",            "Liberia",            "Libya",            "Liechtenstein",            "Lithuania",            "Luxembourg",            "Macao",            "Madagascar",            "Malawi",            "Malaysia",            "Maldives",            "Mali",            "Malta",            "Marshall Islands (the)",            "Martinique",            "Mauritania",            "Mauritius",            "Mayotte",            "Mexico",            "Micronesia (Federated States of)",            "Moldova (the Republic of)",            "Monaco",            "Mongolia",            "Montenegro",            "Montserrat",            "Morocco",            "Mozambique",            "Myanmar",            "Namibia",            "Nauru",            "Nepal",            "Netherlands (the)",            "New Caledonia",            "New Zealand",            "Nicaragua",            "Niger (the)",            "Nigeria",            "Niue",            "Norfolk Island",            "Northern Mariana Islands (the)",            "Norway",            "Oman",            "Pakistan",            "Palau",            "Palestine, State of",            "Panama",            "Papua New Guinea",            "Paraguay",            "Peru",            "Philippines (the)",            "Pitcairn",            "Poland",            "Portugal",            "Puerto Rico",            "Qatar",            "Republic of North Macedonia",            "Romania",            "Russian Federation (the)",            "Rwanda",            "Réunion",            "Saint Barthélemy",            "Saint Helena, Ascension and Tristan da Cunha",            "Saint Kitts and Nevis",            "Saint Lucia",            "Saint Martin (French part)",            "Saint Pierre and Miquelon",            "Saint Vincent and the Grenadines",            "Samoa",            "San Marino",            "Sao Tome and Principe",            "Saudi Arabia",            "Senegal",            "Serbia",            "Seychelles",            "Sierra Leone",            "Singapore",            "Sint Maarten (Dutch part)",            "Slovakia",            "Slovenia",            "Solomon Islands",            "Somalia",            "South Africa",            "South Georgia and the South Sandwich Islands",            "South Sudan",            "Spain",            "Sri Lanka",            "Sudan (the)",            "Suriname",            "Svalbard and Jan Mayen",            "Sweden",            "Switzerland",            "Syrian Arab Republic",            "Taiwan",            "Tajikistan",            "Tanzania, United Republic of",            "Thailand",            "Timor-Leste",            "Togo",            "Tokelau",            "Tonga",            "Trinidad and Tobago",            "Tunisia",            "Turkey",            "Turkmenistan",            "Turks and Caicos Islands (the)",            "Tuvalu",            "Uganda",            "Ukraine",            "United Arab Emirates (the)",            "United Kingdom of Great Britain and Northern Ireland (the)",            "United States Minor Outlying Islands (the)",            "United States of America (the)",            "Uruguay",            "Uzbekistan",            "Vanuatu",            "Venezuela (Bolivarian Republic of)",            "Viet Nam",            "Virgin Islands (British)",            "Virgin Islands (U.S.)",            "Wallis and Futuna",            "Western Sahara",            "Yemen",            "Zambia",            "Zimbabwe",            "Åland Islands"
        ];

        foreach($countries as $country){
            echo"<option value=\"$country\">$country</option>";
        }
        ?>
        </select>
              </div>
</div>



<h2>Contact Information</h2>
<div class="number">
<div class="input-number">
<label>Mobile/Cellphone Number</label>
<input type="text" name="mobile_phone" placeholder="Enter Mobile Number"  pattern="[0-9]+" title="Must accept Numbers Only">
</div>
<div class="input-number">
<label>E-mail Address</label>
<input type="email" name="email" placeholder="Enter E-mail"> 

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
<input type="text" name="father_last_name" placeholder="Enter Last Name"  pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
</div>
<div class="input-type">
<label>First Name</label>
<input type="text" name="father_first_name" placeholder="Enter First Name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" >
</div>
<div class="input-type">
<label>Middle Initial</label>
<input type="text" name="father_middle_name" placeholder="Enter Middle Initial" pattern="[A-Za-z]" title="Only one letter allowed" >
</div>
</div>

<h2>Mother's Name</h2>
<div class="type">
<div class="input-type">
<label>Last Name</label>
<input type="text" name="mother_last_name" placeholder="Enter Last Name"  pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
</div>
<div class="input-type">
<label>First Name</label>
<input type="text" name="mother_first_name" placeholder="Enter First Name"  pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
</div>
<div class="input-type">
<label>Middle Initial</label>
<input type="text" name="mother_middle_name" placeholder="Enter Middle Initial" pattern="[A-Za-z]" title="Only one letter allowed" >
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

<?php if (!empty($errors)): ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let errorFields = <?php echo json_encode($errors); ?>;
        for (let field in errorFields) {
            let inputField = document.querySelector(`[name='` + field + `']`);
            if (inputField) {
                let errorSpan = document.createElement("span");
                errorSpan.classList.add("error-message");
                errorSpan.innerText = errorFields[field];
                inputField.parentNode.appendChild(errorSpan);
            }
        }
    });
</script>

<?php endif; ?>
<script src="script.js"></script>
</body>
</html>
