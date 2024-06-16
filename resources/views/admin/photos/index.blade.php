@extends('layouts.admin')

@section('content')

<header class="py-3 bg-primary">
    <div class="container">
        <h1>Photos</h1>
    </div>
</header>

<div class="container mt-3">

    @include('partials.messages')

    <a class="btn btn-primary mb-3" href="{{route('admin.photos.create')}}">{{__('New')}}</a>
    <div
        class="table-responsive-md"
    >
        <table
            class="table table-striped table-hover table-borderless table-secondary align-middle"
        >
            <thead class="table-dark">
                <caption>
                    Photos
                </caption>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Priority</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($photos as $photo)
                <tr class="table-dark">
                    <td scope="row">{{$photo->id}}</td>
                    <td>{{$photo->title}}</td>
                    <td>{{$photo->slug}}</td>
                    <td>{{$photo->description}}</td>
                    <td>
                        @if (Str::startsWith($photo->image, 'https://'))
                        <img width="120" src="{{$photo->image}}" alt="">                            
                        @else
                        <img width="120" src="{{asset('storage/' . $photo->image)}}" alt="">
                        @endif
                    </td>
                    <td>{{$photo->category}}</td>
                    <td>{{$photo->tags}}</td>
                    <td>
                        @if ($photo->priority)
                        <div class="fw-bold text-danger">High</div>
                        @endif
                    </td>
                    <td><a class="btn btn-primary btn-sm" href="{{route('admin.photos.show', $photo)}}">View</a>
                        <a class="btn btn-secondary btn-sm" href="{{route('admin.photos.edit', $photo)}}">Edit</a>

                        @include('admin.photos.partials.delete-modal')


                </tr>
                @empty
                <tr class="table-dark">
                    <td scope="row" colspan="9">No photos in archive</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
    {{$photos->links('vendor.pagination.bootstrap-5')}}
</div>
    
@endsection