<?php
return array(
    'modules' => array(
        'Application',
        //'DoctrineModule', 
        //'DoctrineORMModule', 
	'Cursos',
        //'ZfcBase',
        //'ZfcUser',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
    'module_layouts' => array(
        'Application' => 'layout/application',
        'Zfcuser'     => 'layout/user',
    ),
);
