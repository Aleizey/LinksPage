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
}


// Los namespaces en PHP sirven para organizar el código en grupos lógicos, evitar conflictos de nombres entre clases y funciones, facilitar la carga automática de archivos y mejorar la claridad sobre las dependencias de cada clase. En resumen, ayudan a mantener un código más limpio y modular.