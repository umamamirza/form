<?php
include('dbConnection.php');
// Query to select all records from the 'students' table
$sql = "SELECT * FROM students"; 
$result = $conn->query($sql);

$response = array(); // Array to store the results

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row; // Add each row to the response array
    }
} else {
    $response["message"] = "No records found.";
}
// Close the database connection
$conn->close();
// Set the content type to JSON
header('Content-Type: application/json');
// Return the JSON-encoded response
echo json_encode($response);
?>

