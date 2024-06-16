@extends('layouts.admin')

@section('content')

<header class="py-3 bg-primary">
    <div class="container">
        <h1>Photo {{$photo->id}} - {{$photo->title}}</h1>
    </div>
</header>

<div class="container mt-3">
    <a class="btn btn-primary mb-3" href="{{route('admin.photos.index')}}">{{__('Back to photos')}}</a>
    <div class="row">
        <div class="col">
            @if (Str::startsWith($photo->image, 'https://'))
            <img width="100%" src="{{$photo->image}}" alt="">                            
            @else
            <img width="100%" src="{{asset('storage/' . $photo->image)}}" alt="">
            @endif
        </div>
        <div class="col">
            <p><strong>Id: </strong>{{$photo->id}}</p>
            <p><strong>Title: </strong>{{$photo->title}}</p>
            <p><strong>Slug: </strong>{{$photo->slug}}</p>
            <p><strong>Description: </strong>{{$photo->description}}</p>
            <p><strong>Category: </strong>{{$photo->category}}</p>
            <p><strong>Tags: </strong>{{$photo->tags}}</p>
            <p><strong>Priority: </strong>{{$photo->priority}}</p>
        </div>
    </div>
</div>
    
@endsection