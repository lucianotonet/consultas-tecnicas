Olá {{ $user->name }}.
Clique aqui para configurar uma nova senha: {{ url('password/reset/'.$token) }}