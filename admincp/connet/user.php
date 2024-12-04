<?php
function connect() {
    // Create a connection to the database
    $mysqli = new mysqli("localhost", "root", "", "buonbanthietbithongminh");

    // Check if the connection was successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    return $mysqli;
}

function checkuser($user, $pass) {
    // Use the connect function to establish a database connection
    $conn = connect();
    
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user = ? AND pass = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    
    // Get the result of the query
    $result = $stmt->get_result();
    $kq = $result->fetch_all(MYSQLI_ASSOC);
    
    // Check if the user exists and return the role, or return 0 if not found
    if (count($kq) > 0) return $kq[0]['role'];
    else return 0;
}

function getuserinfo($user, $pass) {
    // Establish the connection using the connect function
    $conn = connect();
    
    // Prepare the SQL query
    $sql = "SELECT * FROM tbl_user WHERE user = ? AND pass = ? LIMIT 1";
    
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    
    // Fetch the result
    $result = $stmt->get_result();
    
    // Check if any rows were returned and return the user info
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC); // Return an associative array with user information
    } else {
        return null; // Return null if no user was found
    }
}
?>
