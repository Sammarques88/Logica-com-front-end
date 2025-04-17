<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores de Comparação</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Comparações Interativas com PHP</h1>

        <form method="post" class="formulario">
            <label for="a">Valor A:</label>
            <input type="text" name="a" id="a" value="<?php echo isset($_POST['a']) ? $_POST['a'] : ''; ?>" required>

            <label for="b">Valor B:</label>
            <input type="text" name="b" id="b" value="<?php echo isset($_POST['b']) ? $_POST['b'] : ''; ?>" required>

            <label for="c">Valor C:</label>
            <input type="text" name="c" id="c" value="<?php echo isset($_POST['c']) ? $_POST['c'] : ''; ?>" required>

            <label for="d">Valor D:</label>
            <input type="text" name="d" id="d" value="<?php echo isset($_POST['d']) ? $_POST['d'] : ''; ?>" required>

            <label for="e">Valor E:</label>
            <input type="text" name="e" id="e" value="<?php echo isset($_POST['e']) ? $_POST['e'] : ''; ?>" required>

            <label for="f">Valor F:</label>
            <input type="text" name="f" id="f" value="<?php echo isset($_POST['f']) ? $_POST['f'] : ''; ?>" required>

            <label for="g">Valor G:</label>
            <input type="text" name="g" id="g" value="<?php echo isset($_POST['g']) ? $_POST['g'] : ''; ?>" required>

            <div class="botoes">
                <input type="submit" value="Comparar">
                <!-- Botão para resetar as variáveis dentro do PHP -->
                <input type="submit" name="reset" value="Limpar">
            </div>
        </form>

        <?php
        // Verifica se o botão "Limpar" foi pressionado
        if (isset($_POST['reset'])) {
            // Limpa as variáveis, "resetando" os valores
            unset($_POST['a']);
            unset($_POST['b']);
            unset($_POST['c']);
            unset($_POST['d']);
            unset($_POST['e']);
            unset($_POST['f']);
            unset($_POST['g']);
            // Após o reset, recarrega a página para limpar os campos visíveis
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $a = $_POST['a'] ?? '';
            $b = $_POST['b'] ?? '';
            $c = $_POST['c'] ?? '';
            $d = $_POST['d'] ?? '';
            $e = $_POST['e'] ?? '';
            $f = $_POST['f'] ?? '';
            $g = $_POST['g'] ?? '';
            $teste = false;

            echo "<h2>Comparação de igualdade</h2>";
            echo "<div class='resultado'>";
            echo ($a == $b) ? "A e B são iguais." : "A e B não são iguais.";
            echo "<br>";
            echo ($a === $b) ? "A e B são estritamente iguais." : "A e B não são estritamente iguais.";
            echo "</div>";

            echo "<h2>Comparação de diferença</h2>";
            echo "<div class='resultado'>";
            echo ($a != $b) ? "A e B são diferentes." : "A e B são iguais.";
            echo "<br>";
            echo ($a !== $b) ? "A e B são estritamente diferentes." : "A e B são estritamente iguais.";
            echo "</div>";

            echo "<h2>Negação</h2>";
            echo "<div class='resultado'>";
            echo (!$teste) ? "É verdadeira." : "É falso.";
            echo "</div>";

            echo "<h2>Maior que e Menor que</h2>";
            echo "<div class='resultado'>";
            echo ($c > $d) ? "C é maior que D." : "C não é maior que D.";
            echo "<br>";
            echo ($c < $d) ? "C é menor que D." : "C não é menor que D.";
            echo "</div>";

            echo "<h2>Maior ou igual a, menor ou igual</h2>";
            echo "<div class='resultado'>";
            echo ($e >= $f) ? "E é maior ou igual a F." : "E não é maior ou igual a F.";
            echo "<br>";
            echo ($e <= $g) ? "E é menor ou igual a G." : "E não é menor ou igual a G.";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>