<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
class PaymentController extends Controller
{
    public function createPayment(Request $request, $hoadon_id)
    {
        
        $hoadon = HoaDon::find($hoadon_id);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('payment.return');
        $vnp_TmnCode = "C5QOU4ZM";//Mã website tại VNPAY 
        $vnp_HashSecret = "JPYCRFOVQVKJLRAEYOPUAKETUJYUJXRD"; //Chuỗi bí mật

        $vnp_TxnRef = $hoadon_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Hóa đơn test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount =  $hoadon->thanhtien * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        //$vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }
    public function returnPayment(Request $request)
    {
        // Nhận dữ liệu trả về từ VNPAY
        $inputData = array();
        foreach ($request->query() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        // Xác định mã đơn hàng từ dữ liệu trả về
        $order_id = $inputData['vnp_TxnRef'];

        // Tìm đơn hàng trong cơ sở dữ liệu
        $order = HoaDon::find($order_id);

        // Kiểm tra nếu đơn hàng tồn tại
        if ($order) {
            // Cập nhật trạng thái thanh toán
            $order->tinhtrang = 1;
            $order->save();

            // Hiển thị thông tin hóa đơn và kết quả thanh toán
            return view('customer.hoadon.payment_return', ['data' => $request->query()]);
        } else {
            return 'Không tìm thấy đơn hàng';
        }
    }
}