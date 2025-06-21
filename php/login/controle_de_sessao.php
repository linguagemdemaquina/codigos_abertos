<?php
// DEFINE OS PARÂMETROS DE SESSÃO
session_set_cookie_params([
    'lifetime' => 0, // SESSÃO EXPIRA QUANDO O NAVEGADOR É FECHADO
    'path' => '/', // DISPONÍVEL EM TODO O DOMÍNIO
    'secure' => true, // SÓ ENVIAR COOKIES VIA HTTPS
    'httponly' => true, // SÓ ACESSÍVEL VIA HTTP(S), NÃO VIA JAVASCRIPT
    'samesite' => 'Strict' // PREVENIR CSRF, SÓ ENVIAR COOKIES PARA O MESMO SITE
]);
session_start();
// TEMPO MÁXIMO DE INATIVIDADE
$tempo_maximo = 120; // 2 MINUTOS (120 SEGUNDOS)
if (isset($_SESSION['ultimo_acesso'])) {
    $inativo = time() - $_SESSION['ultimo_acesso'];
    if ($inativo > $tempo_maximo) {
        session_unset();
        session_destroy();
        http_response_code(440); // SESSION EXPIRADA
        header("Location: logar.php");
        exit;
    }
}
$_SESSION['ultimo_acesso'] = time();