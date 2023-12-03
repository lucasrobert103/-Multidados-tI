<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8" />
  <title>Multidados TI</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="favicon.ico" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/themes/default.css" />
  <link rel="stylesheet" href="assets/css/style-metronic.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/style-responsive.css" />
  <link rel="stylesheet" href="assets/css/plugins.css" />
  <link rel="stylesheet" href="assets/css/custom.css" />

</head>
<body class="page-header-fixed">
  <?php require "./cabecalho.php" ?>
  <div class="clearfix"></div>

  <div class="page-container">
    <?php require "./menu.php" ?>

    <div class="page-content-wrapper">
      <div class="page-content">
        <!-- Modal -->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">Widget settings form goes here</div>
              <div class="modal-footer">
                <button type="button" class="btn blue">Save changes</button>
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h3 class="page-title">Dashboard <small>tudo que você precisa à um click.</small></h3>
            <ul class="page-breadcrumb breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i></li>
              <li><a href="#">Dashboard</a></li>
              <li class="pull-right">
                <div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
                  <i class="fa fa-calendar"></i><span> </span><i class="fa fa-angle-down"></i>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue 0">
              <div class="visual">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <div class="details">
                <div class="number"></div>
                <div class="desc">Clientes</div>
              </div>
              <a class="more" href="#">Visualizar <i class="m-icon-swapright m-icon-white"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat green 1">
              <div class="visual">
                <i class="fa fa-group"></i>
              </div>
              <div class="details">
                <div class="number"></div>
                <div class="desc">Usuários</div>
              </div>
              <a class="more" href="#">Visualizar <i class="m-icon-swapright m-icon-white"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple 2">
              <div class="visual">
                <i class="fa fa-globe"></i>
              </div>
              <div class="details">
                <div class="number"></div>
                <div class="desc">Fornecedores</div>
              </div>
              <a class="more" href="#">Visualizar <i class="m-icon-swapright m-icon-white"></i></a>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>

        <!-- Table Section -->
        <div class="row">
          <div class="col-md-12">
            <div class="portlet box grey">
              <div class="portlet-title">
                <div class="caption"><i class="fa fa-folder-open"></i>Tabela Simples</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th class="userOrEmail">Usuario</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Table data goes here -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require "./rodape.php" ?>

  <!-- JavaScript -->
  <script src="assets/plugins/jquery-1.10.2.min.js"></script>
  <script src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
  <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="assets/plugins/jquery.cockie.min.js"></script>
  <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
  <script src="assets/scripts/app.js"></script>
  <script src="assets/scripts/index.js"></script>

  <script>
    jQuery(document).ready(function () {
      App.init(); 
      Index.init();
    });

    // Your additional script goes here
    let dataGlobal;

    $.post("./DataRequest.php", function(result, status) {
      const datas = JSON.parse(result);

      let cont = 0;

      dataGlobal = datas;

      $('.row .0 .number').html(datas[0].length);
      $('.row .1 .number').html(datas[1].length);
      $('.row .2 .number').html(datas[2].length);

      datas[0].forEach(element => {
        cont++;

        let newRow = $("<tr>");
        let cols = '';

        cols += `<td>${cont}</td>`;
        cols += `<td>${element.nome}</td>`;
        cols += `<td>${element.cpf}</td>`;
        cols += `<td>${element.usuario}</td>`;
        cols += `<td>${element.endereco}</td>`;
        cols += `<td>${element.telefone}</td>`;
        cols += `<td><span class="label label-sm ${element.status == 'Aprovado' ? 'label-success' : element.status == 'Pendente' ? 'label-info' : element.status == 'Suspenso' ? 'label-warning' : 'label-danger'}">${element.status}</span></td>`;

        newRow.append(cols);

        $('.table tbody').append(newRow);

        $(".portlet-title").css("background", 'blue');
        $(".portlet.box.grey").css("border-color", 'blue');
        $(".table tbody tr td").css("border-top-color", 'blue');
      });
    });

    $(".more").on('click', function(e) {
      let cont = 0;

      $('.table tbody').remove();
      $('.table').append($("<tbody>"));

      if (e.target.offsetParent.children[0].classList[2] == 0) {
        dataGlobal[0].forEach(element => {
          cont++;

          $('.userOrEmail').html('Usuario');
          let newRow = $("<tr>");
          let cols = '';

          cols += `<td>${cont}</td>`;
          cols += `<td>${element.nome}</td>`;
          cols += `<td>${element.cpf}</td>`;
          cols += `<td>${element.usuario}</td>`;
          cols += `<td>${element.endereco}</td>`;
          cols += `<td>${element.telefone}</td>`;
          cols += `<td><span class="label label-sm ${element.status == 'Aprovado' ? 'label-success' : element.status == 'Pendente' ? 'label-info' : element.status == 'Suspenso' ? 'label-warning' : 'label-danger'}">${element.status}</span></td>`;

          newRow.append(cols);

          $('.table tbody').append(newRow);
        });
      }

      if (e.target.offsetParent.children[0].classList[2] == 1 || e.target.offsetParent.children[0].classList[2] == 2) {
        dataGlobal[e.target.offsetParent.children[0].classList[2]].forEach(element => {
          cont++;

          $('.userOrEmail').html('E-mail');
          let newRow = $("<tr>");
          let cols = '';

          cols += `<td>${cont}</td>`;
          cols += `<td>${element.nome}</td>`;
          cols += `<td>${element.cpf}</td>`;
          cols += `<td>${element.email}</td>`;
          cols += `<td>${element.endereco}</td>`;
          cols += `<td>${element.telefone}</td>`;
          cols += `<td><span class="label label-sm ${element.status == 'Aprovado' ? 'label-success' : element.status == 'Pendente' ? 'label-info' : element.status == 'Suspenso' ? 'label-warning' : 'label-danger'}">${element.status}</span></td>`;

          newRow.append(cols);

          $('.table tbody').append(newRow);
        });
      }

      $(".portlet-title").css("background", e.target.offsetParent.children[0].classList[1]);
      $(".portlet.box.grey").css("border-color", e.target.offsetParent.children[0].classList[1]);
      $(".table tbody tr td").css("border-top-color", e.target.offsetParent.children[0].classList[1]);
    });
  </script>

</body>
</html>
