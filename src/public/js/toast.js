/* フラッシュメッセージOK・NGの条件分岐 */
$(function () {
    if (flashTtl === '成功') {
        toastr.success(flashMsg, flashTtl);
    } else {
        toastr.error(flashMsg, flashTtl);
    }
});