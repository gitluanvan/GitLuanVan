<?php 
	function swap_two_member($arr) {
	    $slpt = count($arr);
	    //step dung de xac dinh so luong hoan vi, dung dem lam index cho result
	    $step = 0; 
	    $result = array();

	    for ($i=0; $i < $slpt; $i++) {   	
	    	for ($j=$i+1; $j < $slpt; $j++) { 
	    		$temp = array();
	    		$temp[0] = $arr[$i];
	    		$temp[1] = $arr[$j];

	    		$result[$step++] = $temp;
	    	}
	    }
	    return $result;
	}

	function swap_three_member($arr) {
	    $slpt = count($arr);
	    //step dung de xac dinh so luong hoan vi, dung dem lam index cho result
	    $step = 0; 
	    $result = array();

	    for ($i=0; $i < $slpt; $i++) {   	
	    	for ($j=$i+1; $j < $slpt; $j++) {
	    		for ($k=$j+1; $k < $slpt; $k++) { 
	    		 	$temp = array();
		    		$temp[0] = $arr[$i];
		    		$temp[1] = $arr[$j];
		    		$temp[2] = $arr[$k];

		    		$result[$step++] = $temp;
	    		 }    		
	    	}
	    }
	    return $result;
	}
	$cars = array("Volvo", "BMW", "Toyota");
	$cars[3]="ware";
	$tem = swap_three_member($cars);
	echo "<br><br><br><br>";
	foreach ($tem as $key => $value) {
		foreach ($value as $key2 => $value2) {	
			echo $value2.',';
		}
		echo "<br>";
	}
?>