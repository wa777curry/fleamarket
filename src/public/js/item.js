/* 出品画像のプレビュー表示 */
function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('imagePreview');

    // 選択されたファイルが存在しない場合はプレビューを非表示にする
    if (!input || !input.files || !input.files[0]) {
        preview.style.display = 'none';
        return;
    }

    // 選択されたファイルを取得し、Blob URLを作成してプレビューに設定する
    var file = input.files[0];
    var reader = new FileReader();
    reader.onload = function() {
        // 既存の画像のソースをプレビュー画像に設定
        var existingItem = document.querySelector('.item img');
        if (existingItem) {
            existingItem.src = reader.result;
        }
        // プレビュー画像を表示
        preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
}