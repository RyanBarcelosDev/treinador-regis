<?php
/**
 * Topo de todas as páginas.
 * Antes de incluir, a página define: $pagina, $titulo, $descricao, $og_titulo, $og_descricao, $og_tipo.
 */
require_once __DIR__ . '/config.php';

$pagina = $pagina ?? 'inicio';
$og_tipo = $og_tipo ?? 'website';

$menu = [
    'sobre' => ['href' => 'sobre.php', 'label' => 'Trajetória'],
    'servicos' => ['href' => 'servicos.php', 'label' => 'Serviços'],
    'calculadora' => ['href' => 'calculadora-tmb.php', 'label' => 'Calculadora TMB', 'destaque' => true],
    'contato' => ['href' => 'contato.php', 'label' => 'Contato'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($titulo) ?></title>
  <meta name="description" content="<?= e($descricao) ?>">
  <meta name="author" content="Treinador Regis">
  <meta property="og:title" content="<?= e($og_titulo ?? $titulo) ?>">
  <meta property="og:description" content="<?= e($og_descricao ?? $descricao) ?>">
  <meta property="og:type" content="<?= e($og_tipo) ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="theme-color" content="#0b0a08">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:ital,wdth,wght@0,62..125,100..900;1,62..125,100..900&family=Barlow:wght@400;500;600;700&display=swap">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Menu do celular: abre e fecha só com CSS (caixa de seleção escondida) -->
<input type="checkbox" id="menu-toggle" class="sr-only" aria-label="Abrir menu">

<header class="site-header">
  <div class="container header-inner">
    <a href="index.php" class="logo" aria-label="Treinador Regis — início">
      <img src="img/logo-word_yellow.png" alt="Treinador Regis">
    </a>

    <nav class="nav-desktop">
      <?php foreach ($menu as $chave => $item): ?>
        <a href="<?= $item['href'] ?>"
           class="eyebrow nav-link<?= !empty($item['destaque']) ? ' destaque' : '' ?><?= $pagina === $chave ? ' ativo' : '' ?>">
          <?= e($item['label']) ?>
        </a>
      <?php endforeach; ?>
      <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noreferrer" class="btn btn-bracket btn-sm">Agendar aula</a>
    </nav>

    <label for="menu-toggle" class="menu-btn" aria-label="Abrir menu"><?= icone('menu') ?></label>
  </div>
</header>

<label for="menu-toggle" class="menu-overlay" aria-hidden="true"></label>
<aside class="mobile-menu">
  <label for="menu-toggle" class="menu-close" aria-label="Fechar menu"><?= icone('fechar') ?></label>
  <nav>
    <a href="index.php" class="eyebrow">Início</a>
    <?php foreach ($menu as $item): ?>
      <a href="<?= $item['href'] ?>" class="eyebrow"><?= e($item['label']) ?></a>
    <?php endforeach; ?>
    <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noreferrer" class="btn btn-hero">Agendar aula</a>
  </nav>
</aside>

<main>
