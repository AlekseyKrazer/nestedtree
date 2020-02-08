<?php

namespace core;

use Doctrine\Common\EventManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Gedmo\Tree\TreeListener;

/**
 * Class DBConnect
 * @package core
 */
class DBConnect
{
    /**
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    public static function getConnection()
    {
        $db = require "config/config.php";

        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;


        //добавляем настройки расширения Nested Tree
        $evm = new EventManager();
        $treeListener = new TreeListener();
        $evm->addEventSubscriber($treeListener);

        $config = Setup::createAnnotationMetadataConfiguration(array("models/ORM"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);


        $connection = array(
            "dbname" => $db['dbname'],
            "user" => $db['user'],
            "password" => $db['password'],
            "host" => $db['host'],
            "driver" => $db['driver']
        );

        $entityManager = EntityManager::create($connection, $config, $evm);

        return $entityManager;
    }
}