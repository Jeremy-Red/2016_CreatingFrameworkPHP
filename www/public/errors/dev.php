<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>

<body>
    <h1>Error</h1>
    <table>
        <tr>
            <td><b>Code:</b></td>
            <td><?= $errname ?></td>
        </tr>
        <tr>
            <td><b>Message:</b></td>
            <td><?= $errstr ?></td>
        </tr>
        <tr>
            <td><b>File:</b></td>
            <td><?= $errfile ?></td>
        </tr>
        <tr>
            <td><b>Line:</b></td>
            <td><?= $errline ?></td>
        </tr>
    </table>
</body>

</html>