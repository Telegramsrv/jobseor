<h4>Здраствуйте!</h4>
<p>Для подтверждения email нажмите
    <a href=" {{ route('email.confirm', [ 'token' => $token]) }}"> тут</a>
    либо перейдите по ссылке {{ route('email.confirm', [ 'token' => $token]) }}</p>