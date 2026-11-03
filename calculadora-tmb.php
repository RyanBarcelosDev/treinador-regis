<?php
$pagina = 'calculadora';
$titulo = 'Calculadora de TMB grátis — Treinador Regis';
$descricao = 'Calcule sua Taxa Metabólica Basal e seu gasto calórico diário em segundos com a calculadora do Treinador Regis.';
$og_titulo = 'Calculadora de TMB — Treinador Regis';
$og_descricao = 'Descubra quantas calorias seu corpo realmente precisa por dia.';

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/tmb.php';

/* ---- Processa o formulário (o cálculo é feito no servidor, em PHP) ---- */
$sexo = 'masculino';
$nivel = 'moderado';
$idade = $peso = $altura = '';
$resultado = null;
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sexo = in_array($_POST['sexo'] ?? '', ['masculino', 'feminino'], true) ? $_POST['sexo'] : 'masculino';
    $nivel = isset(NIVEIS_ATIVIDADE[$_POST['nivel'] ?? '']) ? $_POST['nivel'] : 'moderado';
    $idade = trim((string) ($_POST['idade'] ?? ''));
    $peso = trim((string) ($_POST['peso'] ?? ''));
    $altura = trim((string) ($_POST['altura'] ?? ''));

    $i = is_numeric($idade) ? (float) $idade : 0;
    $p = is_numeric(str_replace(',', '.', $peso)) ? (float) str_replace(',', '.', $peso) : 0;
    $a = is_numeric(str_replace(',', '.', $altura)) ? (float) str_replace(',', '.', $altura) : 0;

    if ($i < 10 || $i > 100 || $p < 30 || $p > 300 || $a < 100 || $a > 250) {
        $erro = 'Confira os valores: idade 10–100 anos, peso 30–300 kg e altura 100–250 cm.';
    } else {
        $tmb = calcular_tmb($sexo, $p, $a, (int) $i);
        $resultado = ['tmb' => $tmb, 'gasto' => calcular_gasto_diario($tmb, $nivel)];
    }
}

require __DIR__ . '/includes/header.php';

$intro_fino = 'Calculadora';
$intro_negrito = 'TMB';
$intro_texto = 'A Taxa Metabólica Basal é a energia que seu corpo gasta em repouso. Preencha os dados abaixo para descobrir sua TMB e seu gasto calórico diário.';
require __DIR__ . '/includes/secoes/titulo-pagina.php';
?>

<section class="container calc">
  <form method="post" action="calculadora-tmb.php#resultado" class="calc-form">
    <div>
      <span class="eyebrow label">Sexo</span>
      <div class="opcoes-sexo">
        <?php foreach (['masculino', 'feminino'] as $s): ?>
          <label class="opcao">
            <input type="radio" name="sexo" value="<?= $s ?>" class="sr-only" <?= $sexo === $s ? 'checked' : '' ?>>
            <span><?= $s ?></span>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="campos">
      <div>
        <label for="idade" class="eyebrow label">Idade (anos)</label>
        <input id="idade" name="idade" inputmode="decimal" placeholder="30" value="<?= e($idade) ?>" class="campo">
      </div>
      <div>
        <label for="peso" class="eyebrow label">Peso (kg)</label>
        <input id="peso" name="peso" inputmode="decimal" placeholder="75" value="<?= e($peso) ?>" class="campo">
      </div>
      <div>
        <label for="altura" class="eyebrow label">Altura (cm)</label>
        <input id="altura" name="altura" inputmode="decimal" placeholder="175" value="<?= e($altura) ?>" class="campo">
      </div>
    </div>

    <div>
      <span class="eyebrow label">Nível de atividade</span>
      <div class="niveis">
        <?php foreach (NIVEIS_ATIVIDADE as $id => $n): ?>
          <label class="nivel">
            <input type="radio" name="nivel" value="<?= $id ?>" class="sr-only" <?= $nivel === $id ? 'checked' : '' ?>>
            <span><strong><?= e($n['label']) ?></strong><small><?= e($n['descricao']) ?></small></span>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <?php if ($erro): ?>
      <p class="erro"><?= e($erro) ?></p>
    <?php endif; ?>

    <button type="submit" class="btn btn-hero btn-full">Calcular minha TMB</button>
  </form>

  <aside id="resultado" class="calc-resultado">
    <div class="glow"></div>
    <?php if ($resultado): ?>
      <div class="resultado" aria-live="polite">
        <?= icone('fogo', 'icon-xl text-primary') ?>
        <p class="eyebrow res-label">Sua TMB</p>
        <p class="font-wide res-tmb"><?= numero_br($resultado['tmb']) ?><small>kcal/dia</small></p>
        <p class="eyebrow res-label res-label-2">Gasto diário estimado</p>
        <p class="font-wide res-gasto"><?= numero_br($resultado['gasto']) ?><small>kcal/dia</small></p>
        <p class="res-nota">
          Esses números são estimativas. Para um plano de verdade — emagrecer, ganhar massa ou
          manter — fale comigo.
        </p>
        <a href="<?= e(whatsapp_link("Olá, Regis! Calculei minha TMB no site: {$resultado['tmb']} kcal/dia (gasto diário {$resultado['gasto']} kcal). Quero montar meu plano.")) ?>"
           target="_blank" rel="noreferrer" class="btn btn-bracket res-btn">
          <?= icone('whatsapp') ?> Montar meu plano
        </a>
      </div>
    <?php else: ?>
      <div class="resultado-vazio">
        <p class="font-wide placeholder-big">TMB</p>
        <p class="text-muted">Preencha o formulário e clique em calcular para ver seu resultado aqui.</p>
        <p class="formula">Cálculo pela fórmula de Mifflin-St Jeor.</p>
      </div>
    <?php endif; ?>
  </aside>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
