<!DOCTYPE html>
<html>
<head>
    <title>Kết quả thanh toán</title>
    <style>
        .form-container {
            width: 20%; /* Điều chỉnh kích thước của biểu mẫu */
            margin: auto; /* Căn giữa biểu mẫu */
            padding: 20px; /* Thêm đệm xung quanh nội dung trong biểu mẫu */
            background-color: lightblue; /* Màu nền của biểu mẫu */
            border: 1px solid black; /* Đệm xung quanh nội dung trong biểu mẫu */
            border-radius: 10px; /* Đệm xung quanh nội dung trong biểu mẫu */
            box-shadow: 5px 5px 5px #888888; /* Đệm xung quanh nội dung trong biểu mẫu */
        }
        h1{
            text-align: center;
        }
        a{
            text-decoration: none;
            color: black;
            background-color: aqua;
            border: 1px solid black;
            border-radius: 10px;
            box-shadow: 5px 5px 5px #888888;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Kết quả thanh toán</h1>

        @if ($data['vnp_ResponseCode'] == '00')
            <p>Thanh toán thành công!</p>
        @else
            <p>Thanh toán thất bại!</p>
        @endif

        <p>Mã đơn hàng: {{ $data['vnp_TxnRef'] }}</p>
        <p>Số tiền: {{ $data['vnp_Amount']/100 }}</p>
        <p>Nội dung thanh toán: {{ $data['vnp_OrderInfo'] }}</p>
        <p>Mã giao dịch VNPAY: {{ $data['vnp_TransactionNo'] }}</p>
        <p>Mã ngân hàng: {{ $data['vnp_BankCode'] }}</p>
        <a href="{{ route('hoadoncustomer') }}" class="btn btn-primary">Quay lại</a>
    </div>

</body>
</html>
