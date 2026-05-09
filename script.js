
async function sendDataToCloud(productName, productPrice, productQty) {
    const url = 'https://top-ten-backend.onrender.com/save_data.php'; // رابط الـ Web Service الخاص بك
    
    const payload = {
        name: productName,
        price: productPrice,
        qty: productQty
    };

    const response = await fetch(url, {
        method: 'POST',
        body: JSON.stringify(payload),
        headers: { 'Content-Type': 'application/json' }
    });

    const result = await response.json();
    if(result.success) {
        console.log("تم الحفظ في السحابة بنجاح!");
        // هنا يمكنك تحديث الواجهة لإظهار البيانات الجديدة
    }
}
