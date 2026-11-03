<?php
$pagina = 'inicio';
$titulo = 'Treinador Regis — Personal Trainer em São Paulo e Capão Redondo';
$descricao = 'Personal presencial, treino em grupo, avaliação física e consultoria online com o Treinador Regis. Atendimento em São Paulo, Capão Redondo e região.';
$og_titulo = 'Treinador Regis — Personal Trainer em São Paulo';
$og_descricao = 'Disciplina é o que te leva mais longe. Treine com o Regis em São Paulo ou online.';
require __DIR__ . '/includes/header.php';

/* Painéis que abrem ao passar o mouse (efeito feito só com CSS). */
$PAINEIS = [
    [
        'imagem' => 'img/corrida-tmb.jpg',
        'chamada' => 'Calcule sua taxa metabólica basal e entenda como seu corpo gasta energia.',
        'titulo' => 'Cálculo de TMB',
        'texto' => 'Descubra quantas calorias seu corpo realmente precisa.',
        'botao' => 'Calcular agora',
        'link' => 'calculadora-tmb.php',
    ],
    [
        'imagem' => 'img/foto-regis.jpeg',
        'titulo' => 'Minha trajetória',
        'texto' => 'Disciplina, método e propósito para transformar vidas.',
        'botao' => 'Ver mais',
        'link' => 'sobre.php',
        'posicao' => '50% 20%',
    ],
];
foreach ($SERVICOS as $s) {
    $PAINEIS[] = [
        'imagem' => $s['imagem'],
        'titulo' => $s['titulo'],
        'texto' => $s['resumo'],
        'botao' => 'Ver mais',
        'link' => 'servicos.php#' . $s['id'],
    ];
}

$LOCAIS = [
    ['icone' => 'local', 'titulo' => 'Capão Redondo', 'sub' => 'Atendimento presencial'],
    ['icone' => 'predio', 'titulo' => 'São Paulo', 'sub' => 'Zona Sul e região'],
    ['icone' => 'halter', 'titulo' => 'Academias', 'sub' => 'Personal no seu treino'],
    ['icone' => 'arvores', 'titulo' => 'Ao ar livre', 'sub' => 'Parques e praças'],
    ['icone' => 'pessoas', 'titulo' => 'Turmas', 'sub' => 'Treino em grupo'],
    ['icone' => 'mundo', 'titulo' => 'Online', 'sub' => 'Consultoria de onde estiver'],
];
?>

<!-- PAINÉIS -->
<section class="hero">
  <div class="glow"></div>
  <h1 class="sr-only">Treinador Regis — personal trainer em São Paulo</h1>
  <div class="container panels">
    <?php foreach ($PAINEIS as $i => $p): ?>
      <article class="panel" tabindex="0">
        <img class="panel-img" src="<?= e($p['imagem']) ?>" alt="<?= e($p['titulo']) ?>"
             style="object-position: <?= e($p['posicao'] ?? 'center') ?>"
             <?= $i < 2 ? '' : 'loading="lazy"' ?>>
        <div class="panel-fade"></div>
        <div class="panel-bar"></div>
        <div class="panel-label"><span class="eyebrow"><?= e($p['titulo']) ?></span></div>
        <div class="panel-content">
          <p class="font-wide panel-kicker"><?= e($p['chamada'] ?? '') ?></p>
          <div class="panel-text">
            <h2 class="font-wide"><?= e($p['titulo']) ?></h2>
            <p><?= e($p['texto']) ?></p>
            <a href="<?= e($p['link']) ?>" class="eyebrow panel-cta"><?= e($p['botao']) ?> <?= icone('seta') ?></a>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<!-- MARCA -->
<div class="brand-strip">
  <span class="eyebrow">Treinador</span>
  <img src="img/logo-icon_yellow.png" alt="">
  <span class="eyebrow">Regis</span>
</div>

<?php require __DIR__ . '/includes/secoes/metodo.php'; ?>

<!-- SERVIÇOS -->
<section class="servicos-home">
  <div class="energy-lines"></div>
  <div class="fade-top"></div>
  <div class="fade-bottom"></div>
  <div class="container servicos-home-inner">
    <div class="servicos-head">
      <?= titulo_secao('Meus', 'Serviços') ?>
      <div class="servicos-tags">
        <?php foreach (['Presencial', 'Em grupo', 'Online'] as $t): ?>
          <div class="servicos-tag"><span class="line"></span><span class="eyebrow"><?= $t ?></span></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="servicos-grid">
      <?php foreach ($SERVICOS as $s): ?>
        <div class="reveal">
          <a href="<?= e(whatsapp_link('Olá, Regis! Tenho interesse em: ' . $s['titulo'] . '.')) ?>"
             target="_blank" rel="noreferrer" class="servico-card">
            <img src="<?= e($s['imagem']) ?>" alt="<?= e($s['titulo']) ?>" loading="lazy" width="832" height="1216">
            <div class="panel-fade"></div>
            <div class="servico-body">
              <span class="eyebrow text-primary"><?= e($s['tag']) ?></span>
              <h3 class="font-wide"><?= e($s['titulo']) ?></h3>
              <p><?= e($s['resumo']) ?></p>
              <span class="eyebrow pill">Quero começar <?= icone('direita') ?></span>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CALCULADORA TMB -->
<section class="container section">
  <div class="tmb-feature reveal">
    <a href="calculadora-tmb.php" class="tmb-card">
      <img src="img/corrida-tmb.jpg" alt="Homem correndo pela cidade ao pôr do sol" loading="lazy">
      <div class="panel-fade"></div>
      <img src="img/logo-icon_yellow.png" alt="" class="tmb-logo">
      <span class="circle-btn"><?= icone('seta') ?></span>
      <p class="font-wide tmb-big">TMB</p>
    </a>
    <div>
      <?= titulo_secao('Calculadora', 'TMB') ?>
      <p class="tmb-text">
        Quantas calorias seu corpo gasta só para se manter vivo? A Taxa Metabólica Basal é o
        ponto de partida de qualquer plano sério — para emagrecer, ganhar massa ou manter.
        <br><br>
        Calcule em segundos e descubra também o seu gasto diário.
      </p>
      <a href="calculadora-tmb.php" class="btn btn-hero tmb-btn">Calcular agora <?= icone('seta') ?></a>
    </div>
  </div>
</section>

<!-- ONDE ATENDO -->
<section class="regiao">
  <img src="img/foto-regis.jpeg" alt="" aria-hidden="true" loading="lazy" class="regiao-bg">
  <div class="container regiao-inner">
    <?= titulo_secao('Onde eu', 'atendo') ?>
    <p class="regiao-text">São Paulo, Capão Redondo e região — e online para quem quer treinar comigo de qualquer lugar.</p>
    <div class="tiles reveal">
      <?php foreach ($LOCAIS as $l): ?>
        <div class="tile">
          <?= icone($l['icone']) ?>
          <strong class="font-wide"><?= e($l['titulo']) ?></strong>
          <small><?= e($l['sub']) ?></small>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
require __DIR__ . '/includes/secoes/contato-cta.php';
require __DIR__ . '/includes/secoes/redes.php';
require __DIR__ . '/includes/footer.php';
