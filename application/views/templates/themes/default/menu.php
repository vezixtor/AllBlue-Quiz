    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=site_url('/Quiz')?>">All Blue</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav">
            <li><a href="<?=site_url('/Quiz')?>">Inicio</a></li>
            <li ><a href="<?=site_url('/Quiz/Create')?>">Criar</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Upload <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://codepen.io/search/pens/?limit=all&page=5&q=upload" target="_blank">Search on CodePen</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://codepen.io/joshamory/pen/aOPbdM?editors=0010" target="_blank">File upload with image preview</a></li>
                <li><a href="http://codepen.io/aaronvanston/pen/yNYOXR" target="_blank">File upload input</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="https://www.google.com.br/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=upload%20crop%20image%20php%20jquery" target="_blank">Google link</a></li>
              </ul>
            </li>
            <li><a href="http://alternativeto.net/software/atom/" target="_blank">Editor/IDE</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
