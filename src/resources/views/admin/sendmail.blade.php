<h3>メール内容</h3>
<p>送信先メールアドレス：{{ $data['email'] }}</p>
<p>件名：{{ $data['subject'] }}</p>
<p>--- 以下メッセージが送信されました ---</p>
<p>{!! nl2br( $data['message'] ) !!}</p>