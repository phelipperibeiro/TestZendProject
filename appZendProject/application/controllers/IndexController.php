<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
    
     public function indexAction()
    {
        // action body
    }

    public function listarAction()
    {
        echo "<pre>";
        print_r(file_get_contents('http://local.wszendproject/sintegraService/listar/login/admin/pass/s1nt3gr4'));exit;
    }
    
    public function consultarAction()
    {
        echo "<pre>";
        print_r(file_get_contents('http://local.wszendproject/sintegraService/buscar/cnpj/31.804.115-0002-43/login/admin/pass/s1nt3gr4'));exit;
    }


}

