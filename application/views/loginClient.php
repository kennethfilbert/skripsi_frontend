<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to MMG Support</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $js;
		echo $css;
    ?>
</head>
<body class="backgrnd">
    
    <div class="container" style="margin-top: 5%; border-radius:30px; padding:5%; background:white">
    <img src="http://192.168.0.10/skripsi/assets/mmg.png" style=" display: block;
                     margin-left: auto;
                        margin-right: auto;
                        width: 30%">
    <h1 style="text-align:center"> PT Mitra Mentari Global Customer Support </h1>
        <?php
            if($this->session->flashdata('success')!=null){
                echo '<p style="color:blue">'.$this->session->flashdata('success').'</p>';
            }
            elseif($this->session->flashdata('fail')!=null){
                echo '<p style="color:red">'.$this->session->flashdata('fail').'</p>';
            }
        ?>
        <?php echo form_open('Main/loginCustomer'); ?>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="E-mail" required="" value="">
                <?php echo form_error('email','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                <?php echo form_error('password','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group">
                <?php
                    echo '<a href="'.base_url().'index.php/Main/forgetPassword','"> ';
                    echo '<span class="fa fa-question-circle"></span>';
                    echo '   Forget your password?';
                    echo '</a>';
                ?>
                
            </div>
            <div class="form-group">
                <input type="submit" name="signIn" class="btn-primary" value="Sign In"/>
            </div>
        </form>
        <?php echo form_close(); ?>
    </div>
    
</body>
    <footer class="page-footer" style="padding-top: 2%">
         <div class="footer-copyright text-center py-3">© PT Mitra Mentari Global
           <p>2019</p>
        </div>
    </footer>

</html>