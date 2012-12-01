<?php

namespace Cursos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CursosController extends AbstractActionController
{
    protected $CursosTable;

    public function indexAction()
    {
	return new ViewModel(array(
		'cursosData' => $this->getCursosData()->fetchAll(),
	));
    }

    public function adminAction()
    {
        return new ViewModel(array(
            'cursosList' => $this->getCursosTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
    public function getCursosTable()
    {
        if (!$this->cursosTable) {
            $sm = $this->getServiceLocator();
            $this->cursosTable = $sm->get('Cursos\Model\CursosTable');
        }
        return $this->cursosTable;
    }
    public function getCursosData()
    {
	if (!$this->cursosTable) {
            $sm = $this->getServiceLocator();
            $this->cursosTable = $sm->get('Cursos\Model\CursosTable');
        }
        return $this->cursosTable;
    }
}
