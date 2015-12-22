<?php

class SintegraServiceController extends Zend_Controller_Action
{

    public $client;

    public function init()
    {
        /* carregando spider sintegra */
        $this->client = new MyClass_SintegraSpider(new Zend_Http_Client());
    }

    public function indexAction()
    {
        $result['erro'] = 'Sua requisição não pode ser processada';
        $this->jsonEncode($result);
    }

    public function buscarAction()
    {
        $values = $this->getRequest()->getParams();

        if (empty($values) or ! isset($values['cnpj']) or ! isset($values['login']) or ! isset($values['pass'])) {
            $result['erro'] = 'Sua requisição não pode ser processada';
            $this->jsonEncode($result);
        }

        if (!$this->validar_cnpj($values['cnpj'])) {
            $result['erro'] = 'Numero de CNPJ Inválido';
            $this->jsonEncode($result);
        }

        if (!$this->auth($values)) {
            $result['erro'] = 'Usuário ou Senha Inválidos';
            $this->jsonEncode($result);
        } else {

            $this->client->consultaSituacao($this->getRequest()->getParam('cnpj'));

            $consultasSintegra = new Application_Model_DbTable_ConsultasSintegra();
            $consultasSintegra->insert($this->client->campos);

            $this->jsonEncode($this->client->campos);
            exit;
        }
    }

    public function listarAction()
    {
        $values = $this->getRequest()->getParams();

        if (empty($values) or ! isset($values['login']) or ! isset($values['pass'])) {
            $result['erro'] = 'Sua requisição não pode ser processada';
            $this->jsonEncode($result);
        }

        if (!$this->auth($values)) {
            $result['erro'] = 'Usuário ou Senha Inválidos';
            $this->jsonEncode($result);
        } else {
            $consultasSintegra = new Application_Model_DbTable_ConsultasSintegra();
            $this->jsonEncode($consultasSintegra->fetchAll()->toArray());
        }
    }

    private function auth($dados)
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $adapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $adapter->setTableName('User')
                ->setIdentityColumn('login')
                ->setCredentialColumn('pass')
                ->setIdentity($dados['login'])
                ->setCredential($dados['pass']);

        $auth = Zend_Auth::getInstance();
        $authenticate = $auth->authenticate($adapter);

        return $authenticate->isValid();
    }

    private function jsonEncode(array $data = array())
    {
        if (empty($data)) {
            throw new Exception('Deve ser passado um array com elementos no primeiro parâmetro!', true);
            return false;
        }
        header('Content-type: application/json; charset=UTF-8');
        echo json_encode($data);
        exit;
    }

    private function validar_cnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

}
