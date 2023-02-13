<?php
    // Include the PHP Spreadsheet library
    require '../vendor/autoload.php';

    
    // Retrieve the id from the URL
    $id = $_GET['id'];

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Get the file
        $file = $_FILES['file']['tmp_name'];

        // Create a new Reader of the type defined in config.php
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file);

        // Load the spreadsheet
        $spreadsheet = $reader->load($file);

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest row and column numbers
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        // Connect to the database
        include 'configure.php';

        // Loop through each row
        for ($row = 1; $row <= $highestRow; $row++) {
            // Get the values for each column in the row
            $a = $worksheet->getCell('A' . $row)->getValue();
            $b = $worksheet->getCell('B' . $row)->getValue();
            $c = $worksheet->getCell('C' . $row)->getValue();

            // Insert the values into the database
            $sql = "UPDATE users SET FirstName='$a', MiddleName='$b', LastName='$c' WHERE ID='$id'";
            $conn->query($sql);
        }

        // Close the database connection
        $conn->close();

        // Redirect to a success page
        header("Location: userdash.php?id=$id");
    }
?>