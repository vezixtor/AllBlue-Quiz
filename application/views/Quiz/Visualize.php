<div class="container-quiz">
  <div class="wrapper">
    <ul class="steps">
      <li class="is-active">Capa</li>
      <?php foreach ($quizQuestions as $i => $question): ?>
        <li>Etapa <?php echo $i + 1 ?></li>
      <?php endforeach; ?>
      <li>Resultado</li>
    </ul>
    <form id="form-quiz" class="form-wrapper" action="#" method="post">
      <fieldset class="section is-active">
        <h3><?= $quizCover->titulo ?></h3>
        <p><?= $quizCover->descricao ?></p>
        <div id="start-quiz" class="button">Iniciar</div>
      </fieldset>

      <?php foreach ($quizQuestions as $i => $question): ?>
        <fieldset class="section">
          <h3><?= $question->questao ?></h3>
          <div class="row-quiz cf">
            <?php //Botões de Alternativas
              foreach ($questionAlternatives as $j => $alternative):
                if($question->id == $alternative->pergunta_id):
            ?>
              <div class="six col">
                <input type="radio" name="answer[<?= $i ?>]" id="answer-<?= $j ?>" value="<?= $alternative->id ?>">
                <label class="answer-click" for="answer-<?= $j ?>">
                  <h4><?= $alternative->texto ?></h4>
                </label>
              </div>
            <?php
                endif;
              endforeach;
            ?>
          </div>
          <div class="button back">Voltar</div>
        </fieldset>
      <?php endforeach; ?>

      <fieldset class="section">
        <h3 id="titulo">Parabens, vc terminou o quiz!</h3>
        <div class='uil-ring-css' style='transform:scale(0.6); margin: auto;'><div></div></div>
        <p id="descricao">Seu resultado será exibido em breve...</p>
        <div class="button">Compartilhar</div>
      </fieldset>
    </form>
  </div>
</div>
