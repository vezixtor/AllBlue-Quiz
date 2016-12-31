<div class="container-quiz">
  <div class="wrapper">
    <ul class="steps">
      <li class="is-active">Capa</li>
      <?php foreach ($quizQuestions as $i => $question): ?>
        <li>Etapa <?php echo $i + 1 ?></li>
      <?php endforeach; ?>
      <li>Resultado</li>
    </ul>
    <form class="form-wrapper" action="#" method="post">
      <fieldset class="section is-active">
        <h3><?= $quizCover->titulo ?></h3>
        <p><?= $quizCover->descricao ?></p>
        <div class="button">Iniciar</div>
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
                <label for="answer-<?= $j ?>">
                  <h4><?= $alternative->texto ?></h4>
                </label>
              </div>
            <?php
                endif;
              endforeach;
            ?>
          </div>
          <div class="button">Proximo</div>
        </fieldset>
      <?php endforeach; ?>

      <fieldset class="section">
        <h3>Parabens!</h3>
        <p>Aqui seu resultado _)_</p>
          <button type="submit" class="btn btn-success btn-preenchido">Publicar</button>
        <div class="button">Compartilhar</div>
      </fieldset>
    </form>
  </div>
</div>
