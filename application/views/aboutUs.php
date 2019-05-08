<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $js;
		echo $css;
    ?>
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="http://192.168.0.10/skripsi/assets/mmg.png" style=" display: block;
                     margin-left: auto;
                        margin-right: auto;
                        width: 70%">
                <p style="text-align:center">SUPPORT</p>
            </div>
            
            <ul class="list-unstyled components" style="margin-left: 3%; margin-right: 3%">   
            <p style="text-align:center"><b>Actions</b></p>
               <hr>
                <li>
                    <?php
                        $loggedInUser = $this->session->userdata['isUserLoggedIn']['customerID'];
                        //echo $this->session->userdata('isUserLoggedIn');
                        echo '<a href="'.base_url().'index.php/Main/profile/'.$loggedInUser.'">';
                        echo '<span class="fa fa-user"></span>';
                        echo '   My Profile';
                        echo '</a>';
                    ?>
                </li>
                <hr>
                <li>
                     <?php
                        echo '<a href="'.base_url().'index.php/Main/homepage','">';
                        echo '<span class="fa fa-home"></span>';
                        echo '   Home';
                        echo '</a>';
                    ?>
                </li>
                <hr>
                <li>
                    <?php
                        echo '<a href="'.base_url().'index.php/Main/logout','">';
                        echo '<span class="fa fa-power-off"></span>';
                        echo '   Sign Out';
                        echo '</a>';
                    ?>
                </li>
                <hr>
            </ul>
            <footer>
                <div class="footer-copyright text-center py-3">© PT Mitra Mentari Global
                    <p>2019</p>
                </div>
            </footer>
        </nav>
    </div>
</body>

</html>