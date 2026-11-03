<?php
/**
 * "Meu Método" — as abas funcionam só com CSS (botões de opção escondidos).
 */
$ETAPAS = [
    ['n' => '01', 'titulo' => 'Avaliação', 'texto' => 'Tudo começa entendendo <strong>quem é você</strong>: histórico, rotina, limitações e onde você quer chegar.'],
    ['n' => '02', 'titulo' => 'Planejamento', 'texto' => 'Com os dados em mãos, monto um <strong>plano sob medida</strong> — nada de treino copiado da internet.'],
    ['n' => '03', 'titulo' => 'Execução', 'texto' => 'Treino com <strong>técnica e intensidade</strong>, corrigindo cada movimento para você evoluir com segurança.'],
    ['n' => '04', 'titulo' => 'Acompanhamento', 'texto' => 'Ajustes constantes e contato direto. Você nunca fica <strong>sem resposta</strong> no meio do caminho.'],
    ['n' => '05', 'titulo' => 'Evolução', 'texto' => 'Resultado é consequência de <strong>disciplina</strong>. É ela que te leva mais longe.'],
];
$total = count($ETAPAS);
?>
<section class="container section">
  <div class="metodo reveal">
    <?php foreach ($ETAPAS as $i => $etapa): $n = $i + 1; ?>
      <input type="radio" name="etapa" id="etapa-<?= $n ?>" class="sr-only" <?= $n === 1 ? 'checked' : '' ?> aria-label="Etapa <?= $etapa['n'] ?>">
    <?php endforeach; ?>

    <div class="metodo-grid">
      <div class="metodo-info">
        <?= titulo_secao('Meu', 'Método') ?>
        <div>
          <?php foreach ($ETAPAS as $i => $etapa): ?>
            <div class="etapa-texto e<?= $i + 1 ?>">
              <p class="etapa-meta">Etapa <?= $etapa['n'] ?> · <?= e($etapa['titulo']) ?> <?= icone('info') ?></p>
              <p class="etapa-desc"><?= $etapa['texto'] ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="metodo-foto">
        <img src="img/foto-regis.jpeg" alt="Treinador Regis de braços cruzados na academia" loading="lazy">
      </div>
    </div>

    <div class="etapa-nav">
      <?php for ($n = 1; $n <= $total; $n++): ?>
        <?php if ($n === 1): ?>
          <span class="etapa-arrow off a1"><?= icone('esquerda') ?></span>
        <?php else: ?>
          <label for="etapa-<?= $n - 1 ?>" class="etapa-arrow a<?= $n ?>" aria-label="Etapa anterior"><?= icone('esquerda') ?></label>
        <?php endif; ?>
      <?php endfor; ?>

      <div class="etapa-tabs">
        <?php foreach ($ETAPAS as $i => $etapa): ?>
          <label for="etapa-<?= $i + 1 ?>" class="etapa-tab t<?= $i + 1 ?>">
            <?= $etapa['n'] ?><span><?= e($etapa['titulo']) ?></span>
          </label>
        <?php endforeach; ?>
      </div>

      <?php for ($n = 1; $n <= $total; $n++): ?>
        <?php if ($n === $total): ?>
          <span class="etapa-arrow off a<?= $n ?>"><?= icone('direita') ?></span>
        <?php else: ?>
          <label for="etapa-<?= $n + 1 ?>" class="etapa-arrow a<?= $n ?>" aria-label="Próxima etapa"><?= icone('direita') ?></label>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>
</section>
