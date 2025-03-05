@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Редагування категорії</h1>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('categories.update',$category->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group  mb-3">
                                <label for="category">Назва</label>
                                <input type="text" name="title" class="form-control" id="category"
                                       placeholder="Назва категорії" value="{{$category->title}}" l>
                                @error('title')
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
