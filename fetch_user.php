<?php

include('database_connection.php');
echo "<link rel='stylesheet' type='text/css' href='tab.css' />";  
session_start();

$query = "
SELECT * FROM login 
WHERE user_id != '".$_SESSION['user_id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <thead>
 <tr>
  <th width="35%" style="color:000000;font-weight:bold;font-size:25px;font-family: Sofia;text-align: center;">Username</th>
  <th width="35%" style="color:000000;font-weight:bold;font-size:25px;font-family: Sofia;text-align: center;">Status</th>
  <th width="35%" style="color:000000;font-weight:bold;font-size:25px;font-family: Sofia;text-align: center;">Action</th>
 </tr>
 </thead>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span style="color:FFFFFF;font-weight:bold;font-size:20px;font-family: Sofia;" class="label label-success">Online</span>';
 }
 else
 {
  $status = '<span style="color:FFFFFF;font-weight:bold;font-size:20px;font-family: Sofia;" class="label label-danger">Offline</span>';
 }
 $output .= '
 <tr>
  <td style="color:000099;font-weight:bold;font-size:20px;font-family: Sofia;text-align: center;">'.$row['username'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).'</td>
  <td style="text-align: center;">'.$status.'</td>
  <td style="text-align: center;"><button type="button" class="btn btn-info btn-xs start_chat" style="color:FFFFFF;font-weight:bold;font-size:20px;font-family: Sofia;"  data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>