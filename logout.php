<?php

/**
 * Este arquivo faz o processo de LOGOUT (limpa a sessão do navegador quando é chamado).
 */

session_start();
session_destroy(); //Encerra a sessão

//Redireciona para a página inicial

header('Location: index.php');
exit;