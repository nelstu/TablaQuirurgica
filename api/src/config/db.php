<?php
class db{
    private $dbHost='192.168.1.15';
    private $dbUser='rebsolll';
    private $dbPass='iopa2019';
    private $dbName='IOPA';

    //coneccion
    public function conecDB(){
        $mysqlConnect="mysql:host=$this->dbHost;dbname=$this->dbName";
        $dbConneccion=new PDO($mysqlConnect,$this->dbUser,$this->dbPass);
        $dbConneccion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $dbConneccion;
    }


}