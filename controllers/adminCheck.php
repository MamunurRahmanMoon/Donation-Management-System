<?php 

// Ajax Search
if(isset($_POST['donorSearchName'])){

        $donorSearchName = $_POST['donorSearchName'];
        if($donorSearchName != null){
            require_once "../models/donorModel.php";
            $result = searchDonorByUserame($donorSearchName);
            if(mysqli_num_rows($result)>0){
                while($data = mysqli_fetch_assoc($result)){
                    echo "Results:";
                    echo "<tr style='border: 3px solid red;'>";
                    echo "<td>{$data['ID']}</td>";
                    echo "<td>{$data['fullname']}</td>";
                    echo "<td>{$data['username']}</td>";
                    echo "<td>{$data['district']}</td>";
                    echo "<td>{$data['city']}</td>";
                    echo "<td>{$data['phone']}</td>";
                    echo "<td>{$data['email']}</td>";
                    echo "</tr>";
                }
            }
            else{
                echo "Not found your entered data";
            }
        }
        else{
            
        }
}
else if(isset($_POST['requesterSearchName'])){

        $requesterSearchName = $_POST['requesterSearchName'];
        if($requesterSearchName != null){
            require_once "../models/requesterModel.php";
            $result = searchRequesterByUserame($requesterSearchName);
            if(mysqli_num_rows($result)>0){
                while($data = mysqli_fetch_assoc($result)){
                    echo "Results:";
                    echo "<tr style='border: 3px solid red;'>";
                    echo "<td>{$data['ID']}</td>";
                    echo "<td>{$data['fullname']}</td>";
                    echo "<td>{$data['username']}</td>";
                    echo "<td>{$data['district']}</td>";
                    echo "<td>{$data['city']}</td>";
                    echo "<td>{$data['phone']}</td>";
                    echo "<td>{$data['email']}</td>";
                    echo "</tr>";
                }
            }
            else{
                echo "Not found your entered data";
            }
        }
        else{
            
        }
}
?>