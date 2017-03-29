<h3>Здраствуйте, {{ $recipient->name }}!</h3>
<p> Вам пришло личное сообщение от пользователя {{ $sender->name }}.</p>
<p> Прочитать сообщения можно <a href=" {{ route('message.user', [ 'id' => $sender->user_id]) }}" >тут</a></p>