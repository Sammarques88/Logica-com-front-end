<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interatividade com Classes e Objetos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Interatividade com Classes e Objetos</h1>
    <form id="formulario" method="POST">
        <fieldset>
            <legend><strong>Insira os dados do Carro</strong></legend>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
            <br>
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>
            <br>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" required>
            <br>
        </fieldset>
        <fieldset>
            <legend><strong>Insira os dados da Pessoa</strong></legend>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
            <br>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" readonly>
            <br>
        </fieldset>
        <fieldset>
            <legend><strong>Insira os dados do Funcionário</strong></legend>
            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" required>
            <br>
            <label for="salario">Salário:</label>
            <input type="number" id="salario" name="salario" required>
            <br>
        </fieldset>
        <button type="submit">Exibir Informações</button>
        <button type="button" id="botao-limpar">Limpar Tudo</button>
    </form>

    <h2>Resultado:</h2>
    <div id="resultado">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            class Carro {
                public $marca;
                public $modelo;
                public $ano;
                public function exibirDetalhes() {
                    echo "Marca: $this->marca <br>";
                    echo "Modelo: $this->modelo <br>";
                    echo "Ano: $this->ano <br>";
                }
            }

            class Pessoa {
                public $nome;
                public $idade;
                public function saudacao() {
                    echo "Olá, meu nome é $this->nome e tenho $this->idade anos!<br>";
                }
            }

            class Funcionario extends Pessoa {
                public $cargo;
                public $salario;
                public function exibirDados() {
                    echo "Nome: $this->nome <br>";
                    echo "Idade: $this->idade <br>";
                    echo "Cargo: $this->cargo <br>";
                    echo "Salário: $this->salario <br>";
                }
            }

            // Cálculo da idade com base na data de nascimento
            function calcularIdade($dataNascimento) {
                $dataAtual = new DateTime();
                $nascimento = new DateTime($dataNascimento);
                $idade = $dataAtual->diff($nascimento)->y;
                return $idade;
            }

            $idadeCalculada = calcularIdade($_POST["data_nascimento"]);

            $carro = new Carro();
            $carro->marca = $_POST["marca"];
            $carro->modelo = $_POST["modelo"];
            $carro->ano = $_POST["ano"];
            $carro->exibirDetalhes();

            echo "<br>";

            $pessoa = new Pessoa();
            $pessoa->nome = $_POST["nome"];
            $pessoa->idade = $idadeCalculada;
            $pessoa->saudacao();

            echo "<br>";

            $funcionario = new Funcionario();
            $funcionario->nome = $_POST["nome"];
            $funcionario->idade = $idadeCalculada;
            $funcionario->cargo = $_POST["cargo"];
            $funcionario->salario = $_POST["salario"];
            $funcionario->exibirDados();
        }
        ?>
    </div>

    <script>
        const dataNascimento = document.getElementById("data_nascimento");
        const idadeInput = document.getElementById("idade");

        dataNascimento.addEventListener("change", () => {
            const data = new Date(dataNascimento.value);
            const hoje = new Date();
            let idade = hoje.getFullYear() - data.getFullYear();
            const mes = hoje.getMonth() - data.getMonth();
            if (mes < 0 || (mes === 0 && hoje.getDate() < data.getDate())) {
                idade--;
            }
            idadeInput.value = idade;
        });

        const botaoLimpar = document.getElementById("botao-limpar");
        botaoLimpar.addEventListener("click", () => {
            document.getElementById("formulario").reset();
            document.getElementById("resultado").innerHTML = "";
        });
    </script>
</body>
</html>