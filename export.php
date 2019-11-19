<html>
<form class="form-horizontal" action="export.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
                            </div>
                   </div>                    
            </form> 
 </html>

<?php
    include("connect.php");
	session_start();
	//connection string
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}



if(isset($_POST["Export"])){
     
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID',  'TEST_ID', 'MARK', 'TIME'));  
      $query = "SELECT * FROM analysis  ";  
      $result = mysqli_query($conn, $query); 
      
       while ($row = mysqli_fetch_assoc($result))
                   { 
       
           fputcsv($output, $row);  
      }  
      fclose($output);  
 } 
