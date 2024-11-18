<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = new CommunityLinkQuery();

        if (request()->exists('popular')) {
            // Obtener los links más populares
            $links = $query->getMostPopular();

        } else if (request()->exists('search')) {
            // Búsqueda por título o texto
            $links = $query->searchTitle(request()->get('search'));
        } else {
            // Obtener todos los links
            $links = $query->getAll();
        }

        return response()->json($links, 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
