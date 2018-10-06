$servername = "localhost";
$username = "cvmaestros";
$password = "H52ZhcNUD";
$dbname = "cvmaestros_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<tr><td>".$row["nombre"]."</td><td>".$row["apellido_paterno"]." ".$row["apellido_materno"]."</td></tr>";
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
