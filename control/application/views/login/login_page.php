<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap material admin template">
        <meta name="author" content="">
        
        <title>Nusantara Adivista</title>
        
        <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/main/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/main/images/favicon.ico">
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/main/css/site.min.css">
        
        <!-- Plugins -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/animsition/animsition.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/asscrollable/asScrollable.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/switchery/switchery.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/intro-js/introjs.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/slidepanel/slidePanel.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/waves/waves.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/main/examples/css/pages/login-v3.css">
        
        
        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/fonts/material-design/material-design.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        
        <script src="<?php echo base_url();?>assets/global/vendor/breakpoints/breakpoints.js"></script>
        <script>
        Breakpoints();
        </script>
    </head>    
    <body class="animsition page-login-v3 layout-full">
        <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle">
                <div class="panel">
                    <div class="panel-body">
                        <?php if($this->session->msg != ""):?>
                        <div class = "alert alert-<?php echo $this->session->type;?>">
                            <?php echo $this->session->msg;?>
                        </div>
                        <?php endif;?>
                        <div class="brand">
                            <h2 class="brand-text font-size-18">Nusantara Adivista</h2>
                        </div>
                        <form method="post" action="<?php echo base_url();?>welcome/auth" autocomplete="off">
                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                <input required type="email" class="form-control" name="email" />
                                <label class="floating-label">Email</label>
                            </div>
                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                <input required type="password" class="form-control" name="password" />
                                <label class="floating-label">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>