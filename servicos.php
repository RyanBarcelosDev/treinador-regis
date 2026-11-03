<?php
$pagina = 'servicos';
$titulo = 'Serviços — Personal, Grupo, Avaliação e Online | Treinador Regis';
$descricao = 'Personal presencial, treino em grupo, avaliação física e consultoria online em São Paulo, Capão Redondo e região.';
$og_titulo = 'Serviços — Treinador Regis';
$og_descricao = 'Escolha como quer treinar: presencial, em grupo, avaliação física ou online.';
require __DIR__ . '/includes/header.php';

$intro_fino = 'Meus';
$intro_negrito = 'Serviços';
$intro_texto = 'Quatro formas de treinar comigo. Todas com o mesmo compromisso: plano sob medida e acompanhamento de perto.';
require __DIR__ . '/includes/secoes/titulo-pagina.php';
?>

<div class="container servicos-lista">
  <?php foreach ($SERVICOS as $i => $s): ?>
    <div class="reveal">
      <article id="<?= e($s['id']) ?>" class="servico-item<?= $i % 2 ? ' alt' : '' ?>">
        <div class="servico-foto">
          <img src="<?= e($s['imagem']) ?>" alt="<?= e($s['titulo']) ?>" loading="lazy" width="832" height="1216">
        </div>
        <div class="servico-info">
          <span class="eyebrow text-primary"><?= e($s['tag']) ?></span>
          <h2 class="font-wide"><?= e($s['titulo']) ?></h2>
          <p><?= e($s['descricao']) ?></p>
          <ul>
            <?php foreach ($s['itens'] as $item): ?>
              <li><?= icone('check') ?> <?= e($item) ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="<?= e(whatsapp_link('Olá, Regis! Tenho interesse em: ' . $s['titulo'] . '.')) ?>"
             target="_blank" rel="noreferrer" class="btn btn-hero servico-btn">
            <?= icone('whatsapp') ?> Quero esse
          </a>
        </div>
      </article>
    </div>
  <?php endforeach; ?>
</div>

<?php
require __DIR__ . '/includes/secoes/contato-cta.php';
require __DIR__ . '/includes/footer.php';
