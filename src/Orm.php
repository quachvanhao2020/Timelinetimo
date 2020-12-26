<?php
namespace Timelinetimo;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use \Doctrine\DBAL\Logging\EchoSQLLogger;

class Orm{
    
    public static function getPaths(){
        return [
            __DIR__,
        ];
    }
    public static function getConnection(){
        return [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__.'/../data/db.sqlite',
        ];
    }
    public static function getEntityManager(){
        $config = Setup::createAnnotationMetadataConfiguration(Orm::getPaths(),true,null,null,false);
        //$config->setSQLLogger(new EchoSQLLogger());
        $entityManager = EntityManager::create(Orm::getConnection(), $config);
        return $entityManager;
    }
}