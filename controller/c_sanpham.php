<?php
include_once ('../model/pager.php');
include_once ('../model/pager1.php');
include '../model/m_sanpham.php';
include_once("../Model/m_admin.php");
	$db=new Databasee;
	$db->connect();
session_start();
if (isset($_GET['action'])) {
		$action=$_GET['action'];
	}
	else
	{
		$action='';
	}

	$thanhcong=array();
	$m_sanpham = new M_sanpham();
	
	$thietbidientu = $m_sanpham->getDMThietBiDienTu();
	$phukiendientu = $m_sanpham->getDMPhuKienDienTu();
	//tiềm kiếm sản phẩm
	if (isset($_POST['submit'])) {
	$key = $_POST['timkiem'];
	$sanpham = $m_sanpham->TimKiem($key);
	$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
	$pagination = new pagination(count($sanpham),$trang_hientai,9,2);
	$paginationHTML = $pagination->showPagination();
	$limit = $pagination->_nItemOnPage;
	$vitri = ($trang_hientai-1)*$limit;
	$sanpham =$m_sanpham->TimKiem($key,$vitri,$limit);
	require_once('../view/user/timkiem.php');
	}

	if (isset($_SESSION['id_user'])) {
	$thongtinuser = $m_sanpham->getUser($_SESSION['id_user']);

}
	switch ($action) {
		case 'phanloai':{
			
			$id_loai = $_GET['id_loai'];
			$danhmucsanpham =$m_sanpham->getSanPhamByIdLoai($id_loai);
			$title = $m_sanpham->getTitlebyId($id_loai);
			//phân trang
			$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($danhmucsanpham),$trang_hientai,9,2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($trang_hientai-1)*$limit;
			$danhmucsanpham =$m_sanpham->getSanPhamByIdLoai($id_loai,$vitri, $limit);
			require_once('../view/user/loaisanpham.php');
			
			break;
		}
		case 'chitiet':{
			$id_sanpham = $_GET['id_sanpham'];
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			$title = $m_sanpham->getTitleId($id_sanpham);
			$sanphamtuongtu = $m_sanpham->getSanPhamTuongTu($chitietsanpham->id_ChiTietLoai);
			$shop = $m_sanpham->getThongTinShop($chitietsanpham->id_User);
			$danhgia = $m_sanpham->getDanhGia($id_sanpham);
			//phân trang danh giá
			$trang_hientai1 =(isset($_GET['page1']))?$_GET['page1']:1;
			$pagination1 = new pagination1(count($danhgia),$trang_hientai1, 5,2);
			$paginationHTML1 = $pagination1->showPagination();
			$limit1 = $pagination1->_nItemOnPage;
			$vitri1 = ($trang_hientai1-1)*$limit1;
			$danhgia = $m_sanpham->getDanhGia($id_sanpham,$vitri1, $limit1);
			//Bình luận
			if (isset($_POST['datcauhoi'])) {
				$id_user = $_SESSION['id_user'];
				$noidung = $_POST['noidungbl'];
				$binhluan = $m_sanpham->insertBinhLuan($noidung, $id_user, $id_sanpham);
				$getid = $m_sanpham->getIdBinhLuan();
				$id_binhluan = $getid->LastID;
				$noidungtraloi = "";
				$id_usertl = $chitietsanpham->id_User;
				$add = $m_sanpham->addIdBinhLuan($noidungtraloi,$id_binhluan,$id_usertl);
			}
			$binhluan = $m_sanpham->getBinhLuan($id_sanpham);

			//phân trang bình luận
			$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($binhluan),$trang_hientai, 5,2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($trang_hientai-1)*$limit;
			$binhluan = $m_sanpham->getBinhLuan($id_sanpham,$vitri, $limit);
			if (isset($_POST['btntraloi'])) {
				$id_traloi = $_POST['idtraloi'];
				$noidungtraloi = $_POST['noidungtl'];
				$traloi = $m_sanpham->answerBinhLuan($id_traloi,$noidungtraloi);
				$binhluan = $m_sanpham->getBinhLuan($id_sanpham);
			}


			require_once('../view/user/chitietsanpham.php');
			break;
		}
		case 'edit1':{
			$id_loai = $_GET['id_loai'];
			$id_sanpham = $_GET['id'];
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			if (isset($_POST['btnluu'])) {
			$tensp = $_POST['tensp'];
			$hinh = $_FILES['ImageUpload'];
			$hinh1 = $_FILES['ImageUpload1'];
			$hinh2 = $_FILES['ImageUpload2'];
			$mota = $_POST['mota'];
			$gia = $_POST['gia'];
			$kho = $_POST['khohang'];
			$thuonghieu = $_POST['thuonghieu'];
			$model1 = $_POST['model1'];
			$bonhotrong = $_POST['bonhotrong'];
			$mang = $_POST['mang'];
			$khecamsim = $_POST['khecamsim'];
			$chongthamnuoc = $_POST['chongthamnuoc'];
			$manhinh = $_POST['manhinh'];
			$hedieuhanh = $_POST['hedieuhanh'];
			$ram = $_POST['ram'];
			$camsau = $_POST['camsau'];
			$camtruoc = $_POST['camtruoc'];
			$gps = $_POST['gps'];
			$blutoo = $_POST['blutoo'];
			$microUSB = $_POST['microUSB'];
			$pin = $_POST['pin'];
			$mau = $_POST['mau'];
			$baohanh = $_POST['baohanh'];

			$chietsanpham = $thuonghieu.$model1.$bonhotrong.$mang.$khecamsim.$chongthamnuoc.$manhinh.$hedieuhanh.$ram.$camsau.$camtruoc.$gps.$blutoo.$microUSB.$pin.$mau.$baohanh;
			$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];
			

			if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
				
				$fileName = $hinh['name'];
				$morong = explode(".", $fileName);
				$duoi = $morong['1'];
				$random_digit=rand(0000,9999);
				$random_digits=rand(0000,9999);
				$new_file_name=$random_digit.$random_digits.'.'.$duoi;
				$img=$new_file_name;
				move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

				$fileName1 = $hinh1['name'];
				$morong1 = explode(".", $fileName1);
				$duoi1 = $morong1['1'];
				$random_digit1=rand(0000,9999);
				$random_digits1=rand(0000,9999);
				$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
				$img1=$new_file_name1;
				move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

				$fileName2 = $hinh2['name'];
				$morong2 = explode(".", $fileName2);
				$duoi2 = $morong2['1'];
				$random_digit2=rand(0000,9999);
				$random_digits2=rand(0000,9999);
				$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
				$img2=$new_file_name2;
				move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
				
				$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
				header('location:c_admin.php?action=list');
			}else if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType)) {
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else{
					if (in_array($hinh2['type'],$allowType)) {
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$img2 = $chitietsanpham->Hinh2;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
					}else{
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
						
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
					}
				}
				
			

		}	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			require_once('../view/user/edit1.php');
			break;
		}
		case 'edit2':{
			$id_loai = $_GET['id_loai'];
			$id_sanpham = $_GET['id'];	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			$chitietsp = $chitietsanpham->ChiTietSanPham;
     			list($thuonghieu1,$baohanh) = explode(':', $chitietsp);
			if (isset($_POST['btnluu'])) {
				$tensp = $_POST['tensp'];
				$hinh = $_FILES['ImageUpload'];
				$hinh1 = $_FILES['ImageUpload1'];
				$hinh2 = $_FILES['ImageUpload2'];
				$mota = $_POST['mota'];
				$gia = $_POST['gia'];
				$kho = $_POST['khohang'];
				$thuonghieu_select = $_POST['thuonghieu_select'];
				$thuonghieu_input = $_POST['thuonghieu_input'];
				if ($thuonghieu_input != $thuonghieu_select) {
					if ($thuonghieu_select != $thuonghieu1) {
						$thuonghieu = $thuonghieu_select;
					}else{
						$thuonghieu = $thuonghieu_input;
					}
				}else{

					$thuonghieu = $thuonghieu1;
				}
				
				$baohanh = $_POST['baohanh'];
				$chietsanpham = $thuonghieu.$baohanh;
				$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];
			

			if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
				
				$fileName = $hinh['name'];
				$morong = explode(".", $fileName);
				$duoi = $morong['1'];
				$random_digit=rand(0000,9999);
				$random_digits=rand(0000,9999);
				$new_file_name=$random_digit.$random_digits.'.'.$duoi;
				$img=$new_file_name;
				move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

				$fileName1 = $hinh1['name'];
				$morong1 = explode(".", $fileName1);
				$duoi1 = $morong1['1'];
				$random_digit1=rand(0000,9999);
				$random_digits1=rand(0000,9999);
				$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
				$img1=$new_file_name1;
				move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

				$fileName2 = $hinh2['name'];
				$morong2 = explode(".", $fileName2);
				$duoi2 = $morong2['1'];
				$random_digit2=rand(0000,9999);
				$random_digits2=rand(0000,9999);
				$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
				$img2=$new_file_name2;
				move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
				
				$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
				header('location:c_admin.php?action=list');
			}else if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType)) {
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else{
					if (in_array($hinh2['type'],$allowType)) {
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$img2 = $chitietsanpham->Hinh2;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
					}else{
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
						
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					// header('location:c_admin.php?action=list');
					}
				}
				
			

		}	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			require_once('../view/user/edit2.php');
			break;
		}
		case 'edit3':{
			$id_loai = $_GET['id_loai'];
			$id_sanpham = $_GET['id'];	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
     		
			if (isset($_POST['btnluu'])) {
				$tensp = $_POST['tensp'];
				$hinh = $_FILES['ImageUpload'];
				$hinh1 = $_FILES['ImageUpload1'];
				$hinh2 = $_FILES['ImageUpload2'];
				$mota = $_POST['mota'];
				$gia = $_POST['gia'];
				$kho = $_POST['khohang'];
				$thuonghieu_select = $_POST['thuonghieu_select'];
				$thuonghieu_input = $_POST['thuonghieu_input'];
				$baohanh = $_POST['baohanh'];
				$id_phukiendt = [12, 14, 15];
				if (in_array($id_loai, $id_phukiendt)) {

					$chitietsp1 = $chitietsanpham->ChiTietSanPham;
     				list($thuonghieu1,$dongmay1,$chatlieu,$chucnang,$baohanh1) = explode(':', $chitietsp1);
     				$dongmay_input = $_POST['dongmay_input'];
     				$dongmay_select = $_POST['dongmay_select'];
     			if ($dongmay_input != $dongmay_select) {
						if ($dongmay_select != $dongmay1) {
							$dongmay = $dongmay_select;
						}else{
							$dongmay = $dongmay_input;
						}
					}else{

						$dongmay = ':'.$dongmay1;
				}
				if ($thuonghieu_input != $thuonghieu_select) {
						if ($thuonghieu_select != $thuonghieu1) {
							$thuonghieu = $thuonghieu_select;
						}else{
							$thuonghieu = $thuonghieu_input;
						}
					}else{

						$thuonghieu = $thuonghieu1;
				}	
				$chatlieu = $_POST['chatlieu'];
				$chucnang = $_POST['chucnang'];
				$ctsanpham = $thuonghieu.$dongmay.$chatlieu.$chucnang.$baohanh;
				}else{
					$chitietsp = $chitietsanpham->ChiTietSanPham;
     				list($thuonghieu1,$baohanh1) = explode(':', $chitietsp);
     				if ($thuonghieu_input != $thuonghieu_select) {
						if ($thuonghieu_select != $thuonghieu1) {
							$thuonghieu = $thuonghieu_select;
						}else{
							$thuonghieu = $thuonghieu_input;
						}
					}else{

						$thuonghieu = $thuonghieu1;
					}
					$ctsanpham = $thuonghieu.$baohanh;
				}
				
				$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];

			if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
				
				$fileName = $hinh['name'];
				$morong = explode(".", $fileName);
				$duoi = $morong['1'];
				$random_digit=rand(0000,9999);
				$random_digits=rand(0000,9999);
				$new_file_name=$random_digit.$random_digits.'.'.$duoi;
				$img=$new_file_name;
				move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

				$fileName1 = $hinh1['name'];
				$morong1 = explode(".", $fileName1);
				$duoi1 = $morong1['1'];
				$random_digit1=rand(0000,9999);
				$random_digits1=rand(0000,9999);
				$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
				$img1=$new_file_name1;
				move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

				$fileName2 = $hinh2['name'];
				$morong2 = explode(".", $fileName2);
				$duoi2 = $morong2['1'];
				$random_digit2=rand(0000,9999);
				$random_digits2=rand(0000,9999);
				$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
				$img2=$new_file_name2;
				move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
				
				$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
				header('location:c_admin.php?action=list');
			}else if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType)) {
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else{
					if (in_array($hinh2['type'],$allowType)) {
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$img2 = $chitietsanpham->Hinh2;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
					}else{
						$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
						
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					// header('location:c_admin.php?action=list');
					}
				}
				
			

		}	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);	
			require_once('../view/user/edit3.php');
			break;
		}
		case 'xoa':{
			$id_sanpham = $_GET['id'];
			$delete = $m_sanpham->deleteSanPham($id_sanpham);
			header('location:c_admin.php?action=list');
			require_once('../view/admin/list.php');
			break;
		}
			
	}








function formatMoney($number, $fractional=false) {  
	    if ($fractional) {  
	        $number = sprintf('%.2f', $number);  
	    }  
	    while (true) {  
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);  
	        if ($replaced != $number) {  
	            $number = $replaced;  
	        } else {  
	            break;  
	        }  
	    }  
	    return $number;  
	}
?>