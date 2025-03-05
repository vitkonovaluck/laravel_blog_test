@extends('layouts.main')

@section('content')
    <!-- Post content-->
    <article>
        <!-- Post header-->
        <header class="mb-4">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2">Опубліковано: {{$post->created_at->format('d.m.Y')}}
                Категорія: {{$post->category->title}}</div>
        </header>
        <!-- Post content-->
        <section class="mb-5">
            {!! $post->content !!}
        </section>
    </article>
@endsection

@section('comments')
    <!-- Comments section-->
    <section class="mb-5">
        <div class="card bg-light">
            <div class="card-body">
                <!-- Comment form-->
                <form class="mb-4" action="{{route('comment.store',$post)}}" method="post">
                    @csrf
                    <textarea class="form-control" rows="3" name="comment"
                              placeholder="Додайте Ваш коментар!"></textarea>
                    <button class="btn btn-primary" id="button-search" type="submit">Надіслати</button>
                </form>
                @foreach($post->comments as $comment)
                    <!-- Single comment-->
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="ms-3">
                                <div class="fw-bold">{{$comment->created_at}}</div>

                                {{$comment->content}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
{{--<x-index-layout>--}}
{{--    <h2 class="text-4xl font-bold mt-4 mb-2">{{$post->title}}</h2>--}}
{{--    <div class="text-gray-700 mb-4">{{$post->content}}</div>--}}

{{--    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">--}}
{{--        <div class="max-w-2xl mx-auto px-4">--}}
{{--            <div class="flex justify-between items-center mb-6">--}}
{{--                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Коментарі ({{count($post->comments)}})</h2>--}}
{{--            </div>--}}
{{--            <form class="mb-6" action="{{route('comment.store')}}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="hidden" name="post_id" value="{{$post->id}}">--}}
{{--                <div--}}
{{--                    class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">--}}
{{--                    <label for="comment" class="sr-only">Ваш коментар</label>--}}
{{--                    <textarea id="comment"  name="comment" rows="6"--}}
{{--                              class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"--}}
{{--                              placeholder="Напишіть коментар..." required></textarea>--}}
{{--                </div>--}}
{{--                @error('comment') <p style="color: red;">{{ $message }}</p> @enderror--}}
{{--                <button type="submit"--}}
{{--                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-gray-700 bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">--}}
{{--                    Додати коментар--}}
{{--                </button>--}}
{{--            </form>--}}
{{--            @foreach($post->comments as $comment)--}}
{{--            <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">--}}
{{--                <footer class="flex justify-between items-center mb-2">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">--}}
{{--                            </p>--}}
{{--                        <p class="text-sm text-gray-600 dark:text-gray-400">--}}
{{--                            <time pubdate datetime="{{$comment->created_at}}" title="{{$comment->created_at->format('d.m.Y H:i')}}">{{$comment->created_at->format('d.m.Y H:i')}}</time>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </footer>--}}
{{--                <p class="text-gray-500 dark:text-gray-400">{{$comment->content}}</p>--}}
{{--                <div class="flex items-center mt-4 space-x-4">--}}

{{--                </div>--}}

{{--            </article>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}

{{--</x-index-layout>--}}
