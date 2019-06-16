<?php
	session_start();
	include_once("../Model/m_admin.php");
	include_once ('../model/pager.php');
	include('../public/mail/class.smtp.php');
	include "../public/mail/class.phpmailer.php"; 
	include "../public/mail/functions.php"; 
	include '../Model/apriori.php';
	$db=new Databasee;
	$db->connect();
	if (isset($_GET['action'])) {
		$action=$_GET['action'];
	}
	else
	{
		$action='';
	}
	if (!isset($_SESSION['id_user'])) {
		header('location:c_index.php');
	}
	$thanhcong=array();
	$id_user = $_SESSION['id_user'];
	$binhluan = $db->getBinhLuan($id_user);
	$dembinhluan = count($binhluan);
	$tblTable="donhang";
	$data=$db->getAllDataOrder($tblTable);
	$_POST['status_post']=$_GET['action'];
	$key='';
	$key_id='';
	$search_key='';
	foreach ($data as $value) {
		$key=$value['id_Shop'];
		$key=explode(",", $key);
		if (in_array($_SESSION['id_user'], $key)) {	
		$search_key.="'".$value['id_Shop']."'".',';		
	   	}	
	}
	$search_key=substr($search_key, 0,-1);
	$tblTable="donhang";
	$trangthai='Chưa Xác Nhận';
	$datas=$db->getDataOrderAdmin($tblTable,$search_key,$trangthai);
	$demhoadon = count($datas);
	$dem =$dembinhluan + $demhoadon;
	switch ($action) {
		case 'add':{
			if (isset($_POST['add_user'])) {
				$hoten=$_POST['hoten'];
				$namsinh=$_POST['namsinh'];
				$quequan=$_POST['quequan'];

				if($db->InsertData($hoten,$namsinh,$quequan)){
					$thanhcong[]='add_success';
				}
			}

			require_once('../View/admin/add_user.php');
			break;
		}
		case 'edit':{
			require_once('../View/admin/edit_user.php');
			break;
		}
		case 'update_apriori':{
			require_once('../admin/index.php');
			break;
		}		
		case 'apriori':{
			$Apriori = new Apriori();
			$Apriori->setMaxScan(20);       //Scan 2, 3, ...
			$Apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
			$Apriori->setMinConf(75);       //Minimum confidence - Percent 
			$Apriori->setDelimiter(',');    //Delimiter 
			$sql="SELECT * FROM LichSu ";
			$LichSu=$db->getAllHistory($sql);
			$swapd=[];
			// echo 'array Lịch Sử---------------------------------------'.'</br>';
			if ($LichSu!=null) {
				foreach ($LichSu as $value) {
					$swapd[]=$value['id_Item'];
				}
			}
			$str='';
			foreach ($swapd as  $value) {
				$str.='"'.$value.'"'.',';

			}
			$str=substr($str, 0,-1);
			$Apriori->process($swapd);
			$st='';
			$st.=$Apriori->echoContent();
			$st=explode(':', $st);
			$ars_key=[];
			$ars_st=[];
			$str_count=[];
			for ($i=0; $i <count($st)-1 ; $i++) { 
				$ars=explode('=>', $st[$i]);
				//echo $ars[0].'=>'.$ars[1].'<br/>';
				$arrs=explode(',', $ars[0]);
				$arsr=explode('=', $ars[1]);
				foreach ($arrs as $value) {
					$item1=preg_replace('/\s+/', '', $value);
					$item2=preg_replace('/\s+/', '', $arsr[0]);
					$conf=explode('%',preg_replace('/\s+/', '', $arsr[1]));
					$item3=$conf[0];

					$_SESSION['list'][]= array(
						'idsp' =>$item1, 
						'str' =>$item2, 
						'conf' =>$item3
					);
				}
				// echo '-----------------------------------------'.'<br/>';
				
			}
			$ar_list='';
			// if (isset($_SESSION['list'])) {
				
			// }
			foreach ($_SESSION['list'] as  $value) {
				//echo $value['idsp'].'=>'.$value['str'].'='.$value['conf'].'<br/>';
				$ar_list.=$value['idsp'].',';
			}
			$sessTemp = $_SESSION['list'];
			$index_delete = Array();
			// echo '-----------------------------------------'.'<br/>';

			for ($i=0; $i < count($sessTemp); $i++) { 
				for ($j=$i+1; $j < count($sessTemp); $j++){
					if($sessTemp[$i]['idsp']==$sessTemp[$j]['idsp']){
						if($sessTemp[$i]['str']==$sessTemp[$j]['str']){
							if($sessTemp[$i]['conf']==$sessTemp[$j]['conf']){
								array_push($index_delete, $i);
							}elseif($sessTemp[$i]['conf']>$sessTemp[$j]['conf']){
								array_push($index_delete, $j);
							}elseif($sessTemp[$i]['conf']<$sessTemp[$j]['conf']){
								array_push($index_delete, $i);
							}
						}
					}
				}
			}

			//in nhung cai can xoa
			// foreach ($index_delete as $key => $value) {
			// 	echo $value." ";
			// }
			//loc bo nhung phan tu trung
			$index_delete_2 = array_unique($index_delete);

			//xoa
			foreach ($index_delete_2 as $value) {
				unset($sessTemp[$value]);
			}
			//done
			$sql1="DELETE  FROM `luatkethop`";
			$db->insertLKH($sql1);
			$sql5="ALTER TABLE luatkethop AUTO_INCREMENT = 1";		
			$db->insertLKH($sql5);
			if ($sessTemp!=null) {
				foreach ($sessTemp as  $value) {
					//echo $value['idsp'].'=>'.$value['str'].'='.$value['conf'].'<br/>';
					$index=$value['idsp'];
					$index1=$value['str'];
					$index2=$value['conf'];
					$sql2="INSERT INTO luatkethop VALUES(NULL,'$index','$index1','$index2')";
					$query=$db->insertLKH($sql2);
				}
			}
			
			// echo 'cc';
			require_once('../admin/index.php');
			break;
		}
		case 'delete':{
			require_once('../View/admin/delete_user.php');
			break;
		}
		case 'list':{
			$tblTable="sanpham";
			$data=$db->getAllDataLiMit($tblTable,$_SESSION['id_user']);
			//phân trang
			$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($data),$trang_hientai,10,2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($trang_hientai-1)*$limit;
			$data =$db->getAllDataLiMit($tblTable,$_SESSION['id_user'],$vitri, $limit);
			require_once('../view/admin/list.php');
			break;
		}
		case 'index':{
			$tblTable="users";
			$id_user = $_SESSION['id_user'];
			$data=$db->getAllData($tblTable,$_SESSION['id_user']);
			foreach ($data as $value) {
				$hoten = $value['HoTen'];
				$tenshop = $value['TenShop'];
				$diachi = $value['DiaChi'];
				$sdt = $value['SDT'];
				$avatar = $value['Avatar'];
				$anhbia = $value['AnhBia'];
				$banner = $value['Banner'];	
			}
			
				if (isset($_POST['btn_luu'])) {
				$ten_shop = $_POST['tenshop'];
				$dia_chi = $_POST['diachi'];
				$sdt_update = $_POST['sdt'];
				$hinh = $_FILES['ImageUpload'];
				$hinh1 = $_FILES['ImageUpload1'];
				$hinh2 = $_FILES['ImageUpload2'];
				
				$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];
				

				if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/background/'.$img);

					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/avatar/'.$img1);

					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/banner/'.$img2);
					
					$shop = $db->UpdateShop($id_user,$tenshop,$diachi,$sdt_update, $img, $img1, $img2);
					
				}else if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType)) {
						$img2 = $banner;
						$fileName = $hinh['name'];
						$morong = explode(".", $fileName);
						$duoi = $morong['1'];
						$random_digit=rand(0000,9999);
						$random_digits=rand(0000,9999);
						$new_file_name=$random_digit.$random_digits.'.'.$duoi;
						$img=$new_file_name;
						move_uploaded_file($hinh['tmp_name'],'../public/images/background/'.$img);

						$fileName1 = $hinh1['name'];
						$morong1 = explode(".", $fileName1);
						$duoi1 = $morong1['1'];
						$random_digit1=rand(0000,9999);
						$random_digits1=rand(0000,9999);
						$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
						$img1=$new_file_name1;
						move_uploaded_file($hinh1['tmp_name'],'../public/images/avatar/'.$img1);
						$shop = $db->UpdateShop($id_user,$tenshop,$diachi,$sdt_update, $img, $img1, $img2);
						
					}else if (in_array($hinh['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
						$img1 = $avatar;
						$fileName = $hinh['name'];
						$morong = explode(".", $fileName);
						$duoi = $morong['1'];
						$random_digit=rand(0000,9999);
						$random_digits=rand(0000,9999);
						$new_file_name=$random_digit.$random_digits.'.'.$duoi;
						$img=$new_file_name;
						move_uploaded_file($hinh['tmp_name'],'../public/images/background/'.$img);
						$fileName2 = $hinh2['name'];
						$morong2 = explode(".", $fileName2);
						$duoi2 = $morong2['1'];
						$random_digit2=rand(0000,9999);
						$random_digits2=rand(0000,9999);
						$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
						$img2=$new_file_name2;
						move_uploaded_file($hinh2['tmp_name'],'../public/images/banner/'.$img2);
						
						$shop = $db->UpdateShop($id_user,$tenshop,$diachi,$sdt_update, $img, $img1, $img2);
						
					}else if (in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
						$img = $anhbia;
						$fileName1 = $hinh1['name'];
						$morong1 = explode(".", $fileName1);
						$duoi1 = $morong1['1'];
						$random_digit1=rand(0000,9999);
						$random_digits1=rand(0000,9999);
						$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
						$img1=$new_file_name1;
						move_uploaded_file($hinh1['tmp_name'],'../public/images/avatar/'.$img1);

						$fileName2 = $hinh2['name'];
						$morong2 = explode(".", $fileName2);
						$duoi2 = $morong2['1'];
						$random_digit2=rand(0000,9999);
						$random_digits2=rand(0000,9999);
						$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
						$img2=$new_file_name2;
						move_uploaded_file($hinh2['tmp_name'],'../public/images/banner/'.$img2);
						
						$shop = $db->UpdateShop($id_user,$tenshop,$diachi,$sdt_update, $img, $img1, $img2);
						
					}else{
						if (in_array($hinh2['type'],$allowType)) {
						$img = $anhbia;
						$img1 = $avatar;
						$fileName2 = $hinh2['name'];
						$morong2 = explode(".", $fileName2);
						$duoi2 = $morong2['1'];
						$random_digit2=rand(0000,9999);
						$random_digits2=rand(0000,9999);
						$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
						$img2=$new_file_name2;
						move_uploaded_file($hinh2['tmp_name'],'../public/images/banner/'.$img2);
						$shop = $db->UpdateShop($id_user,$tenshop,$diachi,$sdt_update, $img, $img1, $img2);
						
					}else if (in_array($hinh['type'], $allowType)) {
						$img1 = $avatar;
						$img2 = $banner;
						$fileName = $hinh['name'];
						$morong = explode(".", $fileName);
						$duoi = $morong['1'];
						$random_digit=rand(0000,9999);
						$random_digits=rand(0000,9999);
						$new_file_name=$random_digit.$random_digits.'.'.$duoi;
						$img=$new_file_name;
						move_uploaded_file($hinh['tmp_name'],'../public/images/background/'.$img);
						$shop = $db->UpdateShop($id_user,$tenshop,$diachi,$sdt_update, $img, $img1, $img2);
						
					}else if (in_array($hinh1['type'], $allowType)) {
						$img = $anhbia;
						$img2 = $banner;
						$fileName1 = $hinh1['name'];
						$morong1 = explode(".", $fileName1);
						$duoi1 = $morong1['1'];
						$random_digit1=rand(0000,9999);
						$random_digits1=rand(0000,9999);
						$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
						$img1=$new_file_name1;
						move_uploaded_file($hinh1['tmp_name'],'../public/images/avatar/'.$img1);
						$shop = $db->UpdateShop($id_user,$tenshop,$diachi,$sdt_update, $img, $img1, $img2);
						
						}else{
						$img = $anhbia;
						$img1 = $avatar;
						$img2 = $banner;
							
						$shop = $db->UpdateShop($id_user,$tenshop,$diachi,$sdt_update, $img, $img1, $img2);
						
						}
					}
			}
			$data=$db->getAllData($tblTable,$_SESSION['id_user']);
			foreach ($data as $value) {
				$hoten = $value['HoTen'];
				$tenshop = $value['TenShop'];
				$diachi = $value['DiaChi'];
				$sdt = $value['SDT'];
				$avatar = $value['Avatar'];
				$anhbia = $value['AnhBia'];
				$banner = $value['Banner'];	
			}
			require_once('../view/admin/index.php');
			break;
		}
		case 'home':{
			require_once('../View/admin/index.php');
			break;
		}
		case 'order':{
			$tblTable="donhang";
			$data=$db->getAllDataOrder($tblTable);

			$key='';
			$key_id='';
			$search_key='';
			foreach ($data as $value) {
				$key=$value['id_Shop'];
				$key=explode(",", $key);
				if (in_array($_SESSION['id_user'], $key)) {	
				$search_key.="'".$value['id_Shop']."'".',';		
			   	}	
			}
			$search_key=substr($search_key, 0,-1);
			$tblTable="donhang";
			$datas=$db->getDataOrder($tblTable,$search_key);
			require_once('../View/admin/order.php');
			break;
		}
		case 'chitietdonhang':{
			$tblTable="chitietdonhang";
			$dataID=$db->getIdSpAll($tblTable,$_GET['id_donhang']);
			$string='';
			foreach ($dataID as $value) {
				$string.=$value['id_sp'].',';
				$key=substr($string, 0, -1);
            }
            $tblTable="sanpham";
            $dataCart=$db->getKeyCardAll($tblTable,$value['id_sp'],$key);
			require_once('../View/admin/chitietdonhang.php');
			break;
		}
		case 'adminchitietdonhang':{
			$id_donhang = $_GET['id_donhang'];
			$chitietdonhang = $db->getChiTietDonHang($id_donhang);
			require_once('../View/admin/adminchitietdonhang.php');
			break;
		}
		case 'status':{
			if (isset($_POST['save'])) {
				$tblTable="donhang";
				$status1=$_POST['status'];
				$dataID=$db->UpdateStatusOrder($_GET['id'],$_POST['status'],$tblTable);
				
				if ($status1 =='Đã Xác Nhận') {
					$donhang=$db->getDongHang($_GET['id']);
					$id_khachhang = $donhang['id_User'];
					$khachhang = $db->getThongTinKH($id_khachhang);
					foreach ($khachhang as $value) {
						$email = $value['Email'];
						$hoten = $value['HoTen'];
					}
					$test = 'Có có';
					$title = 'Đặt Hàng Thành Công';
					$content = 'Đặt Hàng Thành Công';
					$nTo = $hoten;
					$mTo = $email;
					$diachi = $email;
					$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
				}
			}
			$status=$_POST['status'];
			require_once('../View/admin/status.php');
			break;
		}
		case 'binhluan':{
			$id_user = $_SESSION['id_user'];
			$binhluan = $db->getBinhLuan($id_user);

			require_once('../View/admin/binhluan.php');
			break;
		}
		case 'chuaxacnhan':{
			$tblTable="donhang";
			$data=$db->getAllDataOrder($tblTable);
			$_POST['status_post']=$_GET['action'];
			$key='';
			$key_id='';
			$search_key='';
			foreach ($data as $value) {
				$key=$value['id_Shop'];
				$key=explode(",", $key);
				if (in_array($_SESSION['id_user'], $key)) {	
				$search_key.="'".$value['id_Shop']."'".',';		
			   	}	
			}
			$search_key=substr($search_key, 0,-1);
			$tblTable="donhang";
			$trangthai='Chưa Xác Nhận';
			$datas=$db->getDataOrderAdmin($tblTable,$search_key,$trangthai);
			require_once('../View/admin/order.php');
			break;
		}
		case 'daxacnhan':{
			$tblTable="donhang";
			$data=$db->getAllDataOrder($tblTable);
			$_SESSION['status_post']=$_GET['action'];
			$key='';
			$key_id='';
			$search_key='';
			foreach ($data as $value) {
				$key=$value['id_Shop'];
				$key=explode(",", $key);
				if (in_array($_SESSION['id_user'], $key)) {	
				$search_key.="'".$value['id_Shop']."'".',';		
			   	}	
			}
			$search_key=substr($search_key, 0,-1);
			$tblTable="donhang";
			$trangthai='Đã Xác Nhận';
			$datas=$db->getDataOrderAdmin($tblTable,$search_key,$trangthai);
			require_once('../View/admin/order.php');
			break;
		}
		case 'dangdonggoi':{
			$tblTable="donhang";
			$data=$db->getAllDataOrder($tblTable);
			$_SESSION['status_post']=$_GET['action'];
			$key='';
			$key_id='';
			$search_key='';
			foreach ($data as $value) {
				$key=$value['id_Shop'];
				$key=explode(",", $key);
				if (in_array($_SESSION['id_user'], $key)) {	
				$search_key.="'".$value['id_Shop']."'".',';		
			   	}	
			}
			$search_key=substr($search_key, 0,-1);
			$tblTable="donhang";
			$trangthai='Đang Đóng Gói';
			$datas=$db->getDataOrderAdmin($tblTable,$search_key,$trangthai);
			require_once('../View/admin/order.php');
			break;
		}
		case 'dangvanchuyen':{
			$tblTable="donhang";
			$data=$db->getAllDataOrder($tblTable);
			$_SESSION['status_post']=$_GET['action'];
			$key='';
			$key_id='';
			$search_key='';
			foreach ($data as $value) {
				$key=$value['id_Shop'];
				$key=explode(",", $key);
				if (in_array($_SESSION['id_user'], $key)) {	
				$search_key.="'".$value['id_Shop']."'".',';		
			   	}	
			}
			$search_key=substr($search_key, 0,-1);
			$tblTable="donhang";
			$trangthai='Đang Vận Chuyển';
			$datas=$db->getDataOrderAdmin($tblTable,$search_key,$trangthai);
			require_once('../View/admin/order.php');
			break;
		}
		case 'danggiaohang':{
			$tblTable="donhang";
			$data=$db->getAllDataOrder($tblTable);
			$_SESSION['status_post']=$_GET['action'];
			$key='';
			$key_id='';
			$search_key='';
			foreach ($data as $value) {
				$key=$value['id_Shop'];
				$key=explode(",", $key);
				if (in_array($_SESSION['id_user'], $key)) {	
				$search_key.="'".$value['id_Shop']."'".',';		
			   	}	
			}
			$search_key=substr($search_key, 0,-1);
			$tblTable="donhang";
			$trangthai='Đang Giao Hàng';
			$datas=$db->getDataOrderAdmin($tblTable,$search_key,$trangthai);
			require_once('../View/admin/order.php');
			break;
		}
		case 'dagiaohang':{
			$tblTable="donhang";
			$data=$db->getAllDataOrder($tblTable);
			$_SESSION['status_post']=$_GET['action'];
			$key='';
			$key_id='';
			$search_key='';
			foreach ($data as $value) {
				$key=$value['id_Shop'];
				$key=explode(",", $key);
				if (in_array($_SESSION['id_user'], $key)) {	
				$search_key.="'".$value['id_Shop']."'".',';		
			   	}	
			}
			$search_key=substr($search_key, 0,-1);
			$tblTable="donhang";
			$trangthai='Đã Giao Hàng';
			$datas=$db->getDataOrderAdmin($tblTable,$search_key,$trangthai);
			require_once('../View/admin/order.php');
			break;
		}
		case 'bituchoi':{
			$tblTable="donhang";
			$data=$db->getAllDataOrder($tblTable);
			$_SESSION['status_post']=$_GET['action'];
			$key='';
			$key_id='';
			$search_key='';
			foreach ($data as $value) {
				$key=$value['id_Shop'];
				$key=explode(",", $key);
				if (in_array($_SESSION['id_user'], $key)) {	
				$search_key.="'".$value['id_Shop']."'".',';		
			   	}	
			}
			$search_key=substr($search_key, 0,-1);
			$tblTable="donhang";
			$trangthai='Từ Chối';
			$datas=$db->getDataOrderAdmin($tblTable,$search_key,$trangthai);
			require_once('../View/admin/order.php');
			break;
		}
			
		default:{
			require_once('../View/admin/list.php');
			break;
		}
	}
	
?>