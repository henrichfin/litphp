<?php
session_start();
include 'db.php'; // Include the database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the query to fetch personal data
    $stmt = $conn->prepare("SELECT * FROM tbl_info WHERE p_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $formationResult = $stmt->get_result();
    $formationData = $formationResult->fetch_assoc();

    // Prepare and execute the query to fetch birth data
    $stmt = $conn->prepare("SELECT * FROM tbl_birth WHERE b_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $birthResult = $stmt->get_result();
    $birthData = $birthResult->fetch_assoc();

    // Prepare and execute the query to fetch address data
    $stmt = $conn->prepare("SELECT * FROM tbl_address WHERE h_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $addressResult = $stmt->get_result();
    $addressData = $addressResult->fetch_assoc();

    // Prepare and execute the query to fetch contact data
    $stmt = $conn->prepare("SELECT * FROM tbl_contact WHERE c_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $contactResult = $stmt->get_result();
    $contactData = $contactResult->fetch_assoc();

    // Prepare and execute the query to fetch parents data
    $stmt = $conn->prepare("SELECT * FROM tbl_parents WHERE pt_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $parentsResult = $stmt->get_result();
    $parentsData = $parentsResult->fetch_assoc();
} else {
    echo "ID not specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="stylesheet" href="view.css">
       
</head>
<body>
<div class="container">
        <?php
        // Check if data exists
        if ($formationData) {
            // Display the details
            echo "<h2>Details for ID: " . htmlspecialchars($formationData['p_id']) . "</h2>";
            echo "<div class='horizontal-line'></div>";
            echo "<h3>Personal Information</h3>";
            echo "<div class='flex-container'>";
            echo "<div class='flex-item'><span class='info-label'>Last Name:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_lname']) . "</span></div>";
            echo "<div class='flex-item'><span class='info-label'>First Name:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_fname']) . "</span></div>";
            echo "<div class='flex-item'><span class='info-label'>Middle Initial:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_middle']) . "</span></div>";
            echo "</div>";
            echo "<div class='flex-container'>";
            echo "<div class='flex-item'><span class='info-label'>Date of Birth:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_dob']) . "</span></div>";
            echo "<div class='flex-item'><span class='info-label'>Sex:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_sex']) . "</span></div>";
            echo "<div class='flex-item'><span class='info-label'>Civil Status:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_status']) . "</span></div>";
            echo "</div>";
            echo "<div class='flex-container'>";
            echo "<div class='flex-item'><span class='info-label'>Tax ID:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_tax']) . "</span></div>";
            echo "<div class='flex-item'><span class='info-label'>Nationality:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_nationality']) . "</span></div>";
            echo "<div class='flex-item'><span class='info-label'>Religion:</span> <span class='info-value'>" . htmlspecialchars($formationData['p_religion']) . "</span></div>";
            echo "</div>";

        
            if ($birthData) {
                echo "<h3>Place of Birth</h3>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Unit:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_unit']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Block:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_blk']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Street Name:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_sn']) . "</span></div>";
                echo "</div>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Subdivision:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_sub']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Barangay:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_brgy']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>City:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_city']) . "</span></div>";
                echo "</div>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Province:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_province']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Country:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_country']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Zip Code:</span> <span class='info-value'>" . htmlspecialchars($birthData['b_zip']) . "</span></div>";
                echo "</div>";
            }

            // Display address information
            if ($addressData) {
                echo "<h3>Home Address</h3>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Unit:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_unit']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Block:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_blk']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Street Name:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_sn']) . "</span></div>";
                echo "</div>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Subdivision:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_sub']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Barangay:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_brgy']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>City:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_city']) . "</span></div>";
                echo "</div>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Province:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_province']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Country:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_country']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Zip Code:</span> <span class='info-value'>" . htmlspecialchars($addressData['h_zip']) . "</span></div>";
                echo "</div>";
            }

            // Display contact information
            if ($contactData) {
                echo "<h3>Contact Information</h3>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Mobile:</span> <span class='info-value'>" . htmlspecialchars($contactData['c_mobile']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Telephone:</span> <span class='info-value'>" . htmlspecialchars($contactData['c_tel']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Email:</span> <span class='info-value'>" . htmlspecialchars($contactData['c_email']) . "</span></div>";
                echo "</div>";
            }

            // Display parents information
            if ($parentsData) {
                echo "<h3>Parents Information</h3>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Father's Last Name:</span> <span class='info-value'>" . htmlspecialchars($parentsData['pt_flname']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Father's First Name:</span> <span class='info-value'>" . htmlspecialchars($parentsData['pt_ffname']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Father's Middle Initial:</span> <span class='info-value'>" . htmlspecialchars($parentsData['pt_fmiddle']) . "</span></div>";
                echo "</div>";
                echo "<div class='flex-container'>";
                echo "<div class='flex-item'><span class='info-label'>Mother's Last Name:</span> <span class='info-value'>" . htmlspecialchars($parentsData['pt_mlname']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Mother's First Name:</span> <span class='info-value'>" . htmlspecialchars($parentsData['pt_mfname']) . "</span></div>";
                echo "<div class='flex-item'><span class='info-label'>Mother's Middle Initial:</span> <span class='info-value'>" . htmlspecialchars($parentsData['pt_mmiddle']) . "</span></div>";
                echo "</div>";
            }
        } else {
            echo "No data found for this ID.";
        }
        ?>
        <div class="button-container">
            <form action="index.php" method="get">
                <button type="submit">Back</button>
            </form>
        </div>
    </div>
</body>
</html>