<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;

class MoMoController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function online_checkout(Request $request, $hoadon_id)
    {
        $hoadon = HoaDon::find($hoadon_id);

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $hoadon->thanhtien;
        $orderId = time() . "$hoadon_id";
        $redirectUrl = "http://localhost/QL_ChungCy/public/MoMo/redirect";
        $ipnUrl = "http://localhost/QL_ChungCy/public/customer/hoadon";
        $extraData = ""; 
            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result =$this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);
    }

    public function redirect(Request $request)
    {
        // Kiểm tra xem thanh toán có thành công không
        if ($request->resultCode == '0') {
            // Lấy ID hóa đơn từ orderId
            $hoadon_id = substr($request->orderId, 10);

            // Tìm hóa đơn tương ứng trong cơ sở dữ liệu của bạn
            $hoadon = HoaDon::find($hoadon_id);

            // Kiểm tra xem hóa đơn có tồn tại và số tiền thanh toán có đúng không
            if ($hoadon && $hoadon->thanhtien == $request->amount) {
                // Cập nhật tình trạng hóa đơn
                $hoadon->tinhtrang = 1;
                $hoadon->save();
            }
        }

        // Chuyển hướng người dùng về trang hóa đơn
        return redirect()->route('hoadoncustomer');
    }
}
