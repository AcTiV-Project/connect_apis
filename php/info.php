<!DOCTYPE html>
<html lang="en">
<head>
      <!--CSS-->
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/responsive.css">

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
      <?php
            $pais = $_POST['pais'];

            $url = "https://restcountries.com/v3.1/name/$pais";

            $respuesta = file_get_contents($url);
            $datos = json_decode($respuesta, true);

            $info = $datos[0];
      ?>

      <div class="list">
            <h1> <?php echo "País: " . $info['name']['common']; ?> </h1>
            <h2> <?php echo "Nombre oficial: " . $info['name']['official']; ?> </h2>

            <p><?php echo "Capital: " . $info['capital'][0]; ?></p>
            <p><?php echo "Región: " . $info['region']; ?></p>
            <p><?php echo "Subregión: " . $info['subregion']; ?></p>
            <p><?php echo "Población: " . number_format($info['population']); ?></p>
            <p><?php echo "Área: " . $info['area']; ?></p>
            <p><?php echo "Bandera: <img src='" . $info['flags']['png'] . "' width='50'>"; ?></p>
            <p><?php echo "Idiomas: " . implode(", ", $info['languages']); ?></p>

            <p>
                  <?php
                        foreach ($info['currencies'] as $code => $moneda) {
                              echo "Moneda: {$moneda['name']} ({$moneda['symbol']})<br>";
                        }
                  ?>
            </p>

            <a href="../index.php">Realizar otra busqueda</a>
      </div>
</body>
</html>