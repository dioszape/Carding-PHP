<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tarjeta";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$card_name = $_POST['card_name'];
$card_number = $_POST['card_number'];
$exp_month = $_POST['exp_month'];
$exp_year = $_POST['exp_year'];
$cvv = $_POST['cvv'];

// Insertar los datos en la tabla de tarjeta
$sql = "INSERT INTO tarjeta (full_name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv) 
        VALUES ('$full_name', '$email', '$address', '$city', '$state', '$zip_code', '$card_name', '$card_number', '$exp_month', '$exp_year', '$cvv')";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
  echo "Los datos se han registrado correctamente en la tabla tarjeta";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Insertar los datos del usuario en la base de datos
// ...

// Mostrar mensaje de éxito
echo "Registro exitoso. Bienvenido/a, $nombre.";

// Redirigir a la página externa
header("Location: tick_index_to_index_card.php");
exit();


// Cerrar la conexión
$conn->close();
?>
