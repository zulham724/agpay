<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bca/login',function(){
    $response = \Bca::httpAuth();

	// LIHAT HASIL OUTPUT
    // dd($response);
    return response()->json($response);
});

Route::get('/bca/infosaldo/{token}/{accountnumber}',function($token,$accountnumber){
    $res = \Bca::getBalanceInfo($token, [$accountnumber]);
    return response()->json($res);
});

Route::get('/bca/transfer/{token}',function($token){
    // Nilai token yang dihasilkan saat login
	// $token = "MvXPqa5bQs5U09Bbn8uejBE79BjI3NNCwXrtMnjdu52heeZmw9oXgB";

	$amount = '50000.00';

	// Nilai akun bank anda
	$nomorakun = '0201245680';

	// Nilai akun bank yang akan ditransfer
	$nomordestinasi = '0201245681';

	// Nomor PO, silahkan sesuaikan
	$nomorPO = '12345/PO/2017';

	// Nomor Transaksi anda, Silahkan generate sesuai kebutuhan anda
	$nomorTransaksiID = '00000001';

	$res = \Bca::fundTransfers($token,
						$amount,
						$nomorakun,
						$nomordestinasi,
						$nomorPO,
						'Testing Saja Ko',
						'Online Saja Ko',
						$nomorTransaksiID);

	return response()->json($res);
});

Route::get('/bca/mutasi/{token}',function($token){
    // Nilai token yang dihasilkan saat login
	// $token = "4JQQaOqQNPB5w8mfDp42DanLxEKZAhoS7PC2NiNmOKek2AD3NE5OK2";

	// Nilai akun bank anda
	$nomorakun = '0201245680';

	// Tanggal start transaksi anda
	$startdate = '2016-08-29';

	// Tanggal akhir transaksi anda
	$enddate = '2016-09-01';

	$res = \Bca::getAccountStatement($token, $nomorakun, $startdate, $enddate);

    // echo json_encode($response);
    return response()->json($res);
});

Route::get('/bca/getsignature/{token}',function($token){
    $secret = "NILAI-SECRET-ANDA";

	// Nilai token yang dihasilkan saat login
	// $token = "MvXPqa5bQs5U09Bbn8uejBE79BjI3NNCwXrtMnjdu52heeZmw9oXgB";

	$uriSign = "GET:/general/info-bca/atm";

	//Format timestamp harus dalam ISO8601 format (yyyy-MM-ddTHH:mm:ss.SSSTZD)
	$isoTime = "2016-02-03T10:00:00.000+07:00";

	$bodyData = array();

	//nilai body anda disini
	$bodyData['a'] = "BLAAA-BLLLAA";
	$bodyData['b'] = "BLEHH-BLLLAA";

	//ketentuan BCA array harus disort terlebih dahulu
	ksort($bodyData);

	$res = \Bca::generateSign($uriSign, $token, $secret, $isoTime, $bodyData);

    // echo $authSignature;
    return response()->json($res);
});

