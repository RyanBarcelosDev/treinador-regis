<?php
/** Abertura das páginas internas. Defina $intro_fino, $intro_negrito e $intro_texto antes de incluir. */
?>
<section class="page-intro">
  <div class="glow"></div>
  <div class="container page-intro-inner">
    <?= titulo_secao($intro_fino, $intro_negrito, 'h1', 'big') ?>
    <?php if (!empty($intro_texto)): ?>
      <p class="lead"><?= e($intro_texto) ?></p>
    <?php endif; ?>
  </div>
</section>
