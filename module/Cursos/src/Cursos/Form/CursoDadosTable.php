<?php
namespace Cursos\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;

class CursoDadosTable extends AbstractTableGateway
{
    protected $table ='cursodados';

    public function __construct(TableGateway $tableGateway)
    {
        $this->TableGateway = $tableGateway;
        $this->initialize();
    }
    
    public function getCursosDados($id)
    {
        $resultSet  = $this->TableGateway(function (TableGateway $select) use ($id){
        	$select->where(array('cursodados'=>$id));
        	$select->join('cursos', 'cursos.id_curso = cursodados.id_curso');
                
     	});
        return $resultSet;
    }
}