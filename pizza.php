<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";

// 데이터베이스에 연결
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Pizza Input Page</title>
</head>
<body>
  <h1>Pizza Input Page</h1>
  <form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="price">Price:</label>
    <input type="number" name="price" required><br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];

  $sql = "INSERT INTO pizza (name, price, quantity) VALUES ('$name', $price, $quantity)";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
