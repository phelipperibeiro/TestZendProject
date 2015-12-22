<?php

class MyClass_SintegraSpider
{
    private $client;
    public  $campos = array();

    public function __construct($Zend_Http_Client)
    {
        $this->client = $Zend_Http_Client;
        $this->client->setUri("http://www.sintegra.es.gov.br/resultado.php");
        $this->client->setConfig(array(
            'maxredirects' => 0,
            'timeout' => 30));
    }

    public function consultaSituacao($num_cnpj = null, $num_ie = null)
    {
        try {
            if (trim($num_cnpj) == '' and trim($num_ie) == '') {
                throw new Exception('Cnpj ou Numero Inscrição Estadual não enviado!');
            }
            return $this->parseHtml($this->buscaDadosSintegra($num_cnpj, $num_ie));
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function buscaDadosSintegra($num_cnpj, $num_ie)
    {

        try {
            $this->client->setParameterPost(array(
                'num_cnpj' => $num_cnpj,
                'num_ie' => $num_ie,
                'botao' => 'Consultar'
            ));

            $this->client->setMethod(Zend_Http_Client::POST);
            $response = $this->client->request();

            if ($response->isError()) {
                throw new Exception("Erro na requisicao HTTP" . $response->getStatus());
            }

            return $response->getBody();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function parseHtml($data)
    {
        $patterns = array(
            'cnpj' => "@<td.*?>&nbsp;CNPJ:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'inscricao_estadual' => "@<td.*?>Inscri.{1,16}o\s*Estadual:<\/td>\s*<td.*?>&nbsp;(.*?)<\/td>@",
            'razao_social' => "@<td.*?>&nbsp;Raz.{1,8}o Social\s*:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'logradouro' => "@<td.*?>&nbsp;Logradouro:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'numero' => "@<td.*?>&nbsp;N.{1,8}mero:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'complemento' => "@<td.*?>&nbsp;Complemento:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'bairro' => "@<td.*?>&nbsp;Bairro:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'municipio' => "@<td.*?>&nbsp;Munic.{1,8}pio:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'cep' => "@<td.*?>&nbsp;CEP:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'uf' => "@<td.*?>&nbsp;UF:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'telefone' => "@<td.*?>&nbsp;Telefone:</td>\s*<td.*?>&nbsp;(.*?)</td>@",
            'atividade' => "@<td.*?>Atividade\s*Econ.{1,8}mica:&nbsp;</td>\s*<td.*?>(.*?)</td>@",
            'data_inicio' => "@<td.*?>Data\s*de\s*Inicio\s*de\s*Atividade:&nbsp;</td>\s*<td.*?>(.*?)</td>@",
            'status' => "@<td.*?>Situa.{1,16}o\s*Cadastral\s*Vigente:&nbsp;</td>\s*<td.*?>(.*?)</td>@",
            'data_status' => "@<td.*?>Data\s*desta\s*Situa.{1,16}o Cadastral:&nbsp;</td>\s*<td.*?>(.*?)</td>@",
            'regime' => "@<td.*?>Regime\s*de\s*Apura&ccedil;&atilde;o:&nbsp;</td>\s*<td.*?>(.*?)</td>@"
        );


        foreach ($patterns as $campo => $p) {
            preg_match($p, $data, $matches);

            if (count($matches) == 0) {
                throw new Exception("Não foi possível recuperar '$campo'");
            }

            $this->campos[$campo] = $matches[1];
        }
    }

}
