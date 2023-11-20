<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Order;
use \App\Models\Order_item;
use \App\Models\vnpay_payments;
use Gloudemans\Shoppingcart\Facades\Cart;
use \App\Models\product;

class CheckoutController extends Controller
{
    public function payment(Request $request)
    {
        $orderId = date('YmdHis');
        $data = $request->all();
        $orderItems = [];
        $order = new Order([
            'id' => $orderId,
            'user_id' => $data['user_id'],
            'address' => $data['address'],
            'name' => $data['fullName'],
            'phone' => $data['phone'],
            'payment_method' => $data['payment_option'],
            'payment_status' => 0,
            'order_status' => 0,
            'tax' => intval(str_replace(',', '', $data['tax'])),
            'sub_total' => intval(str_replace(',', '', $data['sub_total'])),
            'shipping' => intval(str_replace(',', '', $data['shipping'])),
            'amount' => intval(str_replace(',', '', $data['total'])),
            'note' => $data['note'],
        ]);

        foreach ($data['products'] as $value) {
            $product = explode(';', $value);
            $productId = $product[0];
            $orderedQuantity = $product[1];


            // Kiểm tra xem có đủ sản phẩm để giảm quantity hay không
            $availableQuantity = product::where('id', $productId)->value('quantity');

            if ($availableQuantity >= $orderedQuantity) {
                // Giảm quantity của sản phẩm
                product::where('id', $productId)->decrement('quantity', $orderedQuantity);

                // Tạo đối tượng Order_Item và thêm vào mảng $orderItems
                array_push($orderItems, new Order_Item([
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'quantity' => $orderedQuantity,
                    'amount' => $product[2]
                ]));
            } else {
                // Xử lý tình huống khi không đủ sản phẩm
                // Ví dụ: thông báo cho người dùng hoặc xử lý khác tùy thuộc vào yêu cầu của bạn
                dd("không đủ sản phẩm");
            }
        }
        
        
        
        if ($data["payment_option"] == "cod") {
            $order->save();
            foreach ($orderItems as $value) {
                $value->save();
            }
            Cart::instance('cart')->destroy();
            return redirect()->to('order-detail/?id=' . $orderId);
        } else if ($data["payment_option"] == "vnp") {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_ReturnUrl = "http://localhost:8000/handle-vnpay-return";
            $vnp_TmnCode = env('VNP_TMN_CODE');
            $vnp_HashSecret = env('VNP_HASH_SECRET');

            $vnp_TxnRef = $orderId;
            $vnp_OrderInfo = 'Payment order on Bookstore';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = intval(str_replace(',', '', $data['total'])) * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = "";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
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
                "vnp_ReturnUrl" => $vnp_ReturnUrl,
                "vnp_TxnRef" => $vnp_TxnRef
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            // }

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
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00'
                ,
                'message' => 'success'
                ,
                'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                $order->save();
                foreach ($orderItems as $value) {
                    $value->save();
                }
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
    }

    public function handleVNPayReturn(Request $request)
    {
        $data = $request->all();
        $vnp_HashSecret = env('VNP_HASH_SECRET');
        $vnp_SecureHash = $data['vnp_SecureHash'];
        unset($data['vnp_SecureHash']);
        ksort($data);
        $i = 0;
        $hashData = "";

        foreach ($data as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $orderId = $data['vnp_TxnRef'];
        $vnp_Amount = $data['vnp_Amount'] / 100; // Số tiền thanh toán VNPAY phản hồi

        try {
            //Check Orderid    
            //Kiểm tra checksum của dữ liệu
            if ($secureHash == $vnp_SecureHash) {

                if (($data['vnp_ResponseCode'] == '24')) { // payment canceled by customer
                    return redirect()->route('shop.checkout');
                }

                $order = Order::where('id', $orderId)->first();

                if ($order != NULL) {
                    if ($order["amount"] == $vnp_Amount) //Kiểm tra số tiền thanh toán của giao dịch: giả sử số tiền kiểm tra là đúng. //$order["Amount"] == $vnp_Amount
                    {
                        if ($order["payment_status"] !== NULL && $order["payment_status"] === 0) {
                            if ($data['vnp_ResponseCode'] == '00' || $data['vnp_TransactionStatus'] == '00') {
                                $status = 1; // Trạng thái thanh toán thành công
                                $order->update(['payment_status' => $status]);
                            } else {
                                $status = 2; // Trạng thái thanh toán thất bại / lỗi
                                $order->update(['payment_status' => $status]);
                            }
                            $payment = new vnpay_payments([
                                'vnp_Amount' => $data['vnp_Amount'],
                                'vnp_BankCode' => $data['vnp_BankCode'],
                                'vnp_CardType' => $data['vnp_CardType'],
                                'vnp_OrderInfo' => $data['vnp_OrderInfo'],
                                'vnp_PayDate' => $data['vnp_PayDate'],
                                'vnp_ResponseCode' => $data['vnp_ResponseCode'],
                                'vnp_TmnCode' => $data['vnp_TmnCode'],
                                'vnp_TransactionNo' => $data['vnp_TransactionNo'],
                                'vnp_TransactionStatus' => $data['vnp_TransactionStatus'],
                                'vnp_TxnRef' => $data['vnp_TxnRef'],
                                'vnp_SecureHash' => $request->all()['vnp_SecureHash'],
                            ]);

                            $payment->save();
                            $message = 'Payment successful';
                        } else {
                            $message = 'Order already confirmed';
                        }
                    } else {
                        $message = 'invalid amount';
                    }
                } else {
                    $message = 'Order not found';
                }
            } else {
                $message = 'Invalid signature';
            }
        } catch (\Exception $e) {
            $message = 'Unknow error';
        }
        Cart::instance('cart')->destroy();
        return redirect()->route('payment.result.view')->with(['message' => $message, 'order_id' => $orderId]);
    }
}
