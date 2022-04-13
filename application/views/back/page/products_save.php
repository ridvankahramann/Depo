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
                    <div class="card-header">Ürün Kayıt</div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Yeni Ürün Kayıt</h3>
                        </div>
                        <hr>
                        <form action="<?=isset($insert)?base_url('index.php/products_save/save/'.$insert->id):base_url('index.php/products_save/save');?>" method="post">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Ürün Adı</label>
                                <input id="cc-pament" name="payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?=(isset($insert)?$insert->name_products:null)?>" required>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Kodu</label>
                                <input id="cc-name" name="name" value="<?=(isset($insert)?$insert->code:null)?>" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Açıklama</label>
                                <input id="cc-number" name="number" value="<?=(isset($insert)?$insert->description:null)?>" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                    autocomplete="cc-number" required>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                              <label for="cc-exp" class="control-label mb-1">Birimi</label>
                              <select name="exp" id="select" class="form-control" required>
                                <option></option>
                                <?php foreach ($unit_menu as $key => $value){
                                  if($value['id'] == $insert->unit) $selected = 'selected'; else $selected = '';
                                    echo '<option value="'.$value['id'].'" '.$selected.'> '.$value['unit'].'</option>';
                                  } ?>
                              </select>
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
