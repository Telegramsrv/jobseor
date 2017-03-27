<p>Телефон: {{ $user->contacts->phone}}</p>
<p>Email: {{ $user->email}}</p>
<a href="{{ route('message.user', [ 'id' => $user->user_id]) }}">Открыть диалог</a>