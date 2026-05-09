

<?php
// ضبط المنطقة الزمنية لتتوافق مع توقيت اليمن (صنعاء)
date_default_timezone_set('Asia/Aden');

// إعدادات قاعدة البيانات السحابية (استبدلها ببيانات Aiven أو Railway)
$host = 'your-cloud-host.com'; 
$port = '3306';
$dbname = 'digital_top_ten';
$user = 'avnadmin';
$password = 'your_password';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
    
    // تأكيد ضبط توقيت قاعدة البيانات أيضاً
    $pdo->exec("SET time_zone = '+03:00'");

} catch (PDOException $e) {
    die("خطأ في الاتصال: " . $e->getMessage());
}
?>
