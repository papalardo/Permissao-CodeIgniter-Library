#### Biblioteca para verificar permissão em uma página.
Library para Verificar Permissões no Code Igniter

#### Como iniciar
###### Primeiro, chame a biblioteca com o código abaixo.
```php
$this->load->library('permissoes'); 
```
---
###### Usuários recebem um número como para definir seu perfil, geralmente definido pelo `ID` na tabela `PERFIL` no Banco de Dados.
###### Esta biblioteca restrigi o acesso à uma classe ou página de acordo com este `ID`.
---
#### Configuração
###### Abra o arquivo em `libraries/Permissoes.php`   
###### A configuração é simples, definir o nome das suas `Sessions`.   
###### use `$nomeSessionLogado = 'logado'` que seria como `$_SESSION['logado']`   
###### use `$nomeSessionPerfil = 'perfil'` que seria como `$_SESSION['perfil']`   
---
#### Página de LOGIN
Este método é para verificar se o usuário ja está logado, evitando assim que caso o usuário esteja logado apresente tela de login.   
Na página de login, só se faz a verificação se o usuário já está logado.

```php
...
public function index(){   
  $this->permissoes->_verificarSeJaLogado();
  $this->load->view('login/index');   
}
```
  
------

#### Página COMUM
O que irá mudar aqui será o parâmetro no `_perfisAceitos(array())`


Exemplo
```php
function __construct(){   
      parent::__construct();   
        $this->permissoes->library('permissoes');    
        $this->auth->_perfisAceitos(array(1,2,3)); 
        # OU
        $perfisAceitos = array(1,4,6);
        $this->permissoes->_perfisAceitos($perfisAceitos);
    }
```
