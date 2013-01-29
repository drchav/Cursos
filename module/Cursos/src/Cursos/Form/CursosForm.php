<?php
namespace Cursos\Form;

use Zend\Form\Form;

class CursosForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('cursos');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nome',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                 'label' => 'Nome do Curso: ',
            ),
        ));
        $this->add(array(
            'name' => 'descricao',
            'attributes' => array(
                'type'  => 'textarea',
            ),
            'options' => array(
                'label' => 'Descrição do Curso: ',
            ),
        ));
          $this->add(array(
            'name' => 'turno',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Turno: ',
            ),
        ));
            $this->add(array(
            'name' => 'vagas',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Vagas: ',
            ),
        ));
             $this->add(array(
            'name' => 'carga_horaria',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Carga Horária: ',
            ),
        ));
              $this->add(array(
            'name' => 'duracao_semestral',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Semestres: ',
            ),
        ));
                 $this->add(array(
            'name' => 'coordenador',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Coordenador: ',
            ),
        ));
                    $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'E-Mail:',
            ),
        ));
                       $this->add(array(
            'name' => 'telefone',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Telefone:',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}