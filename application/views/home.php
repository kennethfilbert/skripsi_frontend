<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Support</title>
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
                        echo '<a href="'.base_url().'index.php/Main/aboutUs','">';
                        echo '<span class="fa fa-info-circle"></span>';
                        echo '   About Us';
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
        
        <!--<h1 style="margin-bottom: 100%">This is the home page of the customer side website</h1>-->
            <div style="margin:2%;">
                <?php echo form_open_multipart('Main/addNewTicket'); ?>
                <form role="form" class="form-horizontal" action=""  method="post" style="margin: 3%">
                    <div>
                        <?php 
                            $displayName = $this->session->userdata['isUserLoggedIn']['customerUsername'];
                            echo "<h5>Welcome, ".$displayName."!</h5>"; 
                            
                            echo "<h5>Please enter your support details below</h5>";
                            
                        ?>
                    </div>
                    
                        <?php
                            if(!empty($success_msg)){
                                echo '<div style="color: blue;">
                                        <h3 class="statusMsg">'.$success_msg.'</h3></div>';
                            }elseif(!empty($error_msg)){
                                echo ' <div style="color: red;">
                                        <h3 class="statusMsg">'.$error_msg.'</h3></div>';
                            }
                            
                            if(!empty($upload_status)){
                                echo ' <div style="color: grey;">
                                        <h3 class="statusMsg">'.$upload_status.'</h3></div>';
                            }
                        ?>
                     
                        <h2>Contact Info</h2>
                        <hr style="width: 100%; height:20px">
                        <div class="form-group">
                            <label for="name"><b>Name</b></label>
                            <input type="text" class="form-control" name="name" required="" value="<?php echo $this->session->userdata['isUserLoggedIn']['customerUsername']; ?>">
                            <?php echo form_error('name','<span class="help-block">','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email"><b>E-mail</b></label>
                            <input type="text" class="form-control" name="email" required="" value="<?php echo $this->session->userdata['isUserLoggedIn']['customerEmail']; ?>">
                            <?php echo form_error('name','<span class="help-block">','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="phone"><b>Phone no.</b></label>
                            <input type="text" class="form-control" name="phone" required="" >
                            <?php echo form_error('name','<span class="help-block">','</span>'); ?>
                        </div>
                        <h2>Ticket Info</h2>
                        <hr style="width: 100%; height:20px">
                        <div class="form-group">
                            <label for="title"><b>Title (general idea)</b></label>
                            <input type="text" class="form-control" name="title" required="" >
                            <?php echo form_error('name','<span class="help-block">','</span>'); ?>
                        </div>
                        <label for="product">Product</label>
                        <div class="form-group">
                            <select name="product">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <label for="inquiry">Inquiry Type</label>
                        <div class="form-group">
                            <select name="inquiry">
                                <option value="Complaint">Problem report/Complaint</option>
                                <option value="Question">Questions</option>
                                <option value="Critique/Suggestion">Critique/Suggestion</option>
                            </select>
                        </div>
                        <label for="urgency">Urgency</label>
                        <div class="form-group">
                            <select name="urgency">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                            <label for="description">Description</label>
                                <!--<div id="editor" name="description" class="form-group" style="height: 300px; width: 600px">
                                    <textarea name="descriptiontext"></textarea>
                                </div>-->
                            <div class="form-group">
                                <textarea name="descriptiontext" class="form-group" rows="10" cols="90" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="picture">Screenshots (if any) Accepted image formats: .img, .png, .gif</label>
                                <input class="form-control" type="file" name="picture" id="picture" multiple="multiple">
                            </div>
                            <div class="form-group>">
                                <label for="pv">Preview: </label>
                                <img name="pv" id="preview" src="#" style="height:25%; width:25%; margin-bottom: 1%"/>
                             </div>
                            <div class="form-group">
                                <input type="submit" name="confirm" class="btn-primary" value="Submit"/>
                            </div>
                    </form>
                    <?php echo form_close(); ?>
            </div>
        </div>
        
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }
    
            $("#picture").change(function(){
                readURL(this);
            });
        </script>
    
</body>
</html>
