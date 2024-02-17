// 切替コンテンツの表示
function toggleContent(id) {
    // 全てのコンテンツを非表示にする
    var contents = document.querySelectorAll('.content');
    contents.forEach(function(content) {
        content.classList.remove('active');
    });

    // クリックされたメニューに対応するコンテンツを表示する
    var targetContent = document.getElementById(id);
    targetContent.classList.add('active');

    // プルダウンメニューからの選択値に応じてフォームを送信する
    document.getElementById('sort').addEventListener('change', function() {
        this.form.submit();
    });
}
