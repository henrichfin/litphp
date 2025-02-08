<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>

<h2>Submitted Information</h2>

<table>
    <tr><th>Field</th><th>Value</th></tr>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($_POST as $key => $value) {
                $cleanValue = htmlspecialchars($value);
                echo "<tr><td><b>" . ucfirst(str_replace("_", " ", $key)) . "</b></td><td>$cleanValue</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2' style='color: red;'>No data submitted.</td></tr>";
        }
    ?>
</table>

<a href="index.php" style="display: block; margin-top: 20px;">Go Back</a>

</body>
</html>