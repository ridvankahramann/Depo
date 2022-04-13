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
                              <h3 class="text-center title-2">Yeni Müşteri Ekle</h3>
                          </div>
                          <hr>
                          <form action="<?=isset($customers_get)?base_url('index.php/customers_save/save/'.$customers_get->id):base_url('index.php/customers_save/save');?>" method="post">
                              <div class="form-group">
                                  <label for="cc-payment" class="control-label mb-1">Firma Adı</label>
                                  <input id="cc-pament" name="payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?=(isset($customers_get)?$customers_get->company_name:null)?>" required>
                              </div>
                              <div class="form-group has-success">
                                  <label for="cc-name" class="control-label mb-1">Adres</label>
                                  <input id="cc-name" name="name" value="<?=(isset($customers_get)?$customers_get->address:null)?>" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                      autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                  <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                              </div>
                              <div class="form-group">
                                  <label for="cc-number" class="control-label mb-1">İl</label>
                                  <input id="cc-number" name="number" value="<?=(isset($customers_get)?$customers_get->province:null)?>" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                      data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                      autocomplete="cc-number" required>
                                  <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="form-group">
                                <label for="cc-exp" class="control-label mb-1">İlçe</label>
                                <input id="cc-exp" name="ilce" value="<?=(isset($customers_get)?$customers_get->district:null)?>" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                    autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="form-group">
                                  <label for="cc-number" class="control-label mb-1">Vergi Daire</label>
                                  <input id="cc-number" name="vergi" value="<?=(isset($customers_get)?$customers_get->tax_office:null)?>" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                      data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                      autocomplete="cc-number" required>
                                  <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="form-group">
                                  <label for="cc-number" class="control-label mb-1">Vergi No</label>
                                  <input id="cc-number" name="no" value="<?=(isset($customers_get)?$customers_get->tax_number:null)?>" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                      data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                      autocomplete="cc-number" required>
                                  <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                      <i class="fa fa-lock fa-lg"></i>&nbsp;
                                      <span id="payment-button-amount">Kayıt</span>
                                      <span id="payment-button-sending" style="display:none;">Sending…</span>
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>


            </div>

        </div>
      </div>

  <?php $this->load->view("back/include/script"); ?>

</body>
</html>
