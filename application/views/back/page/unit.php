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
                  <div class="card-header">Birim</div>
                  <div class="card-body">
                    <div class="card-title">
                      <h3 class="text-center title-2">Birim Kayıt</h3>
                    </div>
                    <hr>
                    <form action= "<?=isset($insert)?base_url('index.php/unit/unit_save/'.$insert->id):base_url('index.php/unit/unit_save');?>" method="post">
                      <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Birim</label>
                        <input id="cc-pament" name="unit" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?=(isset($insert)?$insert->unit:null)?>" required>
                      </div>
                      <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                          <i class="fa fa-lock fa-lg"></i>&nbsp;
                          <span id="payment-button-amount">Kaydet</span>
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
