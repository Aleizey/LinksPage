<?php

namespace App\Queries;

use App\Models\Channel;
use App\Models\CommunityLink;

class CommunityLinkQuery
{
    public function getByChannel(Channel $channel)
    {
        # To-Do
        $links = $channel->allLink()->where('approved', true)
            ->latest('updated_at')
            ->paginate(10);

        return $links;
    }

    public function getAll()
    {
        # To-Do
        $links = CommunityLink::where('approved', true)->latest('updated_at')->paginate(10);

        return $links;
    }

    public function getMostPopular()
    {
        # To-Do
        $links = CommunityLink::where('approved', true)
            ->withCount("users")
            ->orderBy("users_count", "desc")
            ->paginate(10);

        return $links;
    }

    public function getMostPopularByChannel(Channel $channel)
    {
        # To-Do
        $links = $channel->allLink()->where('approved', true)
            ->withCount("users")
            ->orderBy("users_count", "desc")
            ->paginate(10);

        return $links;
    }

    public function searchTitle(string $search)
    {

        $query = CommunityLink::where("approved", true)->whereAny(["title", "link"], 'LIKE',  "%$search%")->paginate(10);

        return $query;
    }
}

// Pregunta: ¿Qué hace el método orWhere?

// En Laravel, el método orWhere se utiliza en las consultas a la base de datos para agregar condiciones adicionales de tipo "OR" a una consulta. Funciona en combinación con el método where, que añade condiciones tipo "AND".

// Pregunta: ¿Por qué no necestiamos un modelo Profile? ¿En qué situación crees que sería necesario crear un modelo Profile independiente?

// No es necesario un modelo Profile porque la información del perfil del usuario puede guardarse directamente en el modelo User. Laravel utiliza este modelo para gestionar todos los datos asociados al usuario, incluidos los campos extra para el perfil, como la foto.

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Los namespaces en PHP sirven para organizar el código en grupos lógicos, evitar conflictos de nombres entre clases y funciones, facilitar la carga automática de archivos y mejorar la claridad sobre las dependencias de cada clase. En resumen, ayudan a mantener un código más limpio y modular.