<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
include 'db_connect.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data) {
    try {
        // تسجيل العملية مع الوقت الحالي في اليمن
        $current_time = date('Y-m-d H:i:s'); 
        
        $sql = "INSERT INTO sales (item_name, price, quantity, created_at) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['name'], 
            $data['price'], 
            $data['qty'], 
            $current_time
        ]);

        echo json_encode([
            'success' => true, 
            'message' => 'تم الحفظ بنجاح في توقيت: ' . $current_time
        ]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
