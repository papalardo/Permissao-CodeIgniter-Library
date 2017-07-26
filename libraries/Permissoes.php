<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Permissoes
    {
        var $perfis = array(); # Array de perfis aceitos.
        var $nomePaginaSeJaLogado = 'painel'; # https://www.example.com/PAINEL
        var $nomeSessionLogado = 'logado'; # $_SESSION['logado']; $_SESSION['logged'] == TRUE
        var $nomeSessionPerfil = 'perfil'; # $_SESSION['perfil']; $_SESSION['permission']
        var $nomePaginaError403 = 'errors/html/error_403.php'; 
        
    function verificarPerfis($perfis)
    {
        $this->CI =& get_instance();
        $acesso = FALSE;
        for ($i = 0; $i <= count($perfis)-1; $i++){
           if ($_SESSION['perfil'] == $perfis[$i]){ 
                $i = count($perfis);
                $acesso = TRUE;
            } 
        }
        return $acesso;  
    }
        
    function _perfisAceitos($perfis){
        $this->CI =& get_instance();
        if (isset($_SESSION[$this->nomeSessionLogado])){
            if ($this->verificarPerfis($perfis) == FALSE){
                # IF de Usuário Não autorizado.
                $this->CI->load->view($this->nomePaginaError403);
                die($this->CI->output->get_output());
            }
        } else {
                # Else de Usuário Não logado.
                $this->CI->load->view($this->nomePaginaError403);
                die($this->CI->output->get_output());
        }
    }
    
    function _verificarSeJaLogado(){ # Método usado para tela de login.      
        $this->CI =& get_instance();
        $url = $this->CI->uri->rsegment(1);
        if (isset($_SESSION[$this->nomeSessionLogado]))
        {
           redirect($this->nomePaginaSeJaLogado); 
        }
    } 
}
