<?php
// Include the database connection here (in config.php)
include '../config.php';
include 'validate.php';

// Initialize response array
$response = array('status' => 'error', 'message' => '');

// Retrieve account_id from the session
$account_id = $_SESSION['account_id'];

// Retrieve branch and role from the database
$sql_branch = "SELECT role, branch FROM register WHERE account_id = '$account_id'";
$result_branch = $link->query($sql_branch);

if ($result_branch && $result_branch->num_rows > 0) {
    $row_branch = $result_branch->fetch_assoc();
    $branch = $row_branch['branch'];
    $role = $row_branch['role'];

    // Prepare and execute the SQL query with branch and role filter
    $sql = "SELECT announcement_id, banner_img, title, announcement_description, announcement_from, announcement_to 
        FROM announcements
        WHERE (announcement_status = '$role ($branch)' 
            OR branch = '$role (All)' 
            OR branch = 'All' 
            OR branch = 'Website'
            OR announcement_status = '$role (All)'
            OR announcement_status = 'All'
            OR announcement_status = 'Website') 
        ORDER BY id DESC";

    $result = $link->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Initialize an array to store the announcements
        $announcements = array();

        while ($row = $result->fetch_assoc()) {
            $announcement = array(
                'id' => $row['announcement_id'],
                'banner_img' => $row['banner_img'],
                'title' => $row['title'],
                'from' => $row['announcement_from'],
                'to' => $row['announcement_to']
            );

            // Add the announcement to the array
            $announcements[] = $announcement;

            // Check if announcement_to is past 12 pm today
            $toDateTime = strtotime($row['announcement_to'] . ' 12:00:00');
            if ($toDateTime < strtotime('now')) {
                // Delete announcement and its banner image
                $announcementId = $row['announcement_id'];
                $bannerImgPath = '../files/announcements/' . $row['banner_img'];
                $sqlDelete = "DELETE FROM announcements WHERE announcement_id = $announcementId";
                if ($link->query($sqlDelete) === TRUE) {
                    // Delete the banner image file
                    if (file_exists($bannerImgPath)) {
                        unlink($bannerImgPath);
                    }
                }
            }
        }

        // Set the response message
        $response['status'] = 'success';
        $response['message'] = $announcements;
    } else {
        $response['message'] = "No announcements found.";
    }
} else {
    $response['message'] = 'Error retrieving branch: ' . $link->error;
}

// Close the connection
$link->close();

echo json_encode($response);
?>
