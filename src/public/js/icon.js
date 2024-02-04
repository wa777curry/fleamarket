/* プロフィールアイコンのプレビュー表示 */
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
        // 既存のアイコンのソースをプレビュー画像に設定
        var existingIcon = document.querySelector('.icon img');
        if (existingIcon) {
            existingIcon.src = reader.result;
        }
        // プレビュー画像を表示
        preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
}