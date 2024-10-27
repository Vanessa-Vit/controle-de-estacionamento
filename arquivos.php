<?php
// Conexão com o banco de dados SQLite
try {
    $pdo = new PDO('sqlite:cadastros.db'); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta para selecionar todos os registros da tabela 'cadastro'
    $query = 'SELECT * FROM cadastro'; 
    $stmt = $pdo->query($query);

    // Exibindo os registros em uma tabela HTML
    echo '<!DOCTYPE html>';
    echo '<html lang="pt-BR">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Registros do Estacionamento</title>';
    echo '<style>';
    echo 'body { font-family: Arial, Helvetica, sans-serif; background-image: linear-gradient(50deg, rgb(5, 5, 109), rgb(17, 208, 233)); color: white; display: flex; align-items: center; justify-content: center; flex-direction: column; height: 100vh; margin: 0; }';
    echo '.box { background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 15px; text-align: center; width: 90%; max-width: 800px; }';
    echo 'table { width: 100%; border-collapse: collapse; margin-top: 20px; }';
    echo 'th, td { padding: 8px; text-align: center; border: 1px solid dodgerblue; color: white; }';
    echo 'th { background-color: dodgerblue; color: white; }';
    echo 'h1 { color: dodgerblue; }';
    echo 'button { background-color: rgb(52, 165, 240); border: none; padding: 8px 15px; border-radius: 10px; color: white; font-size: 15px; margin-top: 10px; cursor: pointer; }';
    echo 'button:hover { background-color: rgb(5, 5, 109); }';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    echo '<div class="box">';
    echo '<h1>Registros do Estacionamento</h1>';

    // Verificar e exibir mensagens
    if (isset($_GET['message'])) {
        echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
    }

    // Usar fetchAll() para pegar todos os registros e verificar se a consulta retornou dados
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($rows)) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Horário de Chegada</th><th>Horário de Saída</th><th>Nome</th><th>Placa</th><th>Vaga</th><th>Data</th><th>Valor Total</th></tr>';
        
        // Exibindo cada registro em uma linha da tabela
        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['horario_chegada']) . '</td>';
            echo '<td>' . htmlspecialchars($row['horario_saida']) . '</td>';
            echo '<td>' . htmlspecialchars($row['nome']) . '</td>';
            echo '<td>' . htmlspecialchars($row['placa']) . '</td>';
            echo '<td>' . htmlspecialchars($row['vaga']) . '</td>';
            echo '<td>' . htmlspecialchars($row['data']) . '</td>';
            echo '<td>' . htmlspecialchars($row['valor']) . '</td>';
            echo '</tr>'; // Fechando a linha da tabela
        }
        
        echo '</table>';
    } else {
        echo '<p>Não há registros encontrados.</p>';
    }

    echo '<br><a href="http://localhost/meu_projeto/cadastro-estacionamento.html"><button>Voltar ao Cadastro</button></a>'; // Botão Voltar
    echo '</div>';
    echo '</body>';
    echo '</html>';

} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . htmlspecialchars($e->getMessage());
}
?>
