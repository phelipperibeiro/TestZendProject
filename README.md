1 - Clonar o projeto;

2 - Criar 2 VHost's, sendo um para o appZendProject e outro para a wsZendProject => (local.appzendproject) e (local.wszendprojec)
em caso de duvidas olhar os arquivos appZendProject\docs\README.txt e wsZendProject\docs\README.txt para ver as configurações de VHost's

3 - Criar um banco de dados com o nome consultas_sintegra (MySql), depois importar o arquivo .sql que está dentro do diretório bd/

3 - Alterar os Dados de conexao do banco de dados em wsZendProject/app/application/config/app.ini

4 - URL => http://local.appzendproject/index/consultar para consultar

5 - URL => http://local.appzendproject/index/listar para listar
