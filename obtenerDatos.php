<?php
include 'con.php';

$buscarTexto = $_POST['buscadorvoz'];

$query = 'SELECT * FROM postres WHERE nombre like "%' . $buscarTexto . '%" or precio like "%' . $buscarTexto . '%" or created_at like "%' . $buscarTexto . '%"';

$resultados = mysqli_query($con, $query);

$html = '';
if (mysqli_num_rows($resultados) > 0)
{
    while ($row = mysqli_fetch_array($resultados))
    {
        $id = $row['id'];
        $nombre = $row['nombre'];
        $precio = $row['precio'];
        $stock = $row['stock'];
        $archivo = $row['archivo'];
        $created_at = $row['created_at'];

        $html .= '<div id="datos' . $id . '">';
        $html .= '<p>Nombre: ' . $nombre . '</p>';
        $html .= '<p>Precio: ' . $precio . '</p>';
        $html .= '<p>Stock: ' . $stock . '</p>';
        $html .= '<p>Archivo: ' . $archivo . '</p>';
        $html .= '<p>Fecha de Creación: ' . $created_at . '</p>';
        $html .= '</div>';
    }
}
else
{
    $html .= '<div >';
    $html .= '<h2>No se encontraron registros</h2>';
    $html .= '</div><br>';
    $html .= '<h2>Para más desarrollos ingresa en <a href="https://nubecolectiva.com" target="_blank">nubecolectiva.com</a></h2>';
}

echo $html;

exit;

