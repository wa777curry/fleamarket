// 変更ボタンのクリックイベントを設定
document.getElementById('changePaymentButton').addEventListener('click', function() {
    // 選択された支払い方法の情報を取得
    var paymentSelect = document.getElementById('paymentSelect');
    var selectedPayment = paymentSelect.options[paymentSelect.selectedIndex].text;

    // 支払い方法の情報を表示する要素を取得し、選択された支払い方法の情報で更新
    var paymentType = document.getElementById('paymentType');
    paymentType.textContent = selectedPayment;
});