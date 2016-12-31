<div class="jumbotron">
  <h1>Criar quizzes nunca foi tão fácil & divertido!</h1>
  <p>Você sempre quiz criar um quiz, mas não conseguia encontrar um criador de quiz simples para lhe ajudar? Com o nosso criador de quiz online você poderá criar um facilmente, em menos de cinco minutos. Basta seguir esses passos simples para criar quizzes online com o nosso criador de quiz.</p>
  <p><a class="btn btn-success btn-lg" href="#" role="button">Criar um Quiz</a></p>
</div>
<div class="row">
  <?php foreach($data as $row): ?>
    <div class="col-sm-6">
      <div class="thumbnail">
        <img src="http://lorempixel.com/242/200/" alt="...">
        <div class="caption">
          <h3><?=$row->titulo?></h3>
          <p><?=$row->descricao?></p>
          <p>
            <a href="<?php echo site_url('/Quiz/Visualize/'.$row->id); ?>" class="btn btn-info" role="button">Vizualizar</a>
            <a href="<?php echo site_url('/Quiz/Edit/'.$row->id); ?>" class="btn btn-default" role="button">Editar</a>
          </p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
