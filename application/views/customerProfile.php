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
                <h2> My Profile </h2>
                <hr>
                <?php
                    echo '<p>Contact Name   : <br>'.$profileData[0]->customerUsername.'</p>';
                    echo '<p>Email          : '.$profileData[0]->customerEmail.'</p>';
                    echo '<p>Company        : '.$profileData[0]->companyName.'</p>';
                    
                    echo '<a href="'.base_url().'index.php/Main/changePassword/'.$profileData[0]->customerID.'">';
                    echo '<span class="fa fa-pencil"></span>';
                    echo "   Change Password";
                    echo '</a>';
                    
                ?>
            </div>
            <hr>
            <div class="container-expand-lg" style="margin:2%">
                <h3>My Ticket History</h3>
                <hr>
                <table id="history" class='table table-striped table-bordered' cellspacing='0'>
			        <thead>
				    <tr>
                        <th>Token</th>
                        <th>Date Added</th>
                        <th>Title</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Inquiry Type</th>
                        <th>Urgency</th>
                        <th>Status</th>
                        <th>Details and Changes</th>
				    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($ticketData as $key => $value){
                                $token = $value['token'];
                                $dateAdded = $value['dateAdded'];
                                $title = $value['ticketTitle'];
                                $customerName = $value['customerName'];
                                $productName = $value['productName'];
                                $inquiryType = $value['inquiryType'];
                                $urgency = $value['urgency'];
                                $status = $value['status'];

                                echo "<tr>";
                                echo "<td>".$token."</td>";
                                echo "<td>".$dateAdded."</td>";
                                echo "<td>".$customerName."</td>";
                                echo "<td>".$title."</td>";
                                echo "<td>".$productName."</td>";
                                echo "<td>".$inquiryType."</td>";
                                echo "<td>".$urgency."</td>";
                                if($status==1){
                                    echo "<td><b>Open</b></td>";
                                }
                                elseif($status==2){
                                    echo "<td><b>Ongoing</b></td>";
                                }
                                elseif($status==3){
                                    echo "<td><b>Closed</b></td>";
                                }
                                echo '<td><a class="btn btn-primary" name="btnDetail" href="'.base_url().'index.php/Main/ticketDetails/'.$value['ticketID'].'">';
                                echo '<span class="fa fa-info"></span>';
                                echo '   Details';
                                echo '</a></td>';
                                echo "</tr>";

                            }
                        ?>
                    </tbody>
                </table>
            
            </div>
        </div>
</body>

</html>