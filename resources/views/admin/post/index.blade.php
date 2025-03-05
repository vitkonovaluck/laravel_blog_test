@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Пости</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-4"><a href="{{route('posts.create')}}"
                                                  class="btn btn-primary">Додати </a></div>
                            <div class="col-8">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-2">Категорія</th>
                                <th class="col-6">Назва</th>
                                <th class="col-1">Дата</th>
                                <th class="col-1">Комент.</th>
                                <th class="col-2">Дії</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->category->title }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at->format('d.m.Y') }}</td>
                                    <td>{{ count($post->comments) }}</td>
                                    <td class="align-text-top">
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">
                                            @include('admin.parts.edit_btn')
                                        </a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                @include('admin.parts.delete_btn')
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
