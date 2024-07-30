<?php
include_once '../conn/conect.php';

if ($testConnection == true) :
    echo 'Teste Automatizado de Conexão - OK';
else :
    echo 'Teste Automatizado de Conexão - Falhou';
endif;
