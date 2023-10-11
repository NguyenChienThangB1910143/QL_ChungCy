<!DOCTYPE html>
<html>
<head>
    <title>Kết quả thanh toán</title>
</head>
<body>
    <h1>Kết quả thanh toán</h1>

    @if ($data['vnp_ResponseCode'] == '00')
        <p>Thanh toán thành công!</p>
    @else
        <p>Thanh toán thất bại!</p>
    @endif

    <p>Mã đơn hàng: {{ $data['vnp_TxnRef'] }}</p>
    <p>Số tiền: {{ $data['vnp_Amount']/100 }}</p>
    <p>Nội dung thanh toán: {{ $data['vnp_OrderInfo'] }}</p>
    <p>Mã phản hồi: {{ $data['vnp_ResponseCode'] }}</p>
    <p>Mã giao dịch VNPAY: {{ $data['vnp_TransactionNo'] }}</p>
    <p>Mã ngân hàng: {{ $data['vnp_BankCode'] }}</p>
    <a href="{{ route('hoadoncustomer') }}" class="btn btn-primary">Quay lại</a>

</body>
</html>
