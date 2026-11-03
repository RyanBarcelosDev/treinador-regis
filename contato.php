<?php
$pagina = 'contato';
$titulo = 'Contato — Treinador Regis';
$descricao = 'Fale com o Treinador Regis pelo WhatsApp ou Instagram. Atendimento em São Paulo, Capão Redondo e região.';
$og_descricao = 'Agende sua aula: WhatsApp +55 11 95466-1150 · @treinadorregis.';
require __DIR__ . '/includes/header.php';

$intro_fino = 'Entre em';
$intro_negrito = 'Contato';
$intro_texto = 'Quer agendar uma aula experimental, saber valores ou tirar dúvidas? Me chama — respondo pessoalmente.';
require __DIR__ . '/includes/secoes/titulo-pagina.php';

$CARTOES = [
    ['icone' => 'whatsapp', 'label' => 'WhatsApp', 'valor' => SITE_WHATSAPP_EXIBICAO, 'link' => whatsapp_link(), 'acao' => 'Enviar mensagem'],
    ['icone' => 'instagram', 'label' => 'Instagram', 'valor' => SITE_INSTAGRAM_USUARIO, 'link' => SITE_INSTAGRAM_URL, 'acao' => 'Seguir'],
    ['icone' => 'local', 'label' => 'Região', 'valor' => SITE_REGIAO, 'link' => null, 'acao' => 'Presencial e online'],
];
?>

<div class="container contato-cards">
  <?php foreach ($CARTOES as $c): ?>
    <?php if ($c['link']): ?>
      <a href="<?= e($c['link']) ?>" target="_blank" rel="noreferrer" class="contato-card">
    <?php else: ?>
      <div class="contato-card">
    <?php endif; ?>
        <?= icone($c['icone']) ?>
        <span class="eyebrow contato-label"><?= e($c['label']) ?></span>
        <span class="font-wide contato-valor"><?= e($c['valor']) ?></span>
        <span class="eyebrow contato-acao"><?= e($c['acao']) ?></span>
    <?= $c['link'] ? '</a>' : '</div>' ?>
  <?php endforeach; ?>
</div>

<?php
require __DIR__ . '/includes/secoes/redes.php';
require __DIR__ . '/includes/footer.php';
