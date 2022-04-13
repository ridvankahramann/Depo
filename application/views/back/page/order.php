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
                            <h3 class="text-center title-2">Yeni Kayıt</h3>
                          </div>
                          <hr>
                          <form action="<?=base_url('index.php/order/save')?>"  method="post" class="row form-horizontal">
                            <div class="col-md-6">
                              <div class="row form-group">
                                  <label for="cc-payment" class="text-right col col-md-3">Müşteri İsmi</label>
                                  <input id="cc-pament" name="payment" type="text" class="form-control col-12 col-md-9" aria-required="true" aria-invalid="false" required>
                              </div>
                              <div class="row form-group">
                                  <label for="cc-name" class="text-right  col col-md-3">Adres</label>
                                  <textarea name="textarea-input" id="textarea-input" rows="5" placeholder="Adres Girin..." class="form-control col-12 col-md-9" style="resize:none;" required></textarea>
                              </div>
                              <div class="row form-group">
                                  <label for="cc-number" class="text-right  col col-md-3">İl</label>
                                  <input id="cc-number" name="number"  type="text" class="form-control col-12 col-md-9 cc-number identified visa" data-val="true"
                                      data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                      autocomplete="cc-number" required>
                                  <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="row form-group">
                                <label for="cc-exp" class="text-right col col-md-3">İlçe</label>
                                <input id="cc-number" name="exp" type="text" class="form-control col-12 col-md-9 cc-number identified visa" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="row form-group">
                                <label for="cc-exp" class="text-right col col-md-3">Vergi Dairesi</label>
                                <input id="cc-number" name="dairesi" type="text" class="form-control col-12 col-md-9 cc-number identified visa" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="row form-group">
                                <label for="cc-exp" class="text-right col col-md-3">Vergi No</label>
                                <input id="cc-number" name="no"  type="text" class="form-control col-12 col-md-9 cc-number identified visa" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="row form-group">
                                <label for="cc-exp" class="text-right col col-md-3">Tarih</label>
                                <input type="date" name="datepicker" id="datepicker" class="form-control col-12 col-md-9" required>
                              </div>
                              <div class="row form-group">
                                <label for="cc-name" class="text-right  col col-md-3">Açıklama</label>
                                <textarea name="textarea-explanation" id="textarea-explanation" rows="5" placeholder="Açıklama..." class="form-control col-12 col-md-9" style="resize: none;"></textarea>
                              </div>
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


                    </div>
                  </div>
                </div>



  <?php $this->load->view("back/include/script"); ?>

</body>
</html>
