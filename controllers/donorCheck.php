<?php
        $data = $_POST['json'];
        $innerData = json_decode($data);
        $donation['amount'] = $innerData->amount; 
        $donation['msg'] = $innerData->msg; 

        echo "You have successfully donated ";
        echo $donation['amount'];

?>