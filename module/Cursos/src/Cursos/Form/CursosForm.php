<?php

namespace Cursos\Form;

use Zend\Form\Form;
//use Doctrine\ORM\EntityManager;

class CursosForm extends Form {

    public function __construct($name = null/*, EntityManager $em = null*/) {
        // we want to ignore the name passed
        parent::__construct('cursos');
        $this->setAttribute('method', 'post');
        
        
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nome',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Nome do Curso: ',
            ),
        ));
        $this->add(array(
            'name' => 'carga_horaria',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Carga Horária: ',
            ),
        ));
        $this->add(array(
            'name' => 'descricao',
            'attributes' => array(
                'type' => 'textarea',
            ),
            'options' => array(
                'label' => 'Descrição do Curso: ',
            ),
        ));
        $this->add(array(
            'name' => 'area_atuacao',
            'attributes' => array(
                'type' => 'textarea',
            ),
            'options' => array(
                'label' => 'Área de atuação: ',
            ),
        ));
        $this->add(array(
            'name' => 'duracao_semestral',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Semestres: ',
            ),
        ));
        $this->add(array(
            'name' => 'turno',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Turno: ',
            ),
        ));
        $this->add(array(
            'name' => 'vagas',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Vagas: ',
            ),
        ));
        
        
        $this->add(array(
            'name' => 'coordenador',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Coordenador: ',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'E-Mail: ',
            ),
        ));
        $this->add(array(
            'name' => 'telefone',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Telefone: ',
            ),
        ));
        $this->add(array(
            'name' => 'publico_alvo',
            'attributes' => array(
                'type' => 'textarea',
            ),
            'options' => array(
                'label' => 'Público Alvo: ',
            ),
        ));
        $this->add(array(
            'name' => 'perfil_profissional',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Perfil Profissional: ',
            ),
        ));
        $this->add(array(
            'name' => 'certificacao',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Certificação: ',
            ),
        ));
        $this->add(array(
            'name' => 'forma_ingresso',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Forma de Ingresso: ',
            ),
        ));
        $this->add(array(
            'name' => 'local',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Local: ',
            ),
        ));
        $this->add(array(
            'name' => 'nome_nivel',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Nível: ',
            ),
        ));
        $this->add(array(
            'name' => 'projeto_pedagogico',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Projeto Pedagógico: ',
            ),
        ));
        $this->add(array(
            'name' => 'projeto_tipo',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Tipo de Projeto: ',
            ),
        ));
        $this->add(array(
            'name' => 'projeto_nome',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Nome do Projeto: ',
            ),
        ));
        $this->add(array(
            'name' => 'projeto_detalhes',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Detalhes de Projeto: ',
            ),
        ));
        $this->add(array(
            'name' => 'mapa_nome_arquivo',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'mapa nome arquivo: ',
            ),
        ));
        $this->add(array(
            'name' => 'nome_arquivo',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'nome arquivo: ',
            ),
        ));
        $this->add(array(
            'name' => 'nome_campus',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'nome campus: ',
            ),
        ));
        $this->add(array(
            'name' => 'nome_nivel',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'nome nivel: ',
            ),
        ));
         $this->add(array(
            'name' => 'nome_nivel',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'nome nivel: '
                
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }

}