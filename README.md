# Teste Tiago Honorio Matos Da Silva

# Banco de dados.
Banco de dados Mysql a base e test.sql exportar base, na raiz do projeto.
#CONEXÂO
Em controller/class/Conexao.php esta dados da conexão com banco de dados, esse 
e o padão se quiser pode mudar.<br><br>
    protected $server = "localhost";.<br>
    protected $user = "root";.<br>
    protected $senha = "" ;.<br>
    protected $bd = "test";.<br>
#Aplicação
Usar um servidor php.

#API URL
localhost/newProject/users GET OU POST
localhost/newProject/users/login POST
localhost/newProject/users/:iduser GET ou PUT ou DELETE
localhost/newProject/users/users/:iduser/drink POST

#Authorization
User Url abaixo, passe email e senha. O retorno vai obiter o
 token para acesso as demais API add na header "Authorization" : "token"    
localhost/newProject/users/login POST    
    
    

