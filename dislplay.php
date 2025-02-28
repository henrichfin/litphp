<?php
session_start();


if (!isset($_SESSION['form_data'])) {
    
    header("Location: index.php"); 
    exit();
}


$formData = $_SESSION['form_data'];


unset($_SESSION['form_data']);

function displayData($label, $value){
    echo "<p><strong>$label:</strong> " . htmlspecialchars($value) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="submit.css">

</head>
<body>
    <div class="container">
    <h2>Personal Information</h2>
    <?php
    displayData("Name", $formData['fullName']);
    displayData("Date of Birth", $formData['dob']);
    displayData("Age", $formData['age']);
    displayData("Sex", $formData['sex']);
    displayData("Civil Status", $formData['civilStatus']);
    displayData("Other Civil Status", $formData['otherCivil']);
    displayData("Tax ID", $formData['taxId']);
    displayData("Nationality", $formData['nationality']);
    displayData("Religion", $formData['religion']);
    ?>

    <h2>Place of Birth</h2>
    <?php
    displayData("Unit No. & Bldg. Name", $formData['birth']['birth_unit']);
    displayData("House/Lot & Blk. No", $formData['birth']['birth_blk_no']);
    displayData("Street Name", $formData['birth']['birth_street_name']);
    displayData("Subdivision", $formData['birth']['birth_subdivision']);
    displayData("Brgy/District/Locality", $formData['birth']['birth_brgy']);
    displayData("City/Municipality", $formData['birth']['birth_city']);
    displayData("Province", $formData['birth']['birth_province']);
    displayData("Zip Code", $formData['birth']['birth_zip_code']);
    displayData("Country", $formData['birth']['birthcountry']);
    ?>

<h2>Home Address</h2>
    <?php
    displayData("Unit No. & Bldg. Name", $formData['address']['unit']);
    displayData("House/Lot & Blk. No", $formData['address']['blk_no']);
    displayData("Street Name", $formData['address']['street_name']);
    displayData("Subdivision", $formData['address']['subdivision']);
    displayData("Brgy/District/Locality", $formData['address']['brgy']);
    displayData("City/Municipality", $formData['address']['city']);
    displayData("Province", $formData['address']['province']);	
    displayData("Zip Code", $formData['address']['zip_code']);
    displayData("Country", $formData['address']['country']);
    ?>

    <h2>Contact Information</h2>
    <?php
    displayData("Mobile Number", $formData['contact']['mobile']);
    displayData("Telephone Number", $formData['contact']['telephone']);
    displayData("Email", $formData['contact']['email']);
    ?>

    <h2>Parents' Information</h2>
    <?php
    displayData("Father's Name", $formData['father_last_name'] . ", " . $formData['father_first_name'] . " " . $formData['father_middle_initial']);
    displayData("Mother's Name", $formData['mother_last_name'] . ", " . $formData['mother_first_name'] . " " . $formData['mother_middle_initial']);
    ?>


<button onclick="window.history.back();">Back</button>
</div>



</body>
</html>