<h3>Открытие контактов пользователя!</h3>
<h4>Пользователь: {{ $user->name }}</h4>
<p>Телефон: {{ $user->contacts->phone}}</p>
<p>Email: {{ $user->email}}</p>
<small>Срок действия 24 часа</small>