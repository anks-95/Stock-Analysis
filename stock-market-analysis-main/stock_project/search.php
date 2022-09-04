<?php
    session_start();
   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
       $id= $_GET['search'];
  
       $key="Z2O2KRE0GU9NRX9Y";
       $url="https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=".$id.".BSE&outputsize=full&apikey=".$key;
       $ch=curl_init();
       curl_setopt($ch,CURLOPT_URL,$url);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
       $result=curl_exec($ch);
       curl_close($ch);
       $result=json_decode($result,true);
      
       if(isset($result['Time Series (Daily)'])){
        echo "<table id = 'value' width=100%><Th>".$id."</Th></table><table  id='customers' border='1'><tr><th>Date</th><th>Open</th><th>High</th><th>Low</th><th>close</th><th>volume</th></tr>";
        foreach($result['Time Series (Daily)'] as $key=>$val){
          echo "<tr><td>$key</td><td>".$val['1. open']."</td><td>".$val['2. high']."</td><td>".$val['3. low']."</td><td>".$val['4. close']."</td><td>".$val['5. volume']."</td></tr>";
        }
        echo "</table>";
      }else{
        echo "Something went wrong";
      }
   }

    else{
        $id= $_GET['search'];
        $key="K0EMUZGDKNC1LRYA";
        $url="https://www.alphavantage.co/query?function=TIME_SERIES_MONTHLY_ADJUSTED&symbol=".$id.".BSE&apikey=".$key;
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result=curl_exec($ch);
        curl_close($ch);
        $result=json_decode($result,true);
        if(isset($result['Monthly Adjusted Time Series'])){
        echo "<table id = 'value' width=100%><Th>".$id."</Th></table><table  id='customers' border='1'><tr><th>Date</th><th>Open</th><th>High</th><th>Low</th><th>close</th><th>Adjusted close</th><th>volume</th><th>Dividend amount</th></tr>";
        foreach($result['Monthly Adjusted Time Series'] as $key=>$val){
        echo "<tr><td>$key</td><td>".$val['1. open']."</td><td>".$val['2. high']."</td><td>".$val['3. low']."</td><td>".$val['4. close']."</td><td>".$val['5. adjusted close']."</td><td>".$val['6. volume']."</td><td>".$val['7. dividend amount']."</td></tr>";
         }
        echo "</table>";
        }else{
                echo "Something went wrong";
             }


        }
    ?>

<style>
#value {
    text-align: center;
    padding: 50px;
    margin-top: 2rem;
    margin-bottom: 2rem;
    font-size: 2rem;

}

#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td,
#customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even) {
    background-color: #f2f2f2;
}

#customers tr:hover {
    background-color: #ddd;
}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>