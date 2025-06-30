<?php
// status.php

// استقبل البيانات من Payeer
$m_operation_id = $_POST['m_operation_id'];
$m_operation_ps = $_POST['m_operation_ps'];
$m_operation_date = $_POST['m_operation_date'];
$m_operation_pay_date = $_POST['m_operation_pay_date'];
$m_shop = $_POST['m_shop'];
$m_orderid = $_POST['m_orderid'];
$m_amount = $_POST['m_amount'];
$m_curr = $_POST['m_curr'];
$m_desc = $_POST['m_desc'];
$m_status = $_POST['m_status'];
$m_sign = $_POST['m_sign'];

// المفتاح السري من إعدادات Payeer
$secret = 'هنا_حط_المفتاح_السري';

// تحقق من صحة التوقيع
$arHash = array(
    $m_operation_id,
    $m_operation_ps,
    $m_operation_date,
    $m_operation_pay_date,
    $m_shop,
    $m_orderid,
    $m_amount,
    $m_curr,
    $m_desc,
    $m_status,
    $secret
);

$sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));

if ($m_sign == $sign_hash && $m_status == "success") {
    // الدفع ناجح
    // هنا تقدر تحدّث الطلب في قاعدة البيانات مثلاً
    // مثال: تحديث حالة الطلب للمدفوع

    // يجب طباعة "success" وإلا Payeer هيعتبر الدفع فشل!
    echo "success";
} else {
    echo "error";
}
?>
