1 - Clonar o projeto;

2 - Criar 2 VHost's, sendo um para o appZendProject e outro para a wsZendProject => (local.appzendproject) e (local.wszendprojec)
em caso de duvidas olhar o arquivo appZendProject\docs\README.txt e wsZendProject\docs\README.txt para ver configuração de VHost's

3 - Criar um banco de dados com o nome consultas_sintegra (MySql) e importe o arquivo que está dentro do diretorio bd/

3 - Alterar os Dados de conexao do banco de dados em wsZendProject/app/application/config/app.ini

4 - URL => http://local.appzendproject/index/consultar para consultar

5 - URL => http://local.appzendproject/index/listar para listar
