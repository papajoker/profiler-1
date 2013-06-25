<?php

return array(
    
	// Set this option to false if you are already including jquery in your application to avoid conflicts.
    'jquery' => FALSE,
    
	// Set to true to enable profiling, false to disable
    'profiler' => TRUE,
    
        // order - desable button
    'btns' => array(
            'environment'=> array('label'=>''),
            'memory'=>      array('label'=>''),
            'controller'=>  array('label'=>'CTRL'),
            'routes'=>      array('label'=>'ROUTES'),
            'log'=>         array('label'=>'LOG'),
            'sql'=>         array('label'=>'SQL'),
            'checkpoints'=> array('label'=>'TIME'),
            'file'=>        array('label'=>'FILES'),
            'view'=>        array('label'=>'VIEW'),
            'session'=>     array('label'=>'SESSION'),
            //'config'=>     array('label'=>'CONFIG'),
            'auth'=>        array('label'=>'AUTH'),
            'auth-sentry'=> array('label'=>'AUTH')
        ),
    'doc' => 'http://www.laravel.fr/docs/'
);
