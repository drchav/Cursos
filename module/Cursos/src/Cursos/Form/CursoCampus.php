<?php
namespace Cursos\Model;

class CursoCampus
{
    public $id_curso;
    public $nome;
    public $nome_campus;
    public $mapa;

    public function exchangeArray($data)
    {
        $this->id_curso = (isset($data['id_curso'])) ? $data['id_curso'] : null;
        $this->nome = (isset($data['nome'])) ? $data['nome'] : null;
        $this->nome_campus = (isset($data['nome_campus'])) ? $data['nome_campus'] : null;
	$this->mapa = (isset($data['mapa'])) ? $data['mapa'] : null;
    }
}