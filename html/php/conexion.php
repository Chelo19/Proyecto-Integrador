<?php
            $sql = 'SELECT * FROM Ordenes'
            $resultado = mysqli_query($conn, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo 'ID: ' . $fila['ID'] . ', Producto: ' . $fila['Producto'] . 'Cantidad: ' . $fila['Cantidad'] . '<br>';
            }

            mysqli_free_result($resultado);

            // Cerrar la conexión
            mysqli_close($conn);
        ?>