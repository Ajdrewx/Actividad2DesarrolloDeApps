<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <center>
        <h2>Iniciar Sesión</h2>
        <form action="../../../Controller/LoginController.php" method="GET">
            <fieldset> 
                <legend>Datos de Login</legend>

                <table border="4">
                    <tr>
                        <th>USERNAME:</th>
                        <td><input type="text" name="username" id="username" placeholder="Digite su nombre de usuario" required></td>
                    </tr>

                    <tr>
                        <th>CONTRASEÑA:</th>
                        <td><input type="password" name="password" id="password" placeholder="Digite su contraseña" required></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td colspan="2"> 
                            <input type="submit" name="login" value="INICIAR SESIÓN">
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
