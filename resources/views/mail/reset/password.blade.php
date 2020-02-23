@component('mail::message')
Olá **{{ $username }}**,

Estamos enviando este email para avisar que a sua senha foi atualiza com sucesso no **{{ config('app.name') }}**

Para acessar o sistema clique no botão abaixo:

@component('mail::button', ['url' => $url, 'color' => 'success'])
    Ir para o Solar
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
