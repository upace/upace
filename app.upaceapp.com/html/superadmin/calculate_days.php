<?php
if(isset($_GET['wk_diff']))
{ 
  
	$_GET['wk_diff']=$_GET['wk_diff']+1;
	function get_days($a,$b)
			{
				$start=strtotime(date($_GET['start_date']));
				$end=strtotime(date($_GET['end_date']));
				$mondays=array();
				$wk=array();
				for ( $date = $start; $date <= $end; $date += 60 * 60 * 24)
				{
					if (strftime('%w', $date) == $a ) 
					{
					   $mondays[] = strftime('%d.%m.%Y', $date);
					}
				}
				foreach($mondays as $k=>$inv_date)
						{
						   if($b==1)
							{
							  $wk[]=$inv_date;
							}
							else if($k==0 || $k%$b==0)
							{
							  $wk[]=$inv_date;
							}
						}
				 return $wk;
			}
			
			
			$main_arr=array();
			
			
			if($_GET['mon']==1)
	        {
			  $mon_days=get_days(1,$_GET['wk_diff']);

			  foreach($mon_days as $mon_inv_arr)
				{
			      array_push($main_arr,$mon_inv_arr);
			    }
			}
			if($_GET['tues']==1)
	        {
			  $tues_days=get_days(2,$_GET['wk_diff']);

			  foreach($tues_days as $tues_inv_arr)
				{
			      array_push($main_arr,$tues_inv_arr);
			    }
			}
			if($_GET['wed']==1)
	        {
			  $wed_days=get_days(3,$_GET['wk_diff']);

			  foreach($wed_days as $wed_inv_arr)
				{
			      array_push($main_arr,$wed_inv_arr);
			    }
			}
			if($_GET['thu']==1)
	        {
			  $thu_days=get_days(4,$_GET['wk_diff']);

			  foreach($thu_days as $thu_inv_arr)
				{
			      array_push($main_arr,$thu_inv_arr);
			    }
			}
			if($_GET['fri']==1)
	        {
			  $fri_days=get_days(5,$_GET['wk_diff']);

			  foreach($fri_days as $fri_inv_arr)
				{
			      array_push($main_arr,$fri_inv_arr);
			    }
			}
			if($_GET['sat']==1)
	        {
			  $sat_days=get_days(6,$_GET['wk_diff']);

			  foreach($sat_days as $sat_inv_arr)
				{
			      array_push($main_arr,$sat_inv_arr);
			    }
			}
			if($_GET['sun']==1)
	        {
			  $sun_days=get_days(0,$_GET['wk_diff']);

			  foreach($sun_days as $sun_inv_arr)
				{
			      array_push($main_arr,$sun_inv_arr);
			    }
			}
			
			
echo $main_str=implode("#",$main_arr);
}
exit;
?>
