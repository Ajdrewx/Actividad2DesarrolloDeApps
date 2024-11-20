<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>Crear Usuario</title>
</head>
<body>
    <center>
        <h2>Gestión de Usuarios</h2>
        <form action="../../../Controller/UsuarioController.php" method="POST">
            <fieldset> 
                <legend>Datos del Usuario</legend>

                <table border="4">
                    <tr>
                        <th>CEDULA:</th>
                        <td><input type="number" name="cedula" id="cedula" placeholder="Digite su cédula" required></td>
                    </tr>

                    <tr>
                        <th>USERNAME:</th>
                        <td><input type="text" name="username" id="username" placeholder="Digite su nombre de usuario" required></td>
                    </tr>

                    <tr>
                        <th>CONTRASEÑA:</th>
                        <td><input type="password" name="password" id="password" placeholder="Digite su contraseña" required></td>
                    </tr>

                    <tr>
                        <th>NOMBRE:</th>
                        <td><input type="text" name="nombre" id="nombre" placeholder="Digite su nombre" required></td>
                    </tr>

                    <tr>
                        <th>APELLIDO:</th>
                        <td><input type="text" name="apellido" id="apellido" placeholder="Digite su apellido" required></td>
                    </tr>

                    <tr>
                        <th>ROL:</th>
                        <td>
                            <select name="rol" id="rol" required>
                                <option value="Selecciones">Seleccione</option>
                                <option value="estudiante">estudiante</option>
                                <option value="profesor">profesor</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>EMAIL:</th>
                        <td><input type="email" name="email" id="email" placeholder="Digite su teléfono" required></td>
                    </tr>

                    <tr>
                        <th>TELEEFONO:</th>
                        <td><input type="tel" name="telefono" id="telefono" placeholder="Digite su teléfono" required></td>
                    </tr>
                    
                    <tr style="text-align: center;">
                    <td colspan="2"> 
                        <input type="reset" value="Limpiar">
                        <input type="submit" name="accion" value="GUARDAR">
                    </td>
                    </tr>

                </table>
                   
            </fieldset>
        </form>
        <?php
$message = isset($_REQUEST["message"]) ? $_REQUEST["message"] : "";
?>

<span style="color:red"><?= $message ?> </span>

    </center>
</body>
</html>
