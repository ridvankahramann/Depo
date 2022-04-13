<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php $this->load->view("back/include/title"); ?>
<?php $this->load->view("back/include/style"); ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="<?= base_url('index.php/login')?>">
                                <img src="<?=base_url('assets/')?>images/syroxlogo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?= base_url('index.php/login/control')?>" method="post">
                                <div class="form-group">
                                    <label>Kullanıcı Giriş</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Şifre</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="password" required>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Giriş</button>
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
