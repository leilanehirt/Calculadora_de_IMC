<!Doctype html><!--Aluna: Leilane Catherine John Hirt,  PTI - Linguagens de Servidor - 2024-->
<html language='pt-br'>
    <head>
        <meta charset="utf-8">
        <title>Calculadora de IMC</title>
    </head>
    <body>
        <h1>Calculadora de IMC</h1>
        <form method='get'>
            <label for= "peso" style='font-size: 20px;'>Informe o Peso:</label>
            <input type="text" name="peso" id="peso" placeholder="000.00 kg" required>
            <label for="altura" style='font-size: 20px;'>Informe a altura:</label>
            <input type="text" name="altura" id="altura" placeholder="0.00 m" required>
            <input type="submit" value="Enviar">
        </form>
        <?php
            function ClassificaIMC($imc){
                $classificacao = [
                    'Magreza'               => [0, 18.50],
                    'Saudável'              => [18.51, 24.9],
                    'Sobrepeso'             => [25.0, 29.9],
                    'Obesidade Grau I'      => [30.0, 34.9],
                    'Obesidade Grau II'     => [35.0, 39.9], 
                    'Obesidade Grau III'    => [39.91, 10000000]
                ];
                foreach ($classificacao as $chave => $valor) {
                    if ( $imc >= $valor[0] and $imc <= $valor[1]) {
                        return $chave;
                    }
                }
            }
            if (isset($_GET['peso']) and isset($_GET['altura'])) {
                $peso = round($_GET['peso'], 2);
                $altura = round($_GET['altura'], 2);
                $imc = round(($peso / ($altura * $altura)), 2);
                $classificacao = ClassificaIMC($imc);
                echo '<h1>Resultado: </h1>';
                echo "<p style='font-size: 20px;'>Seu IMC é $imc e está classificado como $classificacao!</p>";
            }
        ?>
    </body>
</html>