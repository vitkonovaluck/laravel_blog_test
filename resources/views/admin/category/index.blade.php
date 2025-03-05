@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Категорії</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-4"><a href="{{route('categories.create')}}"
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
                                <th class="col-10">Назва</th>
                                <th class="col-2">Дії</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td class="align-text-top">
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
                                            @include('admin.parts.edit_btn')

                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
