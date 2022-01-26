@component('mail::message')
# Bienvenue sur Pharmacie Kotto

Hey {{$user->profile->first_name}} {{$user->profile->last_name}}, votre compte vien d'être crée.<br>Appuyez le button ci dessous pour l'activer

@component('mail::button', ['url' => route('auth.login')])
Activer mon compte
@endcomponent

Merci,<br>
{{ config('app.name') }}
<br>
Cameroun, Douala
@endcomponent
