

Portal de Cursos
=======================

Introdução
------------
Aplicação para Portal de Cursos, baseada no ZF2 MVC skeleton application:

http://framework.zend.com/manual/2.0/en/user-guide/skeleton-application.html

Vale ressaltar que essa versão ainda não contempla os testes unitários.


Requisitos
------------

MySQL 5+

PHP 5.3+

Apache2 + ModReWrite

Acesso
------------
http://localhost/zend/public/cursos/1 (front end)

http://localhost/zend/public/cursos/list (iFrame)

http://localhost/zend/public/cursos/admin (back end)



Instalação
----------------------------

Baixe toda a aplicação e execute o cursos.sql em seu banco

Obs.: Mantenha o core do Zend2 atualizado com os comandos:

zend$ php composer.phar self-update

zend$ php composer.phar update


Virtual Host
------------
Para maior comodidade ative um virtual host para a pasta "public".

Nesse caso, não esqueça de adicionar a seguinte linha no arquivo /etc/hosts:

127.0.0.1       zend.localhost localhost
