<?php
namespace Cursos\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Select;

class CursosTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        //var_dump($resultSet);
        return $resultSet;
    }

    public function getCursos($id)
    {
        $select = new \Zend\Db\Sql\Select ;
        $select->from('cursos');
        $select->where(array('cursos.id'=>$id));
        $select->join('niveis', 'cursos.id_nivel = niveis.id_nivel');
        $select->join('campus', 'cursos.id_campus = campus.id_campus');
        //$select->join('imagens', 'cursos.id_nivel = imagens.id_imagem'); //Imagens precisarão de um select separado.
        //$select->join('infraestruturas', 'cursos.id = infraestruturas.id_infraestrutura');
        //echo $select->getSqlString();
        $resultSet = $this->tableGateway->selectWith($select);
        
        $row = $resultSet->current();
        if (!$row) {
            throw new \Exception("Não foi encontrado o Curso com ID = $id");
            //TODO: if $row=null then goto some frontpage wihout error.
        }
        //var_dump($resultSet);
        return $row;
    }
    
    public function saveCursos(Cursos $cursos)
    {
        $data = array(
            
            'nome' => $cursos->nome,
            'id_campus'=> $cursos->id_campus,
            'id_nivel'=> $cursos->id_nivel,
            'carga_horaria' => $cursos->carga_horaria,
            'descricao' => $cursos->descricao,
//            'area_atuacao' => $cursos->area_atuacao,
//            'duracao_semestral' => $cursos->duracao_semestral,
            'turno' => $cursos->turno,
//            'vagas' => $cursos->vagas,
//            'coordenador' => $cursos->coordenador,
//            'email' => $cursos->email,
//            'telefone' => $cursos->telefone,
//            'publico_alvo' => $cursos->publico_alvo,
//            'perfil_profissional' => $cursos->perfil_profissional,
//            'certificacao' => $cursos->certificacao,
//            'forma_ingresso' => $cursos->forma_ingresso,
//            'local' => $cursos->local,
//            'nome_nivel' => $cursos->nome_nivel,
//            'projeto_pedagogico' => $cursos->projeto_pedagogico,
//            'projeto_tipo' => $cursos->projeto_tipo,
//            'projeto_nome' => $cursos->projeto_nome,
//            'projeto_detalhes' => $cursos->projeto_detalhes,
//            'mapa_nome_arquivo' => $cursos->mapa_nome_arquivo,
//            'nome_arquivo' => $cursos->nome_arquivo,
//            'nome_campus' => $cursos->nome_campus,
        );

        $id = (int)$cursos->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getCursos($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception("Não foi encontrado o Curso com esse $id");
            }
        }
    }

    public function deleteCursos($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}
