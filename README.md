# Teste Tiago Honorio Matos Da Silva

# Banco de dados.
Banco de dados Mysql a base e test.sql exportar base, esta na raiz do projeto.
# CONEXÂO
Em controller/class/Conexao.php esta dados da conexão com banco de dados, esse 
e o padão se quiser pode mudar.<br><br>
    protected $server = "localhost";.<br>
    protected $user = "root";.<br>
    protected $senha = "" ;.<br>
    protected $bd = "test";.<br>
# Aplicação
Usar um servidor php.

# API URL
localhost/teste-api-resp/users GET OU POST <br>
localhost/teste-api-resp/users/login POST<br>
localhost/teste-api-resp/users/:iduser GET ou PUT ou DELETE<br>
localhost/teste-api-resp/users/users/:iduser/drink POST<br>
na boby add ML
<pre>
{
	"ml" : 60
}
</pre>

localhost/teste-api-resp/users/users/:iduser/history GET<br>
localhost/teste-api-resp/users/users/ranking GET<br>

# Authorization
User Url abaixo, passe email e senha. O retorno vai obiter o
 token para acesso as demais API add na header "Authorization" : "token"    
 <br> localhost/teste-api-resp/users/login POST   <br>  
    
    

