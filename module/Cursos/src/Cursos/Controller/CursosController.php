<?php

namespace Cursos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cursos\Model\Cursos;          
use Cursos\Form\CursosForm;

class CursosController extends AbstractActionController
//        implements \Zend\Db\Adapter\AdapterAwareInterface 
{
//    protected $CursosTable = 'cursos';
//
//    public function setDbAdapter(Adapter $adapter)
//    {
//        $this->adapter = $adapter;
//        $this->resultSetPrototype = new HydratingResultSet();
//        
//        $this->resultSetPrototype->setObjectPrototype(new Sample());
//        $this->initialize();
//    }
    
    public function indexAction()
    {
	$id = (int)$this->params('id');
        //TODO if $id=null then goto some front page wihout error.
        return new ViewModel(array(
            'cursosData' => $this->getCursosTable()->getCursos($id),
	));
    }

    public function listAction()
    {
        $viewModel = new ViewModel(array(
            'cursosCampus' => $this->getCursosList()->fetchAll(),
            'cursosNiveis' => $this->getCursosNiveis()->fetchAll(),
            'cursosList' => $this->getCursosTable()->fetchAll(),
        ));
        $viewModel->setTerminal(true);// Turn off the layout, i.e. only render the view script.
        return $viewModel;        
    }
    
    public function adminAction()
    {
        return new ViewModel(array(
            'cursosGrid' => $this->getCursosTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new CursosForm();
        $form->get('submit')->setValue('Adicionar');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $cursos = new Cursos();
            $form->setInputFilter($cursos->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $cursos->exchangeArray($form->getData());
                $this->getCursosTable()->saveCursos($cursos);

                return $this->redirect()->toRoute('cursos');
            }
        }
        return array('form' => $form);
    }


    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('cursos', array(
                'action' => 'add'
            ));
        }
        $cursos = $this->getCursosTable()->getCursos($id);

        $form  = new CursosForm();
        $form->bind($cursos);
        $form->get('submit')->setAttribute('value', 'Salvar');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($cursos->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getCursosTable()->saveCursos($form->getData());

                return $this->redirect()->toRoute('cursos');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('cursos');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getCursosTable()->deleteCursos($id);
            }

            return $this->redirect()->toRoute('cursos');
        }

        return array(
            'id'    => $id,
            'cursos' => $this->getCursosTable()->getCursos($id)
        );
    }
    
    public function getCursosTable()
    {
        if (!$this->cursosTable) {
            $sm = $this->getServiceLocator();
            $this->cursosTable = $sm->get('Cursos\Model\CursosTable');
        }
        return $this->cursosTable;
    }
    
    public function getCursosList()
    {
        if (!$this->cursosTable) {
            $sm = $this->getServiceLocator();
            $this->cursosTable = $sm->get('Cursos\Model\CursosCampus');
        }
        return $this->cursosTable;
    }
    
    public function getCursosNiveis()
    {
        if (!$this->cursosTable) {
            $sm = $this->getServiceLocator();
            $this->cursosTable = $sm->get('Cursos\Model\CursosNiveis');
        }
        return $this->cursosTable;
    }
}
