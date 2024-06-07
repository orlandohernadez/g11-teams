<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventarios";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Recuperar los informes de la base de datos
$sql = "SELECT * FROM informes"; // Asegúrate de que la tabla se llama 'informes'
$result = $conn->query($sql);

echo '<!DOCTYPE html>';
echo '<html lang="es">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<style>';
echo 'body {';
echo '    margin: 0;';
echo '    padding: 0;';
echo '    font-family: Arial, sans-serif;';
echo '}';
echo '.container {';
echo '    display: flex;';
echo '    justify-content: center;';
echo '    align-items: flex-start;';
echo '    padding-top: 20px;'; // Puedes ajustar este valor según sea necesario
echo '}';
echo 'table {';
echo '    border-collapse: collapse;';
echo '    width: 40%;';
echo '}';
echo 'th, td {';
echo '    padding: 10px;';
echo '    text-align: left;';
echo '}';
echo 'th {';
echo '    background-color: #f2f2f2;';
echo '}';
echo '</style>';
echo '<title>Inventario de Productos</title>';
echo '</head>';
echo '<body>';
echo '<div class="container">';

if ($result->num_rows > 0) {
    // Generar el HTML para mostrar los informes
    echo '<table border="3">';
    echo "<tr><th>id</th><th>fecha_inicio</th><th>fecha_fin</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["fecha_inicio"] . "</td>";
        echo "<td>" . $row["fecha_fin"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay informes registrados.";
}

echo '</div>';
echo '</body>';
echo '</html>';

// Cerrar la conexión
$conn->close();
?>
