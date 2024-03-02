function toggleContent(element) {
    // 全てのコンテンツを非表示にする
    var contents = document.querySelectorAll('.content');
    contents.forEach(function(content) {
        content.classList.remove('active');
    });

    // 全てのメニューアイテムから .active クラスを削除する
    var menuItems = document.querySelectorAll('.content__menu');
    menuItems.forEach(function(item) {
        item.classList.remove('active');
    });

    // クリックされたメニューアイテムに .active クラスを追加する
    element.classList.add('active');

    // クリックされたメニューアイテムの data-id 属性を取得する
    var id = element.getAttribute('data-id');

    // クリックされたメニューアイテムに対応するコンテンツを表示する
    var targetContent = document.getElementById(id);
    targetContent.classList.add('active');
}
