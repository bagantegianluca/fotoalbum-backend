@extends('layouts.admin')

@section('content')
    
<header class="py-3 bg-primary">
    <div class="container">
        <h1>New Photo</h1>
    </div>
</header>

<div class="container mt-4">

@include('partials.errors')

    <form action="{{route('admin.photos.store')}}" method="post">
        @csrf
        <div class="mt-3">
            {{-- <label for="title" class="form-label">Title</label> --}}
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                aria-describedby="titlehelper"
                placeholder="Type your title here"
                value="{{old('title')}}"
            />
            <small id="titlehelper" class="form-text text-muted">Title</small>
        </div>
        @error('title')
        <div class="text-danger">{{$message}}</div>
        @enderror

        <div class="mt-3">
            {{-- <label for="description" class="form-label">Description</label> --}}
            <textarea class="form-control" name="description" id="description" placeholder="Type your description here" rows="3">{{old('description')}}</textarea>
            <small id="descriptionhelper" class="form-text text-muted">Description</small>
        </div>
        @error('description')
        <div class="text-danger">{{$message}}</div>
        @enderror

        <div class="mt-3">
            {{-- <label for="image" class="form-label">Upload your image</label> --}}
            <input
                type="file"
                class="form-control"
                name="image"
                id="image"
                placeholder="Upload your image"
                aria-describedby="imageHelper"
                />
                <div id="imageHelper" class="form-text">Upload your image</div>
        </div>
        @error('image')
        <div class="text-danger">{{$message}}</div>
        @enderror

        <div class="mt-3">
            {{-- <label for="Category" class="form-label">Category</label> --}}
            <input
                type="text"
                class="form-control"
                name="category"
                id="category"
                aria-describedby="categoryhelper"
                placeholder="Type your category here"
                value="{{old('category')}}"
            />
            <small id="categoryhelper" class="form-text text-muted">Category</small>
        </div>
        @error('category')
        <div class="text-danger">{{$message}}</div>
        @enderror

        <div class="mt-3 form-check">
            <input class="form-check-input" type="checkbox" value="{{old('priority')}}" id="priority" name="priority"/>
            <label class="form-check-label" for="priority">Priority</label>
        </div>
        @error('priority')
        <div class="text-danger">{{$message}}</div>
        @enderror
        
        <button
            type="submit"
            class="btn btn-primary mt-4"
        >
            Save
        </button>
        

    </form>
</div>

@endsection