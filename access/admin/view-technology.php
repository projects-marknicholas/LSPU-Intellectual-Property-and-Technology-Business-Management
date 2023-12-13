<?php
// Include the database connection here (in config.php)
include '../config.php';
include 'validate.php';

// Initialize response array
$response = array('status' => 'error', 'message' => '');

// Check if the ID parameter is set
if (isset($_GET['tech_id'])) {
    $techId = $_GET['tech_id'];

    // Prepare and execute the SQL query to fetch technology data by ID
    $sql = "SELECT * FROM technologies WHERE technology_id = '$techId'";
    $result = $link->query($sql);

    // Check if any rows were returned
    if ($result && $result->num_rows > 0) {
        // Fetch the result as an associative array
        $technology = $result->fetch_assoc();

        // Return the technology data as JSON
        $response['status'] = 'success';
        $response['message'] = $technology;
    } else {
        // Return an error message if the technology is not found
        $response['message'] = 'Technology not found.';
    }
} else {
    // Return an error message if the ID parameter is not set
    $response['message'] = 'Missing technology ID.';
}

// Close the connection
$link->close();

echo json_encode($response);
?>
