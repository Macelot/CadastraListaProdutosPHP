# CadastraListaProdutosPHP
Exemplo de cadastro de celulares para testes. 
Para usar o arquivo cria_produto.php é necessário informar as credenciais de acesso ao banco de dados na linha 3:
$mysqli = new mysqli("localhost","root","usbw","test",3307);
localhost = Ip ou endereço do servior
root = usuário do banco
usbw = senha do banco
test = nome da base de dados
3307 = porta do banco, por padrão é 3306

O Arquivo cria_produto.php serve para criar uma tabela e inserir alguns dados de testes. São inseridos 55 celulares para teste. 
Depois pode ser acessado o arquivo lista_produto.php para listar os celulares e realizar buscas.
