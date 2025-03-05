@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Створення поста</h1>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('posts.store')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="category">Категорія</label>
                                <select id="category" class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Назва</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Назва поста" value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="content">Пост</label>
                                <textarea name="content" class="form-control"
                                          id="content">{{ old('content') }}</textarea>

                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-info">Зберегти</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
