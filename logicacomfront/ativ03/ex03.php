<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Gestão de Funcionários</title>
  <style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: Arial, sans-serif;
    background: #f2f2f2;
    display: flex;
    flex-direction: column;
  }

  .header, .footer {
    background-color: darkblue;
    color: white;
    text-align: center;
    padding: 20px;
  }

  .footer {
    margin-top: auto;
  }

  .container {
    display: none;
    padding: 30px;
  }

  .login-box, .dados-box {
    width: 1000px;
    height: 500px;
    margin: 30px auto;
    padding: 100px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .dados-box {
    font-size: 30px;
  }

  input {
    width: 50%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 18px;
  }

  button {
    width: 52%;
    padding: 10px;
    background-color: darkblue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
  }

  label {
    font-size: 20px;
    margin-top: 10px;
  }

  .hidden {
    display: none;
  }
  </style>
</head>
<body>

  <div class="header">
    <h1>Gestão de Funcionários</h1>
    <p>Faça login para acessar as informações</p>
  </div>

  <div class="login-box" id="loginBox">
    <label for="matricula">Matrícula:</label>
    <input type="text" id="matricula" placeholder="Digite sua matrícula">

    <label for="senha">Senha:</label>
    <input type="password" id="senha" placeholder="Digite sua senha">

    <button onclick="fazerLogin()">Entrar</button>
  </div>

  <div class="container" id="dadosFuncionario">
    <!-- Conteúdo será injetado via JavaScript -->
  </div>

  <div class="footer">
    © 2025 Empresa XYZ - Todos os direitos reservados
  </div>

  <script>
    function fazerLogin() {
      const matricula = document.getElementById('matricula').value;
      const senha = document.getElementById('senha').value;

      const funcionarios = {
        '123': {
          senha: 'senha123',
          nome: 'Carlos Silva',
          salario: 'R$ 7.000,00',
          cpf: '123.456.789-00',
          admissao: '15/03/2020',
          funcao: 'Analista de Sistemas',
          periodo: 'Integral'
        },
        '456': {
          senha: 'senha456',
          nome: 'Ana Oliveira',
          salario: 'R$ 5.800,00',
          cpf: '987.654.321-00',
          admissao: '22/07/2021',
          funcao: 'Assistente Administrativa',
          periodo: 'Meio Período'
        }
      };

      const funcionario = funcionarios[matricula];

      if (funcionario && funcionario.senha === senha) {
        document.getElementById('loginBox').style.display = 'none';
        document.getElementById('dadosFuncionario').style.display = 'block';

        document.getElementById('dadosFuncionario').innerHTML = `
          <div class="header">
            <h2>Gestão de Funcionários</h2>
            <p>Detalhes do Funcionário</p>
          </div>
          <div class="dados-box">
            <p><strong>Nome:</strong> ${funcionario.nome}</p>
            <p><strong>Salário:</strong> ${funcionario.salario}</p>
            <p><strong>CPF:</strong> ${funcionario.cpf}</p>
            <p><strong>Data de Admissão:</strong> ${funcionario.admissao}</p>
            <p><strong>Função:</strong> ${funcionario.funcao}</p>
            <p><strong>Período:</strong> ${funcionario.periodo}</p>
            <button onclick="voltarLogin()">Voltar</button>
          </div>
        `;
      } else {
        alert('Matrícula ou senha incorreta!');
      }
    }

    function voltarLogin() {
      document.getElementById('dadosFuncionario').style.display = 'none';
      document.getElementById('loginBox').style.display = 'flex';
      document.getElementById('matricula').value = '';
      document.getElementById('senha').value = '';
    }
  </script>

</body>
</html>