<!-- <?php
$hostname='localhost';
$username='root';
$pass='';
$dbname='shopmultisellerv1';
$conn = mysqli_connect($hostname, $username, $pass, $dbname);
$sql="SELECT * FROM LichSu ";
$LichSu=mysqli_query($conn,$sql);
$swapd=[];
echo 'array Lịch Sử---------------------------------------'.'</br>';
	foreach ($LichSu as $value) {
		$swapd[]=$value['id_Item'];
		echo $value['id'].'  '.':'.' '.$value['id_Item'].'<br/>';
	}
	$ar='';
	// $swapd[]=array("A, C, D","B, E, C","A, B, C, E","B, E");
	echo 'lấy tất cả id sản phẩm bỏ vào array---------------------------------------'.'</br>';
	foreach ($LichSu as $value) {
		$ar.=$value['id_Item'].',';
	}
	$arr=[];
	$tam=[];
	$arr=explode(',', $ar);
	$tam=array_unique($arr);
	foreach ($arr as $value) {
		echo $value.'<br/>';
	}
	echo 'lấy tất cả id sản phẩm không trùng nhau bỏ vào array---------------------------------------'.'</br>';
	foreach ($tam as $value) {
		echo $value.'<br/>';
	}
	echo 'số lần xuất hiện của từng id sảm phẩm trong array trên---------------------------------------------------'.'</br>';
	// echo count($tam);
	$a=[];
	$b=[];
	foreach ($tam as $value) {
		$dem=0;
		if ($value!=0) {
			foreach ($arr as $valuee) {
				if ($value==$valuee) {
					$dem+=1;
				}
			}
			if ($dem!=1) {
				$a[]=$value;
				$b[]=$dem;
			}
			echo $value.':'.$dem.'</br>';
		}
	}
	echo 'loại bỏ phần tử có số lần xuất hiện là 1 trong array trên (*)----------------------------------------------'.'</br>';
	$arb='';
	foreach ($a as $value) {
		$arb.=$value.'<br/>';	
	}
	echo substr($arb, 0,-1).'<br/>';
	echo '----------------số lần xuất hiện----------------------------------------'.'</br>';
	foreach ($b as $value) {
		echo $value.'<br/>';
	}
	echo '---------------------hoán vị array swap (2)(*)-----------------------------------'.'</br>';
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
	function swap_three_member($arrb) {
	    $slpt = count($arrb);
	    //step dung de xac dinh so luong hoan vi, dung dem lam index cho result
	    $step = 0; 
	    $result = array();
	    for ($i=0; $i < $slpt; $i++) {   	
	    	for ($j=$i+1; $j < $slpt; $j++) {
	    		for ($k=$j+1; $k < $slpt; $k++) {  
	    		 	$temp = array();
		    		$temp[0] = $arrb[$i];
		    		$temp[1] = $arrb[$j];
		    		$temp[2] = $arrb[$k];
		    		$result[$step++] = $temp;
	    		 }    		
	    	}
	    }
	    return $result;
	}
	$cars = $a;
	$tem = swap_two_member($cars);
	$swap=[];
	foreach ($tem as $value) {
		$sitem='';
		foreach ($value as $value2) {	
			$sitem.=$value2.',';	
		}
		$sitem=substr($sitem, 0,-1);
		$swap[]= $sitem;
	}
	foreach ($swap as $value) {
		echo $value.'<br/>';
	}
	echo '----------đếm số lần xuất hiện của từng phần tử trong array (*) xuất hiện trong array bên dưới (**)-------------------------------------------------'.'<br/>';
	foreach ($swapd as $value) {
		echo $value.'<br/>';
	}
	echo '-------------------------------số lần xuất hiện của (*) trong (**)---------------------------'.'<br/>';
	$c=[];
	$d=[];
	$ara='';
	foreach ($swap as $value) {
		if ($value!='') {
			$c=explode(',',$value);
			$x='';
			$x=$c[0];
			$y='';
			$y=$c[1];
			$dim=0;
			foreach ($swapd as $value1) {
				$d=explode(',',$value1);
				$e=3;
				$f=4;
				foreach ($d as $key1) {
					if ($x==$key1) {
						$e=1;
					}
				}
				foreach ($d as $key2) {
					if ($y==$key2) {
						$f=1;
					}
				}
				if ($e==$f) {
					$dim+=1;
				}
			}
			if ($dim>1) {
				$ara.=$value.',';
				echo $value.'  xuất hiện '.$dim.' lần';
				echo '<br/>';
			}
		}
	}
	$ar_item=[];
	$ar_item=explode(',', $ara);
	$ar_item=array_unique($ar_item);
	echo '--------------------------------------array sao khi loại bỏ các phần tử trùng nhau-----------------------------------'.'<br/>';
	foreach ($ar_item as $value) {
		echo $value.'<br/>';
	}
	echo '--------------------------------------swap array swap (3)-----------------------------------'.'<br/>';
	$s=[];
	foreach ($ar_item as $values3) {
		$s[]=$values3;
	}
	$tem = swap_three_member($cars);
	$swap=[];
	foreach ($tem as $value) {
		$sitem='';
		foreach ($value as $value2) {	
			$sitem.=$value2.',';	
		}
		$sitem=substr($sitem, 0,-1);
		$swap[]= $sitem;
	}
	foreach ($swap as $value) {
		echo $value.'<br/>';
	}
	echo '----------đếm số lần xuất hiện của từng phần tử trong array swap 3 xuất hiện trong array bên dưới (**)-------------------------------------------------'.'<br/>';
	foreach ($swapd as $value) {
		echo $value.'<br/>';
	}
	echo '-------------------------------số lần xuất hiện của (*) trong (**) là table Luật Kết Hợp cuối cùng---------------------------'.'<br/>';
	$c=[];
	$d=[];
	$ara='';
	foreach ($swap as $value) {
		if ($value!='') {
			$c=explode(',',$value);
			$x='';
			$x=$c[0];
			$y='';
			$y=$c[1];
			$z='';
			$z=$c[2];
			$dim=0;
			foreach ($swapd as $value1) {
				$d=explode(',',$value1);
				$e=3;
				$f=4;
				$g=5;
				foreach ($d as $key1) {
					if ($x==$key1) {
						$e=1;
					}
				}
				foreach ($d as $key2) {
					if ($y==$key2) {
						$f=1;
					}
				}
				foreach ($d as $key3) {
					if ($z==$key3) {
						$g=1;
					}
				}
				if (($e==$f)&&($f==$g)) {
					$dim+=1;
				}
			}
			if ($dim>1){
				$ara.=$value.',';
				echo $value.'  xuất hiện '.$dim.' lần';
				echo '<br/>';
				$lkh_str[]=$value.','.$dim;
				echo '<br>';
			}
		}
	}
	$new_str='';
	$new_count='';
	foreach ($lkh_str as $value) {
		$stl_value=explode(',',$value);
		$step1=$stl_value[0];
		$step2=$stl_value[1];
		$step3=$stl_value[2];
		$step_count=$stl_value[3];
		$new_str.=$step1.':'.$step2.','.$step3.'?'.$step2.':'.$step1.','.$step3.'?'.$step3.':'.$step1.','.$step2.'?';
		$new_count.=$step_count.','.$step_count.','.$step_count.',';
	}
	$stl_step=explode('?',$new_str);
	$str_count=explode(',',$new_count);
	echo '<br/>';
	for ($i=0; $i <count($stl_step)-1 ; $i++) { 
		$arr_key=[];
		$arr_key=explode(':',$stl_step[$i]);
		$ars_key[]=$arr_key[0]; 
		$ars_st[]=$arr_key[1]; 
	}
	for ($i=0; $i <count($str_count)-1 ; $i++) { 
		echo $ars_key[$i].':'.$ars_st[$i];
		echo '->';
		echo $str_count[$i];
		echo '<br/>';
	}
	$ar_key=[];
	$ar_key=array_unique($ars_key);
	foreach ($ar_key as $value) {
		echo $value;
		echo '<br/>';
	}
	echo '<br/>';
	foreach ($ar_key as  $value) {
		$q=[];
		$w=[];
		$e=[];
		for ($j=0; $j <count($ars_key) ; $j++) { 
			if ($value==$ars_key[$j]){
				$q[]=$ars_key[$j];
				$w[]=$ars_st[$j];
				$e[]=$str_count[$j];	 
			}
		}
		for ($i=0; $i < count($e); $i++) { 
			echo $e[$i].'  ';

		}echo '<br/>';
		$max=0;
		for ($i=0; $i < count($q); $i++) { 
			$z_index=0;
			if ($e[$i]>$max) {
				$max=$e[$i];
				$z_index=$i;
			}
		}
		echo $q[$z_index];
		echo ':';
		echo $w[$z_index];
		echo '=';
		echo $max;
		echo '<br/>';
		$sql="SELECT * FROM `luatkethop` WHERE id_Sp='$q[$z_index]'";
		$data=mysqli_query($conn,$sql);
		foreach ($data as  $value) {
			if ($value['id_Sp']==$q[$z_index]) {
				$sql1="UPDATE luatkethop SET id_Sp='$q[$z_index]',Array_LKH='$w[$z_index]',Count='$max'WHERE id_Sp='$q[$z_index]'";
				$query=mysqli_query($conn,$sql1);
			}
			else {
				$sql2="INSERT INTO luatkethop VALUES(NULL,'$q[$z_index]','$w[$z_index]','$max')";
				$LichSu=mysqli_query($conn,$sql2);
			}
		}
	}
	echo '<br/>';
?> -->