
<div class="page-header">
  <h1>Quiz de facebook <small>AllBlue</small></h1>
</div>
<div class="row">
	<div class="col-sm-8">
    <form action="#" method="post">
      <div class="panel panel-primary">
        <div class="panel-heading">Capa</div>
        <div class="panel-body">
      		<div class="row">
      			<div class="col-sm-4">
      				<img src="http://lorempixel.com/245/144/cats/10" alt="Imagem da capa" class="thumbnail">
      			</div>
      			<div class="col-sm-8">
      				  <div class="form-group">
      				    <input name="cover-title" type="text" class="form-control" placeholder="Título do quiz...">
      				  </div>
      				  <div class="form-group">
      				    <textarea name="cover-description" class="form-control" rows="4" placeholder="Descrição do quiz..."></textarea>
      				  </div>
      			</div>
      		</div>
        </div>
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading">Resultados</div>
        <div class="panel-body">
        <?php for($i = 0; $i < 2; $i++): ?>
  		    <div class="row">
      			<div class="col-sm-4" style="padding-right:0px;">
      				<img src="http://lorempixel.com/245/144/cats/<?php echo $i + 1; ?>" alt="Imagem do Resultado" class="thumbnail">
      			</div>
      			<div class="col-sm-8">
      				  <div class="form-group">
      				    <input name="resultado[<?= $i ?>][title]" type="text" class="form-control" placeholder="Título do resultado...">
      				  </div>
      				  <div class="form-group">
      				    <textarea name="resultado[<?= $i ?>][description]" class="form-control" rows="4" placeholder="Descrição do resultado..."></textarea>
      				  </div>
      			</div>
      		</div>
        <?php endfor; ?>
        <button type="button" class="btn btn-primary">+ Adicionar resultado</button>
      </div></div>

      <div class="questions">
        <?php for($i = 0; $i < 2; $i++): ?>
          <div class="panel panel-primary">
            <div class="panel-heading">Pergunta <?php echo $i + 1; ?></div>
            <div class="panel-body">
          		<div class="row">
          			<div class="col-sm-4">
          				<img src="http://lorempixel.com/245/144/cats/<?php echo $i + 3; ?>" alt="Imagem do pergunta" class="thumbnail">
          			</div>
          			<div class="col-sm-8">
          				  <div class="form-group">
          				    <textarea name="pergunta[<?= $i ?>]" class="form-control" rows="7" placeholder="Texto da pergunta..."></textarea>
          				  </div>
          			</div>
          		</div>
              <div class="alternatives">
                <h4>Alternativas</h4>
                <?php for($j = 0; $j < 2; $j++): ?>
                  <div class="row">
                    <!-- Alternativas com figuras...
              			<div class="col-sm-3">
              				<img src="http://lorempixel.com/150/130/cats/<?php echo $j + 7; ?>" alt="Imagem do pergunta" class="thumbnail">
              			</div> -->
              			<div class="col-sm-12">
              				  <div class="form-group">
              				    <textarea name="alternativa[<?= $i ?>][<?= $j ?>]" class="form-control" rows="2" placeholder="Texto da alternativa..."></textarea>
              				  </div>
              			</div>
                    <?php for($k = 0; $k < 2; $k++): ?>
                      <div class="col-sm-2 alternativa-points">
                        <img src="http://lorempixel.com/100/100/cats/<?php echo $k + 1; ?>" alt="Imagem do Resultado" class="thumbnail">
                        <div class="">
                          <select class="form-control" name="pontacao[<?= $j ?>][<?= $k ?>]">
                            <option value="-1">-1</option>
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                          </select>
                        </div>
                      </div>
                    <?php endfor; ?>
              		</div>
                <?php endfor; ?>
                <button type="button" class="btn btn-primary">+ Adicionar alternativa</button>
              </div>
            </div>
          </div>
        <?php endfor; ?>

        <div class="row">
          <div class="col-sm-12">
            <button type="button" class="btn btn-primary btn-preenchido">+ Adicionar pergunta</button>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-success">Publicar</button>
        </div>
      </div>
    </form>
	</div>

	<div class="col-sm-3 col-sm-offset-1">
		<div class="sidebar-module sidebar-module-inset">
      <h4>About</h4>
      <p lingdex="21">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
	</div>
</div>
