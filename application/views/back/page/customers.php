<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php $this->load->view("back/include/title"); ?>
<?php $this->load->view("back/include/style"); ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
      <?php $this->load->view("back/include/header_mobile"); ?>
      <?php $this->load->view("back/include/menu_sidebar"); ?>

        <div class="page-container">
          <?php $this->load->view("back/include/header_desktop"); ?>

            <div class="main-content">

                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="title-5 m-b-35">Müşteriler</h3>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                  <tr>
                                    <th>Firma Adı</th>
                                    <th>Adres</th>
                                    <th>İl</th>
                                    <th>İlçe</th>
                                    <th>Vergi Daire</th>
                                    <th>Vergi No</th>
                                    <th style="float:right;">
                                      <a href="<?= base_url('index.php/customers_save/index') ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Kayıt</a>
                                      <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal"><i class="zmdi zmdi-search"></i> Ara</button>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>

                                  <?php if (isset($search)){
                                    foreach ($search as $key => $value) {
                                      echo '
                                        <tr class="tr-shadow">
                                          <td><span class="block-email">'.$value['company_name'].'</span></td>
                                          <td>
                                          '.$value['address'].'
                                          </td>
                                          <td class="desc">'.$value['province'].'</td>
                                          <td>'.$value['district'].'</td>
                                          <td>
                                            <span class="status--process">'.$value['tax_office'].'</span>
                                          </td>
                                          <td>'.$value['tax_number'].'</td>
                                          <td>
                                            <div class="table-data-feature">
                                              <a href="'.base_url("index.php/customers_save/index/".$value['id']).'" class="item" data-toggle="tooltip" data-placement="top" title="Değiştir">
                                                <i class="zmdi zmdi-edit"></i>
                                              </a>
                                              <button id="godelete" href="javascript:;" baseurl="'.base_url("index.php/customers/delete/").'"  onclick="Delete('.$value['id'].');" class="item" data-toggle="tooltip" data-placement="top" title="Sil">
                                                <i class="zmdi zmdi-delete"></i>
                                              </button>
                                            </div>
                                          </td>
                                        </tr>
                                      <tr class="spacer"></tr>';
                                    }
                                  }else {
                                    foreach ($customers_get as $key => $value) {
                                      echo '
                                        <tr class="tr-shadow">
                                          <td><span class="block-email">'.$value['company_name'].'</span></td>
                                          <td>
                                            '.$value['address'].'
                                          </td>
                                          <td class="desc">'.$value['province'].'</td>
                                          <td>'.$value['district'].'</td>
                                          <td>
                                            <span class="status--process">'.$value['tax_office'].'</span>
                                          </td>
                                          <td>'.$value['tax_number'].'</td>
                                          <td>
                                            <div class="table-data-feature">
                                              <a href="'.base_url("index.php/customers_save/index/".$value['id']).'" class="item" data-toggle="tooltip" data-placement="top" title="Değiştir">
                                                <i class="zmdi zmdi-edit"></i>
                                              </a>
                                              <button id="godelete" href="javascript:;" baseurl="'.base_url("index.php/customers/delete/").'"  onclick="Delete('.$value['id'].');" class="item" data-toggle="tooltip" data-placement="top" title="Sil">
                                                <i class="zmdi zmdi-delete"></i>
                                              </button>
                                            </div>
                                          </td>
                                        </tr>
                                      <tr class="spacer"></tr>';
                                    }
                                  }?>

                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="mediumModalLabel">Arama</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-header" action="<?= base_url("index.php/customers/search") ?>" method="POST">
                                <div class="input-group">
                                  <div class="input-group-btn">
                                    <button class="btn btn-primary">
                                      <i class="fa fa-search"></i>
                                    </button>
                                    </div>
                                  <input type="text" id="input1-group2" name="keyword" placeholder="Arama Yap..." class="form-control" required>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                          </div>
                        </div>
                      </div>

              </div>

        </div>
      </div>

      <script type="text/javascript">
      function Delete(id){
        swal({
          title: "Veri Silinecek",
          text: "Silmek istediğinize emin misiniz ?",
          icon: "warning",
          buttons: ["Hayır", "Evet"],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Başarıyla Silindi!", {
              icon: "success",
              button: "Tamam",
            }).then(function() {
              window.location = location.href;
            });
            $.ajax({
              url: $('#godelete').attr('baseurl')+id,
              type: 'post',
              dataType: 'json',
              success : function(data){
              }
            });
          }else{
           swal("Silme İşlemi Yapılmadı!",{
             button: "Tamam",
           });
          }
        });
      }
      </script>

  <?php $this->load->view("back/include/script"); ?>

</body>
</html>
