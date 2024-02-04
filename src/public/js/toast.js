/* フラッシュメッセージOK・NGの条件分岐 */
$(function () {
    if (loginTtl === '成功') {
        toastr.success(loginMsg, loginTtl);
    } else {
        toastr.error(loginMsg, loginTtl);
    }
});