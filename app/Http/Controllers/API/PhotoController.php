<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            return response()->json([
                'success' => true,
                'results' => Photo::with(['category'])->orderByRaw('priority DESC, id DESC')->where('title', 'like', '%' . $request->search . '%')->paginate(8),
            ]);
        }

        return response()->json([
            'success' => true,
            'results' => Photo::with(['category'])->orderByRaw('priority DESC, id DESC')->paginate(8),
        ]);
    }

    public function show($id)
    {
        $photo = Photo::with(['category'])->where('id', $id)->first();

        if ($photo) {
            return response()->json([
                'success' => true,
                'results' => $photo
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => '404 not found'
            ]);
        }
    }
}
