<?php

use Illuminate\Support\Facades\Broadcast;

// Canal privado por defecto para usuarios autenticados
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Canal PÚBLICO para la Pantalla Pública
// Al no tener un callback con $user, cualquier navegador puede escuchar sin loguearse.
Broadcast::channel('pantalla-publica', function () {
    return true;
});
