<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $searchTerm = trim($_POST['buscar']);

    // Realiza una consulta SQL para buscar los datos en la base de datos
    $consulta = "SELECT * FROM datos WHERE fecha LIKE '%$searchTerm%' OR lote LIKE '%$searchTerm%'";
    $resultado = mysqli_query($conex, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Construye una tabla con los resultados de la búsqueda
        echo '<table class="resultados">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Fecha</th>';
        echo '<th>Cliente</th>';
        echo '<th>Lote</th>';
        echo '<th>Folio</th>';
        echo '<th>Hora</th>';
        echo '<th>Peso 1</th>';
        echo '<th>Peso 2</th>';
        echo '<th>Peso 3</th>';
        echo '<th>Peso 4</th>';
        echo '<th>Peso 5</th>';
        echo '<th>Peso 6</th>';
        echo '<th>Peso 7</th>';
        echo '<th>Peso 8</th>';
        echo '<th>Peso 9</th>';
        echo '<th>Peso 10</th>';
        echo '<th>Observaciones</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>{$fila['fecha']}</td>";
            echo "<td>{$fila['cliente']}</td>";
            echo "<td>{$fila['lote']}</td>";
            echo "<td>{$fila['folio']}</td>";
            echo "<td>{$fila['hora']}</td>";
            echo "<td>{$fila['peso1']}</td>";
            echo "<td>{$fila['peso2']}</td>";
            echo "<td>{$fila['peso3']}</td>";
            echo "<td>{$fila['peso4']}</td>";
            echo "<td>{$fila['peso5']}</td>";
            echo "<td>{$fila['peso6']}</td>";
            echo "<td>{$fila['peso7']}</td>";
            echo "<td>{$fila['peso8']}</td>";
            echo "<td>{$fila['peso9']}</td>";
            echo "<td>{$fila['peso10']}</td>";
            echo "<td>{$fila['observaciones']}</td>";
            echo "<td>";
            echo "<button class='edit-button' data-folio='{$fila['folio']}'>Editar</button>";
            echo "<button class='delete-button' data-folio='{$fila['folio']}'>Eliminar</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No se encontraron resultados.</p>';
    }
}

mysqli_close($conex);
?>