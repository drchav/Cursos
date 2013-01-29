<?php
namespace Cursos\Model;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;                 
use Zend\InputFilter\InputFilterAwareInterface;   
use Zend\InputFilter\InputFilterInterface;        

class Cursos implements InputFilterAwareInterface
{
    protected $inputFilter; 
    
    public $id;
    public $id_campus;
    public $id_nivel;
    public $nome;
//    public $carga_horaria;
    public $descricao;
//    public $area_atuacao;
//    public $duracao_semestral;
//    public $turno;
//    public $vagas;
//    public $coordenador;
//    public $email;
//    public $telefone;
//    public $publico_alvo;
//    public $perfil_profissional;
//    public $certificacao;
//    public $forma_ingresso;
//    public $local;
//    public $nome_nivel;
//    public $projeto_pedagogico;
//    public $projeto_tipo;
//    public $projeto_nome;
//    public $projeto_detalhes;
//    public $mapa_nome_arquivo;
//    public $nome_arquivo;
//    public $nome_campus;
//    public $nome_nivel;

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->id_campus = 1; //(isset($data['id_campus'])) ? $data['id_campus'] : null;
        $this->id_nivel = 1;//(isset($data['id_campus'])) ? $data['id_campus'] : null;
        $this->nome = (isset($data['nome'])) ? $data['nome'] : null;
//        $this->carga_horaria = (isset($data['carga_horaria'])) ? $data['carga_horaria'] : null;
        $this->descricao = (isset($data['descricao'])) ? $data['descricao'] : null;
//        $this->area_atuacao = (isset($data['area_atuacao'])) ? $data['area_atuacao'] : null;
//        $this->duracao_semestral = (isset($data['duracao_semestral'])) ? $data['duracao_semestral'] : null;
//        $this->turno = (isset($data['turno'])) ? $data['turno'] : null;
//        $this->vagas = (isset($data['vagas'])) ? $data['vagas'] : null;
//        $this->coordenador = (isset($data['coordenador'])) ? $data['coordenador'] : null;
//        $this->email = (isset($data['email'])) ? $data['email'] : null;
//        $this->telefone = (isset($data['telefone'])) ? $data['telefone'] : null;
//        $this->publico_alvo = (isset($data['publico_alvo'])) ? $data['publico_alvo'] : null;
//        $this->perfil_profissional = (isset($data['perfil_profissional'])) ? $data['perfil_profissional'] : null;
//        $this->certificacao = (isset($data['certificacao'])) ? $data['certificacao'] : null;
//        $this->forma_ingresso = (isset($data['forma_ingresso'])) ? $data['forma_ingresso'] : null;
//        $this->local = (isset($data['local'])) ? $data['local'] : null;
//        $this->nome_nivel = (isset($data['nome_nivel'])) ? $data['nome_nivel'] : null;
//        $this->projeto_pedagogico = (isset($data['projeto_pedagogico'])) ? $data['projeto_pedagogico'] : null;
//        $this->projeto_tipo = (isset($data['projeto_tipo'])) ? $data['projeto_tipo'] : null;
//        $this->projeto_nome = (isset($data['projeto_nome'])) ? $data['projeto_nome'] : null;
//        $this->projeto_detalhes = (isset($data['projeto_detalhes'])) ? $data['projeto_detalhes'] : null;
//        $this->mapa_nome_arquivo = (isset($data['mapa_nome_arquivo'])) ? $data['mapa_nome_arquivo'] : null;
//        $this->nome_arquivo = (isset($data['nome_arquivo'])) ? $data['nome_arquivo'] : null;
//        $this->nome_campus = (isset($data['nome_campus'])) ? $data['nome_campus'] : null;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Filtro não usado");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'nome',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 1000,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'descricao',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 1000,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'EmailAddress',
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}
