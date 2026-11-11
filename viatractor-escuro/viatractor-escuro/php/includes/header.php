<?php
/** @var array $site */
/** @var array $whatsapp */
$mainWa = wa_link($whatsapp[0]['number']);

$schema = [
    '@context'  => 'https://schema.org',
    '@type'     => 'Organization',
    'name'      => $site['name'],
    'url'       => $site['url'],
    'telephone' => '+55-11-5611-1867',
    'email'     => $site['email'],
    'sameAs'    => [$site['instagram']],
];
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($site['title']) ?></title>
    <meta name="description" content="<?= e($site['description']) ?>">
    <meta name="theme-color" content="#1f2327">
    <meta name="color-scheme" content="dark">
    <link rel="canonical" href="<?= e($site['url']) ?>/">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="<?= e($site['name']) ?>">
    <meta property="og:title" content="<?= e($site['title']) ?>">
    <meta property="og:description" content="<?= e($site['description']) ?>">
    <meta property="og:url" content="<?= e($site['url']) ?>/">
    <meta property="og:image" content="<?= e($site['image']) ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Barlow:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="../css/style.css">

    <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
</head>
<body>
<a class="skip-link" href="#conteudo">Ir para o conteúdo</a>
<div class="road" aria-hidden="true"></div>

<header class="site-header">
    <div class="wrap header-inner">
        <a class="wordmark" href="#topo" aria-label="Viatractor, início">
            <span class="wordmark-bar" aria-hidden="true"></span>Viatractor
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu">
            <span class="nav-toggle-label">Menu</span>
        </button>

        <nav id="menu" class="nav" aria-label="Principal">
            <ul>
                <li><a href="#empresa">Empresa</a></li>
                <li><a href="#porta-bits">Porta-bits</a></li>
                <li><a href="#pecas">Peças</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
            <a class="btn btn-cta" href="<?= e($mainWa) ?>" target="_blank" rel="noopener">Pedir orçamento</a>
        </nav>
    </div>
</header>

<main id="conteudo">
