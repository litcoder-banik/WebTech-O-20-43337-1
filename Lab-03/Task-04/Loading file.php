<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           
      </head>  
      <body>  
        <div class="container" style="width:500px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Name</th> 
                               <th>E-mail</th>  
                               <th>User Name</th>   
                               <th>Password</th>   
                               <th>Gender</th>
                               <th>Date of Birth</th>
                          </tr>  
                          <?php   
                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {   
                              echo '<tr>
                               <td>'.$row["name"].'</td>
                               <td>'.$row["email"].'</td>
                               <td>'.$row["username"].'</td>
                               <td>'.$row["password"].'</td>
                               <td>'.$row["gender"].'</td>
                               <td>'.$row["dob"].'</td>
                               </tr>'; 
                                
                          }  
                          ?>  
                     </table>  
                   </div>
                 </div>
      </body>  
 </html>  