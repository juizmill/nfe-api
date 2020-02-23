@component('mail::message')
Olá **{{ $username }}**,

Estamos enviando este email porque foi solicitado a recuperação da sua senha no **{{ config('app.name') }}**

Para continuar com o processo de recuperação da senha basta clicar no botão abaixo.

Caso você não tenha solicitado, basta desconsiderar este email.

@component('mail::button', ['url' => $url, 'color' => 'green'])
Recuperar senha
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
