<?php

namespace Cursos;

use Cursos\Model\Cursos;
use Cursos\Model\CursosTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Cursos\Model\CursosTable' =>  function($sm) {
                    $tableGateway = $sm->get('cursosTableGateway');
                    $table = new CursosTable($tableGateway);
                    return $table;
                },
                'cursosTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Cursos());
                    return new TableGateway('view', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}

