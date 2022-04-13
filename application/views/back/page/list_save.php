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

              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">Müşteri Kayıt</div>
                      <div class="card-body">
                          <div class="card-title">
                            <button style="float:right;margin-top:-5px;" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#mediumModal">Müşteri Bul</button>
                            <button onclick="customer_delete()" style="float:right;margin-top:-5px;margin-right:5px;" class="btn btn-warning">Bilgileri Sil</button>
                            <a href="<?= base_url('index.php/order/index') ?>" style="float:right;margin-top:-5px;margin-right:5px;" class="btn btn-primary">Yeni Müşteri</a>
                            <h3 class="text-center title-2">Sipariş Kayıt</h3>
                          </div>
                          <hr>
                          <form action="<?=base_url('index.php/list_save/save/'.(isset($update_get)?$update_get->id:''))?>"  method="post" class="row form-horizontal">
                            <div class="col-md-6">
                              <div class="row form-group">
                                <label for="cc-payment" class="text-right col col-md-3">Müşteri No</label>
                                <input type="text" name="customers_id" class="form-control col-12 col-md-9" value="<?=isset($update_get->customers_id)?$update_get->customers_id:null?>" readonly required>
                              </div>
                              <div class="row form-group">
                                  <label class="text-right col col-md-3">Müşteri İsmi</label>
                                  <input name="name" type="text" class="form-control col-12 col-md-9" aria-required="true" aria-invalid="false" value="<?=(isset($update_get)?$update_get->name:null)?>" required>
                              </div>
                              <div class="row form-group">
                                  <label class="text-right  col col-md-3">Adres</label>
                                  <textarea name="address" rows="5" placeholder="Adres Girin..." class="form-control col-12 col-md-9" style="resize:none;" required><?=(isset($update_get)?$update_get->address:null)?></textarea>
                              </div>
                              <div class="row form-group">
                                  <label class="text-right  col col-md-3">İl</label>
                                  <input name="province"  type="text" class="form-control col-12 col-md-9 cc-number identified visa" value="<?=(isset($update_get)?$update_get->province:null)?>" data-val="true"
                                      data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                      autocomplete="cc-number" required>
                                  <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="row form-group">
                                <label class="text-right col col-md-3">İlçe</label>
                                <input name="town" type="text" class="form-control col-12 col-md-9 cc-number identified visa" value="<?=(isset($update_get)?$update_get->district:null)?>" data-val="true"
                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                    autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="row form-group">
                                <label class="text-right col col-md-3">Vergi Dairesi</label>
                                <input name="tax_office" type="text" class="form-control col-12 col-md-9 cc-number identified visa" value="<?=(isset($update_get)?$update_get->tax_office:null)?>" data-val="true"
                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                    autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="row form-group">
                                <label class="text-right col col-md-3">Vergi No</label>
                                <input name="tax_number"  type="text" class="form-control col-12 col-md-9 cc-number identified visa" value="<?=(isset($update_get)?$update_get->tax_number:null)?>" data-val="true"
                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                    autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="row form-group">
                                <label class="text-right col col-md-3">Tarih</label>
                                <input type="date" name="date" id="datepicker" value="<?=(isset($update_get)?$update_get->date:null)?>" class="form-control col-12 col-md-9" required>
                              </div>
                              <div class="row form-group">
                                <label class="text-right  col col-md-3">Açıklama</label>
                                <textarea name="description" rows="5" placeholder="Açıklama..." class="form-control col-12 col-md-9" style="resize: none;"><?=(isset($update_get)?$update_get->explanation:null)?></textarea>
                              </div>
                            </div>
                              <div class="col-md-12 card-title">
                                <h3 class="text-center title-2">Ürün Listesi</h3>
                                <hr>
                              </div>
                              <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                  <thead>
                                    <tr>
                                      <th>Stok Kodu</th>
                                      <th>Stok Adı</th>
                                      <th>Miktar</th>
                                      <th></th>
                                      <th></th>
                                      <th style="float:right;">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#customersearch"><i class="zmdi zmdi-plus"></i></button>
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody id="stok_table">
                                  <?php if (isset($get_table)) {
                                      foreach ($get_table as $key => $value) {
                                      echo '<tr><td><input name="stock_code[]" class="form-control col-12 col-md-9" type="text"  value="'.$value['stock_code'].'" readonly required></td>
                                            <td><input name="stock_name[]" class="form-control col-12 col-md-9" type="text" value="'.$value['stock_name'].'" aria-required="true" aria-invalid="false" required></td>
                                            <td class="desc"><input name="stock_amount[]" class="form-control col-12 col-md-9" type="text"  value="'.$value['amount'].'"></td></tr>
                                            <tr class="spacer"></tr>';
                                      }
                                    } ?>
                                  </tbody>
                                </table>
                              </div>
                              <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Siparişi Kaydet</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                              </button>
                              </form>
                            </div>
                          </div>
                        </div>

                  <!-- Müşteri Arama -->
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
                          <form id="musteri_arama" class="form-header" baseurl="<?= base_url("index.php/list_save/customer_search") ?>" method="POST">
                            <div class="input-group">
                              <div class="input-group-btn">
                                <button class="btn btn-primary">
                                  <i class="fa fa-search"></i>
                                </button>
                                </div>
                                <input type="text" id="input1-group2" name="customer_keyword" placeholder="Arama Yap..." class="form-control" required>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">

                          <table class="table">
                            <thead>
                              <tr>
                                <th>Müşteri Adı</th>
                                <th>Adres</th>
                                <th>İl</th>
                                <th>İlçe</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody id="musteri_arama_table">

                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Müşteri Arama -->

                  <!-- Stok Arama -->
                  <div class="modal fade" id="customersearch" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="mediumModalLabel">Arama</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form id="search" class="form-header" baseurl="<?= base_url("index.php/list_save/search") ?>" method="POST">
                            <div class="input-group">
                              <div class="input-group-btn">
                                <button class="btn btn-primary">
                                  <i class="fa fa-search"></i>
                                </button>
                                </div>
                                <input type="text" id="input1-group2" name="customer" placeholder="Arama Yap..." class="form-control" required>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">

                          <table class="table">
                            <thead>
                              <tr>
                                <th>STOK KODU</th>
                                <th>STOK ADI</th>
                                <th>MIKTAR</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody id="table_search">

                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Stok Arama -->
            </div>
          </div>
        </div>

        <script type="text/javascript">
          window.onload = function() {
            $("#musteri_arama").submit(function(event){
              $.ajax({
                 type: "POST",
                 url: $('#musteri_arama').attr('baseurl'),
                 data: $('#musteri_arama').serialize(),
                 success: function(data){
                   localStorage.setItem("name",data);
                   console.log(JSON.parse(localStorage.getItem("name")));
                   data = JSON.parse(data);
                   $('#musteri_arama_table').html('');
                   for (var i = 0; i < data.length; i++) {
                     $('#musteri_arama_table').append(`<tr><td>${data[i].name}</td><td>${data[i].address}</td><td>${data[i].province}</td><td>${data[i].district}</td><td><button href="javascript;;" baseurl="<?= base_url("index.php/list_save/customer_add/") ?>" id="customer_add" class="btn btn-success" onclick="customer_add(${data[i].id})">Seç</button></td></tr>`);
                   }
                 }
               });
              event.preventDefault();
            });
            $("#search").submit(function(event){
              $.ajax({
                 type: "POST",
                 url: $('#search').attr('baseurl'),
                 data: $('#search').serialize(),
                 success: function(data){
                   data = JSON.parse(data);
                   $('#table_search').html('');
                   for (var i = 0; i < data.length; i++) {
                     $('#table_search').append(`<tr><td>${data[i].code}</td><td>${data[i].name_products}</td><td></td><td><button href="javascript;;" baseurl="<?= base_url("index.php/list_save/add/") ?>" id="add" class="btn btn-success" onclick="add(${data[i].id})">Seç</button></td></tr>`);
                   }
                 }
               });
              event.preventDefault();
          });
          }
          function customer_delete(){
            var fetch_results = document.querySelector('.form-horizontal');
            for (var i = 0; i < fetch_results.length; i++) {
              fetch_results[i].value = '';
              if (fetch_results[i] == fetch_results['9']) { break; }
             }
          }
          function add(id){
            $.ajax({
              type: "POST",
              url: $('#add').attr('baseurl')+id,
              success: function(data){
                data = JSON.parse(data);
                var input_code = document.querySelectorAll('input[name="code[]"]');
                for (var i = 0; i < input_code.length; i++) {
                  if (input_code[i].value == data["0"].code) {
                    swal ( "Hata" ,  "Daha Önce Stok Eklendi. Bir Daha Ekleyemezsiniz...!" ,  "error" );
                    return;
                  }
                }
                $('#stok_table').append(`<tr><td><input name="stock_code[]" class="form-control col-12 col-md-9" type="text"  value="${data["0"].code}" readonly required></td><td><input name="stock_name[]" class="form-control col-12 col-md-9" type="text" value="${data["0"].name_products}" aria-required="true" aria-invalid="false" required></td><td class="desc"><input name="stock_amount[]" class="form-control col-12 col-md-9" type="text" value="" required></td></tr><tr class="spacer"></tr>`);
                $('#customersearch').modal('hide');
              }
            });
          }
          function customer_add(id){
            $.ajax({
              type: "POST",
              url: $('#customer_add').attr('baseurl')+id,
              success: function(data){
                data = JSON.parse(data);
                $('input[name="customers_id"]').val(data["0"].customers_id);
                $('input[name="name"]').val(data["0"].name);
                $('textarea[name="address"]').val(data["0"].address);
                $('input[name="province"]').val(data["0"].province);
                $('input[name="town"]').val(data["0"].district);
                $('input[name="tax_office"]').val(data["0"].tax_office);
                $('input[name="tax_number"]').val(data["0"].tax_number);
                $('input[name="date"]').val(data["0"].date);
                $('textarea[name=description]').val(data["0"].explanation);
                $('#mediumModal').modal('hide');
              }
            });
          }
        </script>

  <?php $this->load->view("back/include/script"); ?>

</body>
</html>
