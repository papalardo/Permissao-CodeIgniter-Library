#### Sobre
Esta biblioteca ajuda a verificar o `nivel de permissão` de um usuário em determinados métodos ou em classes.   
Em seu `Banco de dados`, geralmente na tabela `usuario` existe uma coluna com nome `perfil_fk`.  
Em `perfil_fk` cabe uma `chave estrangeira` para a tabela `perfil`, onde define se ele é `ADMIN`, `MODERADOR`, `USUARIO`..   
Esse `perfil_fk` é inserido em uma `Session` assim que usuário loga, dai então define-se as permissões em cada página de acordo com esta `Session`.   

#### *Porque não facilitar sua vida ?! :`)*

---
### Iniciando..  

Coloque o arquivo `Permissoes.php` dentro da pasta `application/libraries/`   
depois..   

Chame a biblioteca com o código abaixo.
> `Nas classes`
```php
$this->load->library('permissoes'); 
```
ou
> `Autoload`  
Vá até o arquivo `config/autoload.php` e edite a seguinte linha.
```php
$autoload['libraries'] = array('permissoes');
```

#### *OBS: A vantagem do Autoload é que não precisa iniciar a library em toda classe que criar*
---

#### Configuração   
Abra o arquivo em `libraries/Permissoes.php`   
A configuração é simples, definir o nome das suas `Sessions` e o caminho do arquivo com erro `403 Não autorizado`.   
use `$nomeSessionLogado = 'logado'` que seria como `$_SESSION['logado']`   
use `$nomeSessionPerfil = 'perfil'` que seria como `$_SESSION['perfil']`   
e `$nomePaginaError403` é o caminho da página que mostrará a página de acesso não autorizado.  

---

#### Página de LOGIN
Este método é para verificar se o usuário ja está logado, evitando assim que caso o usuário esteja logado tente ir ou caia tela de login.   
Na página de login, só se faz a verificação se o usuário já está logado.
#### *Use dentro do método.. se fizer no construtor, nunca conseguirá fazer Logout*   

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
#### *Dica: Use dentro do construtor, assim evita reescrita desnecessária. A não ser que queira restringir um método especifico para um tipo de perfil*

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

#### Feito isso é so testar
# :')
