<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::orderByRaw('priority DESC, id DESC')->paginate(5);
        return view('admin.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.photos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        //dd($request->all());
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->title, '-');
        $validated['image'] = Storage::put('uploads', $request->image);
        $validated['priority'] = $request->has('priority') ? 1 : 0;

        //dd($validated);
        Photo::create($validated);
        return to_route('admin.photos.index')->with('message', 'Photo added properly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $categories = Category::all();
        return view('admin.photos.edit', compact('photo', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //dd($request->all());

        $validated = $request->validated();

        if ($request->has('image')) {
            if ($photo->image) {
                Storage::delete($photo->image);
            }

            $validated['image'] = Storage::put('uploads', $request->image);
        }

        $validated['priority'] = $request->has('priority') ? 1 : 0;

        $photo->update($validated);
        return to_route('admin.photos.index')->with('message', 'Photo updated properly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        if ($photo->image && !Str::startsWith($photo->image, 'https://')) {
            Storage::delete($photo->image);
        }

        $photo->delete();
        return to_route('admin.photos.index')->with('message', 'Photo deleted properly');
    }
}
