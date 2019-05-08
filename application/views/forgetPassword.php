<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forget your password?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $js;
		echo $css;
    ?>
</head>
<body>
    <div style="margin-top: 5%; margin-left: 2%; padding-right:50%">
        <h1> Forget your password? </h1>
        <h3> Enter your given e-mail below </h3>
        <?php
            if(!empty($success_msg)){
                echo '<p class="statusMsg" style="color: blue">'.$success_msg.'</p>';
            }elseif(!empty($error_msg)){
                echo '<p class="statusMsg" style="color: red">'.$error_msg.'</p>';
            }
        ?>
        <?php echo form_open('Main/recoverPassword'); ?>
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" required="" value="">
                    <?php echo form_error('email','<span class="help-block">','</span>'); ?>
                </div>
                <div class="form-group">
                    <input type="submit" name="changePassword" class="btn-primary" value="Get New Password"/>
                </div>
            </form>
        <?php echo form_close(); 
            
            echo '<a href="'.base_url().'"> ';
            echo '<span class="fa fa-arrow-left"></span>';
            echo '   Back to login page';
            echo '</a>';
        ?>
    </div>
</body>

</html>