<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 11/08/2017
 * Time: 13:46
 */

namespace App\Helpers\ApiPortalInstante;

use SoapClient;

/**
 * Class APISearch
 * @package App\Helpers\ApiPortalInstante
 */
class APISearch
{


    /**
     * @var SoapClient
     */
    protected $client;

    /**
     * APISearch constructor.
     */
    public function __construct()
    {
        $this->setClient();
    }


    /**
     * Set client based on url
     */
    private function setClient()
    {
        $this->client = new SoapClient('http://portalquery.just.ro/query.asmx?op=CautareDosare2&wsdl');
    }

    /**
     * Cauta dupa numar dosar
     *
     * @param $numar
     * @param null $dataStart
     * @param null $dataStop
     * @param null $dataUltimaModificareStart
     * @param null $dataUltimaModificareStop
     * @return array
     */
    public function cautaDupaNumarDosar($numar, $dataStart = NULL, $dataStop = NULL, $dataUltimaModificareStart = NULL,
                                        $dataUltimaModificareStop = NULL)
    {
        $data = [];
        $data['numarDosar'] = $numar;


        if ($dataStart)
            $data['dataStart'] = $dataStart;

        if ($dataStop)
            $data['dataStop'] = $dataStop;

        if ($dataUltimaModificareStart)
            $data['dataUltimaModificareStart'] = $dataUltimaModificareStart;

        if ($dataUltimaModificareStop)
            $data['dataUltimaModificareStop'] = $dataUltimaModificareStop;

        return $this->refactorResult($this->client->CautareDosare2($data));

    }

    /**
     *
     * Cauta dupa nume parte
     *
     * @param $numeParte
     * @param null $dataStart
     * @param null $dataStop
     * @param null $dataUltimaModificareStart
     * @param null $dataUltimaModificareStop
     * @return array
     */
    public function cautaDupaNumeParte($numeParte, $dataStart = NULL, $dataStop = NULL, $dataUltimaModificareStart = NULL,
                                       $dataUltimaModificareStop = NULL)
    {
        $data = [];
        $data['numeParte'] = $numeParte;


        if ($dataStart)
            $data['dataStart'] = $dataStart;

        if ($dataStop)
            $data['dataStop'] = $dataStop;

        if ($dataUltimaModificareStart)
            $data['dataUltimaModificareStart'] = $dataUltimaModificareStart;

        if ($dataUltimaModificareStop)
            $data['dataUltimaModificareStop'] = $dataUltimaModificareStop;

        return $this->refactorResult($this->client->CautareDosare2($data));
    }

    /**
     * Cauta dupa institutie
     *
     * @param $institutie
     * @param null $dataStart
     * @param null $dataStop
     * @param null $dataUltimaModificareStart
     * @param null $dataUltimaModificareStop
     * @return array
     */
    public function cautaDupaInstitutie($institutie, $dataStart = NULL, $dataStop = NULL, $dataUltimaModificareStart = NULL,
                                        $dataUltimaModificareStop = NULL)
    {
        $data = [];

        $data['institutie'] = $institutie;


        if ($dataStart)
            $data['dataStart'] = $dataStart;

        if ($dataStop)
            $data['dataStop'] = $dataStop;

        if ($dataUltimaModificareStart)
            $data['dataUltimaModificareStart'] = $dataUltimaModificareStart;

        if ($dataUltimaModificareStop)
            $data['dataUltimaModificareStop'] = $dataUltimaModificareStop;

        return $this->refactorResult($this->client->CautareDosare2($data));
    }

    /**
     * Extract the data from result
     *
     * @param $result
     * @return array
     */
    public function refactorResult($result)
    {
        $newResult = [];


        if (isset($result->CautareDosare2Result->Dosar))
            $newResult = $result->CautareDosare2Result->Dosar;


        if (!is_array($newResult)) {
            return [$newResult];
        }

        return $newResult;
    }
}