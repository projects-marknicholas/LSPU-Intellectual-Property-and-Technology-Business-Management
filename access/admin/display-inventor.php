<?php
// Include the database connection here (in config.php)
include '../config.php';
include 'validate.php';

// Initialize response array
$response = array('status' => 'error', 'message' => '');

$account_id = $_SESSION['account_id'];

// Retrieve branch associated with the account
$sql_branch = "SELECT branch FROM register WHERE account_id = '$account_id'";
$result_branch = $link->query($sql_branch);

if ($result_branch->num_rows > 0) {
    $row_branch = $result_branch->fetch_assoc();
    $branch = $row_branch['branch'];

    // Prepare and execute the SQL query
    $sql = "SELECT technology_id, branch, technology, inventors, technology_status FROM technologies WHERE branch = '$branch' ORDER BY id DESC";
    $result = $link->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Initialize an array to store the technologies
        $technologies = array();

        while ($row = $result->fetch_assoc()) {
            $inventor_html = $row['inventors'];

            // Create a new DOMDocument
            $doc = new DOMDocument();
            libxml_use_internal_errors(true); // Suppress warnings for invalid HTML
            $doc->loadHTML($inventor_html);
            libxml_clear_errors();

            // Get the text content
            $inventor_text = $doc->textContent;

            // Remove extra whitespaces and trim
            $inventor_text = preg_replace('/\s+/', ' ', $inventor_text);
            $inventor_text = trim($inventor_text);

            $technology = array(
                'id' => $row['technology_id'],
                'branch' => $row['branch'],
                'technology' => $row['technology'],
                'inventor' => $inventor_text,
                'status' => $row['technology_status']
            );

            // Add the technology to the array
            $technologies[] = $technology;
        }

        // Set the response message
        $response['status'] = 'success';
        $response['message'] = $technologies;
    } else {
        $response['message'] = "No technologies found.";
    }
} else {
    $response['status'] = 'error';
    $response['message'] = "Error retrieving branch.";
}

// Close the connection
$link->close();

echo json_encode($response);
?>
