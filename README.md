Este projeto é um sistema simples de controle de estacionamento que utiliza PHP e SQLite para gerenciar informações de entradas e saídas de veículos. O sistema é executado em um ambiente de desenvolvimento local usando o XAMPP, que fornece uma plataforma fácil de configurar para rodar aplicações PHP com suporte a bancos de dados SQLite.

Estrutura do Projeto

1. **Banco de Dados SQLite:**
   - O projeto utiliza um banco de dados SQLite chamado `cadastros.db`, que armazena informações sobre os registros de veículos que entram e saem do estacionamento.
   - A tabela `cadastro` contém os seguintes campos:
     - `id`: Identificador único de cada registro.
     - `horario_chegada`: Hora em que o veículo chegou ao estacionamento.
     - `horario_saida`: Hora em que o veículo saiu do estacionamento.
     - `nome`: Nome do proprietário do veículo.
     - `placa`: Placa do veículo.
     - `vaga`: Número da vaga ocupada pelo veículo.
     - `data`: Data de registro da entrada.
     - `valor`: Valor total a ser pago pelo estacionamento.

2. **Arquivos PHP:**
   - **conectar.php**: Este arquivo é responsável por processar o formulário de cadastro de veículos. Ele recebe os dados do formulário, calcula o valor total a ser pago com base no tempo de estacionamento e insere essas informações no banco de dados. As mensagens de sucesso ou erro são exibidas na mesma página, mantendo uma boa experiência de usuário.
   - **arquivos.php**: Este arquivo consulta todos os registros armazenados no banco de dados e exibe os resultados em uma tabela HTML. A tabela é estilizada para ter um visual atraente e claro, permitindo ao usuário visualizar rapidamente as informações. Também há um botão que permite voltar ao formulário de cadastro.

3. **HTML e Estilização:**
   - As páginas HTML foram estilizadas com CSS para proporcionar uma interface amigável e visualmente agradável. As mensagens de erro e sucesso são apresentadas em um formato que facilita a leitura, enquanto as tabelas são organizadas para facilitar a visualização das informações registradas.

Ambiente de Desenvolvimento
- **XAMPP**: O projeto é desenvolvido e testado usando o XAMPP, uma distribuição popular que combina o servidor Apache, o banco de dados MySQL (neste caso, SQLite) e o interpretador PHP. Isso facilita a configuração de um ambiente de desenvolvimento local para aplicações web.

Conclusão
Esse projeto de controle de estacionamento combina PHP e SQLite para criar um sistema eficiente de gerenciamento de veículos, proporcionando uma interface amigável para inserção e visualização de dados. Com a ajuda do XAMPP, o projeto pode ser facilmente testado e executado em um ambiente local, tornando-o acessível para aprimoramentos futuros e possíveis expansões de funcionalidades.
