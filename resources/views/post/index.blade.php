@extends('layouts.main')

@section('content')
    <h1 class="">{{$category}}</h1>
    @foreach($posts as $post)
        <header class="mb-4">
            <!-- Post title-->
            <h2 class="fw-bolder mb-1">{{$post->title}}</h2>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2">Опубліковано: {{$post->created_at->format('d.m.Y')}}
                Категорія: {{$post->category->title}}</div>
        </header>
        <!-- Post content-->
        <section class="mb-5">
            {!! Str::limit(strip_tags($post->content), 200, '...') !!}
            <div class="text-right text-blue-700 mb-6"><a href="{{route('post.show',$post)}}">Читати</a></div>
        </section>

    @endforeach
    {{$posts->links()}}
@endsection
@section('comments')

@endsection
