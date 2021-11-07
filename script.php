<?php
    $connect = mysqli_connect("localhost", "root", "", "zadanie"); 
        $message = "Data inserted";     
        $query = '';
            $table_data = '';
            
            $filename = "countries.json";
            
            $data = file_get_contents($filename); 
            
            $array = json_decode($data, true); 
            
            foreach($array as $row) {
  
                $query .= 
                "INSERT INTO panstwa (panstwo) VALUES 
                ('".$row["country"]."'); "; 
               
                $table_data .= '
                <tr>
                    <td>'.$row["country"].'</td>
                </tr>
                ';
            }
  
            if(mysqli_multi_query($connect, $query)) {
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            header('Location: paginacja.php?start=0&p_f=0');
          ?>

