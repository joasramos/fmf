<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Usando banco LOCAL
$active_group = 'localhost';
//$active_group = 'treino.externo';

$active_record = TRUE;

// configurações banco LOCAL
$db['localhost']['hostname'] = 'localhost';
$db['localhost']['username'] = 'root';
$db['localhost']['password'] = '';
$db['localhost']['database'] = 'fmf2';
$db['localhost']['dbdriver'] = 'mysqli';
$db['localhost']['dbprefix'] = '';
$db['localhost']['pconnect'] = TRUE;    
$db['localhost']['db_debug'] = FALSE;
$db['localhost']['cache_on'] = FALSE;
$db['localhost']['cachedir'] = '';
$db['localhost']['char_set'] = 'utf8';
$db['localhost']['dbcollat'] = 'utf8_general_ci';
$db['localhost']['swap_pre'] = '';
$db['localhost']['autoinit'] = TRUE;
$db['localhost']['stricton'] = FALSE;

// configurações banco para acesso externo
//$db['treino.externo']['hostname'] = 'cpmy0014.servidorwebfacil.com';
//$db['treino.externo']['username'] = 'starcolc_fmf';
//$db['treino.externo']['password'] = '1q2w3e';
//$db['treino.externo']['database'] = 'starcolc_fmf';
//$db['treino.externo']['dbdriver'] = 'mysqli';
//$db['treino.externo']['dbprefix'] = '';
//$db['treino.externo']['pconnect'] = TRUE;
//$db['treino.externo']['db_debug'] = FALSE;
//$db['treino.externo']['cache_on'] = FALSE;
//$db['treino.externo']['cachedir'] = '';
//$db['treino.externo']['char_set'] = 'utf8';
//$db['treino.externo']['dbcollat'] = 'utf8_general_ci';
//$db['treino.externo']['swap_pre'] = '';
//$db['treino.externo']['autoinit'] = TRUE;
//$db['treino.externo']['stricton'] = FALSE;

//configurações banco no NCA para acesso externo UOL HOST
$db['treino.externo']['hostname'] = 'dbmy0060.whservidor.com';
$db['treino.externo']['username'] = 'fmfma_1';
$db['treino.externo']['password'] = '1q2w3e';
$db['treino.externo']['database'] = 'fmfma_1';
$db['treino.externo']['dbdriver'] = 'mysqli';
$db['treino.externo']['dbprefix'] = '';
$db['treino.externo']['pconnect'] = TRUE;
$db['treino.externo']['db_debug'] = FALSE;
$db['treino.externo']['cache_on'] = FALSE;
$db['treino.externo']['cachedir'] = '';
$db['treino.externo']['char_set'] = 'utf8'; 
$db['treino.externo']['dbcollat'] = 'utf8_general_ci'; 
$db['treino.externo']['swap_pre'] = '';
$db['treino.externo']['autoinit'] = TRUE;
$db['treino.externo']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */
