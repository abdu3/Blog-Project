<x-layout>
        @include('_post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
        <x-posts-grid :posts="$posts"/>
        {{$posts->links()}}
        @else
        <p class="text-center"> No posts yet.Please check back later</p>
        @endif
    </main>

</x-layout>











{{--
@extends('layout')

@section('content')

@foreach ($posts as $post )

<article>

    <h2><a href="/post/{{$post->id}}">{{$post->title}}</a></h2>

    <p>  By <a href="/author/{{$post->author->id}}"> {{$post->author->name}} </a> in <a href="/categories/{{$post->Category->id}}">{{$post->Category->name }}</a>  </p>

    <div>{{$post->excerpt}}</div>   <br>
</article>
@endforeach

@endsection --}}
