<?php 

$month = date('m');
$year = date('Y');

$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);

$end_time = strtotime("+1 month", $start_time);

for($i=$start_time; $i<$end_time; $i+=86400)
{
   $current_month[] = date('d-m-Y', $i);
}

?>