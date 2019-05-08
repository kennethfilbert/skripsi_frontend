<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $js;
		echo $css;
    ?>
    <script>
			$(document).ready(function(){
				$('#history').DataTable();
			});
	</script>
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
                            echo '<a href="'.base_url().'index.php/Main/homepage">';
                            echo '<span class="fa fa-home"></span>';
                            echo "   Home";
                            echo '</a>';
                        ?>
                    </li>
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

            <div style="margin:2%;">
                <h1>Ticket Details</h1>
                <ul class="list-group">
                <li class="list-group-item"><?php echo "Ticket ID: ".$details[0]['ticketID'];?></li>
                <li class="list-group-item"><?php echo "Token #: ".$details[0]['token'];?></li>
                <li class="list-group-item"><?php echo "Date Added: ".$details[0]['dateAdded'];?></li>
                <li class="list-group-item"><?php echo "Ticket Title: ".$details[0]['ticketTitle'];?></li>
                <li class="list-group-item"><?php echo "Customer Name: ".$details[0]['customerName'];?></li>
                <li class="list-group-item"><?php echo "Customer Email: ".$details[0]['customerEmail'];?></li>
                <li class="list-group-item"><?php echo "Customer Phone No.: ".$details[0]['customerPhone'];?></li>
                <li class="list-group-item"><?php echo "Product Name: ".$details[0]['productName'];?></li>
                <li class="list-group-item"><?php echo "Inquiry Type: ".$details[0]['inquiryType'];?></li>
                <li class="list-group-item"><?php echo "Urgency: ".$details[0]['urgency'];?></li>
                <li class="list-group-item">
                    <?php 
                        if($details[0]['status']==1){
                            echo "Status: <b>Open</b>";
                        }
                        if($details[0]['status']==2){
                            echo "Status: <b>Ongoing</b>";
                        }
                        if($details[0]['status']==3){
                            echo "Status: <b>Closed</b>";
                        }
                    ?>
            
                </li>
                <li class="list-group-item">
                    <?php echo "Handled By: ";
                        if($details[0]['userID'] == null){
                            echo "<i>";
                            echo "Not Yet";
                            echo "</i>";
                        }
                        else{
                            echo $adminDetails[0]['userName'];
                        }

                    ?>
                </li>
                <li class="list-group-item"><?php echo "Description: ".$details[0]['description'];?></li>
                
                <li class="list-group-item">Screenshot: <br><?php echo '<img src="'.$details[0]['picturePath'].'" style="width:60%">'; ?> </li>
            </ul>
            
        </div>
        <div class="container">
        <h4>Changelog / Work History</h4>
            <table id="changelog" class='table table-striped table-bordered' cellspacing='0' style="margin-top:3%">
                <thead>
                <tr>
                        <th>Changelog ID</th>
                        <th>Ticket ID</th>
                        <th>Worked By</th>
                        <th>Date Updated</th>
                        <th>Description</th>
                      
				    </tr>
                </thead>
                <tbody>
                <?php 
                    if($changelog == false){
                        echo "<tr>";
                        echo "<td> No Data Yet </td>";
                        echo "</tr>";
                    }
                    else{
                        foreach($changelog as $key => $value){
                            $changeId = $value['changeID'];
                            $ticketId = $value['ticketID'];
                            $workedBy = $value['userID'];
                            $dateUpdated = $value['dateUpdated'];
                            $description = $value['description'];
                            
    
                                    echo "<tr>";
                                    echo "<td>".$changeId."</td>";
                                    echo "<td>".$ticketId."</td>";
                                    echo "<td>".$workedBy."</td>";
                                    echo "<td>".$dateUpdated."</td>";
                                    echo "<td>".$description."</td>";
                                    echo "</tr>";
    
                         }
                    }
                   
                ?>             
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>