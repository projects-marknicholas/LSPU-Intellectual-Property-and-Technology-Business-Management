<?php
// Include the database connection here (in config.php)
include '../config.php';
include 'validate.php';

// Initialize response array
$response = array('status' => 'error', 'message' => '');

// Check if the ID parameter is set
if (isset($_GET['aid'])) {
    $announcementId = $_GET['aid'];

    // Prepare and execute the SQL query to fetch announcement data by ID
    $sql = "SELECT * FROM announcements WHERE announcement_id = '$announcementId'";
    $result = $link->query($sql);

    // Check if any rows were returned
    if ($result && $result->num_rows > 0) {
        // Fetch the result as an associative array
        $announcement = $result->fetch_assoc();

        // Return the announcement data as JSON
        $response['status'] = 'success';
        $response['message'] = $announcement;
    } else {
        // Return an error message if the announcement is not found
        $response['message'] = 'Announcement not found.';
    }
} else {
    // Return an error message if the ID parameter is not set
    $response['message'] = 'Missing announcement ID.';
}

// Close the connection
$link->close();

echo json_encode($response);
?>
