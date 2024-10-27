<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $db = new PDO('sqlite:cadastros.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Receber os dados do formulário
        $horario_chegada = $_POST['horario_chegada'];
        $horario_saida = $_POST['horario_saida'];
        $nome = $_POST['nome'];
        $placa = $_POST['placa'];
        $vaga = $_POST['vaga'];
        $data = $_POST['data'];

        // Calcular valor total
        $horaChegada = new DateTime($horario_chegada);
        $horaSaida = new DateTime($horario_saida);
        $intervalo = $horaChegada->diff($horaSaida);
        $horasTotais = $intervalo->h + ($intervalo->i / 60);
        $valor_por_hora = 20;
        $valor_total = $horasTotais * $valor_por_hora;

        // Inserir dados na tabela "cadastro"
        $stmt = $db->prepare("INSERT INTO cadastro (horario_chegada, horario_saida, nome, placa, vaga, data, valor)
                              VALUES (:horario_chegada, :horario_saida, :nome, :placa, :vaga, :data, :valor)");

        $stmt->bindParam(':horario_chegada', $horario_chegada);
        $stmt->bindParam(':horario_saida', $horario_saida);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':placa', $placa);
        $stmt->bindParam(':vaga', $vaga);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':valor', $valor_total);

        if ($stmt->execute()) {
            $message = "Dados inseridos com sucesso! <br> Valor total: R$ " . number_format($valor_total, 2, ',', '.');
        } else {
            $message = "Erro ao inserir os dados no banco de dados.";
        }
    } catch (PDOException $e) {
        $message = "Erro ao conectar com o banco de dados: " . htmlspecialchars($e->getMessage());
    }
} else {
    $message = "Formulário não enviado!";
}

// Exibindo a mensagem
echo '<!DOCTYPE html>';
echo '<html lang="pt-BR">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Resultado da Inserção</title>';
echo '<style>';
echo 'body { font-family: Arial, Helvetica, sans-serif; background-image: linear-gradient(50deg, rgb(5, 5, 109), rgb(17, 208, 233)); color: white; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }';
echo '.box { color: white; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 15px; text-align: center; width: 300px; }';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<div class="box">';
echo "<h2>$message</h2>"; // Mostra a mensagem
echo '<a href="http://localhost/meu_projeto/cadastro-estacionamento.html"><button>Voltar</button></a>';
echo '</div>';
echo '</body>';
echo '</html>';
?>
