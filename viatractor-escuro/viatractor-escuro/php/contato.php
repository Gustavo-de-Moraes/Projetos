<?php
declare(strict_types=1);

/**
 * Recebe o formulário de contato: valida, grava em storage/contatos.log e envia e-mail.
 * Responde JSON quando chamado via JavaScript e redireciona de volta ao site quando chamado sem JavaScript.
 */

session_start();
require __DIR__ . '/includes/data.php';

function respond(bool $ok, string $message, int $status = 200)
{
    $wantsJson = str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json');

    if ($wantsJson) {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => $ok, 'message' => $message], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $_SESSION['flash'] = ['ok' => $ok, 'message' => $message];
    header('Location: index.php#contato', true, 303);
    exit;
}

function clean(string $value, int $max): string
{
    $value = trim(strip_tags($value));
    $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $value) ?? '';
    return mb_substr($value, 0, $max);
}

function header_safe(string $value): string
{
    return trim(str_replace(["\r", "\n", '%0a', '%0d'], ' ', $value));
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: index.php', true, 303);
    exit;
}

// Campo escondido: robôs costumam preencher. Fingimos sucesso e descartamos.
if (!empty($_POST['website'])) {
    respond(true, 'Mensagem enviada. Retornamos em horário comercial.');
}

$last = (int) ($_SESSION['last_submit'] ?? 0);
if (time() - $last < 20) {
    respond(false, 'Aguarde alguns segundos antes de enviar outra mensagem.', 429);
}

$nome     = clean((string) ($_POST['nome'] ?? ''), 100);
$empresa  = clean((string) ($_POST['empresa'] ?? ''), 120);
$telefone = clean((string) ($_POST['telefone'] ?? ''), 30);
$email    = clean((string) ($_POST['email'] ?? ''), 120);
$interesse = clean((string) ($_POST['interesse'] ?? ''), 120);
$mensagem = clean((string) ($_POST['mensagem'] ?? ''), 2000);

if (mb_strlen($nome) < 2) {
    respond(false, 'Informe seu nome.', 422);
}
if (strlen(preg_replace('/\D/', '', $telefone) ?? '') < 8) {
    respond(false, 'Informe um telefone ou WhatsApp válido, com DDD.', 422);
}
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'O e-mail informado não parece válido. Corrija ou deixe em branco.', 422);
}
if (mb_strlen($mensagem) < 5) {
    respond(false, 'Escreva uma mensagem com a peça e a máquina que você procura.', 422);
}

$_SESSION['last_submit'] = time();

// 1) Guarda uma cópia, para que nenhum contato se perca se o e-mail falhar.
$logDir = __DIR__ . '/storage';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0750, true);
}
$entry = [
    'data'      => date('c'),
    'nome'      => $nome,
    'empresa'   => $empresa,
    'telefone'  => $telefone,
    'email'     => $email,
    'interesse' => $interesse,
    'mensagem'  => $mensagem,
    'ip'        => $_SERVER['REMOTE_ADDR'] ?? '',
];
@file_put_contents($logDir . '/contatos.log', json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND | LOCK_EX);

// 2) Envia o e-mail para a equipe.
$host    = preg_replace('/^www\./', '', $_SERVER['HTTP_HOST'] ?? 'viatractor.com.br') ?? 'viatractor.com.br';
$subject = '=?UTF-8?B?' . base64_encode('Novo contato pelo site: ' . ($interesse !== '' ? $interesse : 'orçamento')) . '?=';

$body  = "Novo contato recebido pelo site da Viatractor\n\n";
$body .= "Nome: {$nome}\n";
$body .= 'Empresa: ' . ($empresa !== '' ? $empresa : '-') . "\n";
$body .= "Telefone: {$telefone}\n";
$body .= 'E-mail: ' . ($email !== '' ? $email : '-') . "\n";
$body .= 'Interesse: ' . ($interesse !== '' ? $interesse : '-') . "\n\n";
$body .= "Mensagem:\n{$mensagem}\n";

$headers = [
    'From: Site Viatractor <no-reply@' . header_safe($host) . '>',
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
];
if ($email !== '') {
    $headers[] = 'Reply-To: ' . header_safe($email);
}

$sent = @mail(CONTACT_TO, $subject, $body, implode("\r\n", $headers));

if (!$sent) {
    respond(false, 'Não conseguimos enviar agora. Fale com a gente pelo WhatsApp ou ligue para ' . $site['phone'] . '.', 500);
}

respond(true, 'Mensagem enviada. Retornamos em horário comercial.');
