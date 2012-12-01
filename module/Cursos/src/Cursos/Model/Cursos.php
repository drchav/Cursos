<?php
namespace Cursos\Model;

class Cursos
{
    public $id;
    public $coordenadorcurso;
    public $emailcurso;
    public $telefonecurso;
    public $nome;

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->coordenadorcurso = (isset($data['coordenadorcurso'])) ? $data['coordenadorcurso'] : null;
        $this->emailcurso = (isset($data['emailcurso'])) ? $data['emailcurso'] : null;
	$this->telefonecurso = (isset($data['telefonecurso'])) ? $data['telefonecurso'] : null;
        $this->nome = (isset($data['nome'])) ? $data['nome'] : null;
    }
}
