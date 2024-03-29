@extends('layouts.app')

@section('content')
    <div class="bg-white py-24 sm:py-32">
        @include('layouts.header')
        <div class="isolate mx-auto max-w-7xl px-6 lg:px-8">
        <div class="isolate mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">From the blog</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.</p>
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

            @foreach ($posts as $post)
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                        @foreach ($post->categories as $category)
                            <a href="/category/{{$category}}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                {{$category}}
                            </a>
                        @endforeach
                        
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="{{route('blog.show', $post->slug)}}">
                            <span class="absolute inset-0"></span>
                            {{$post->title}}
                        </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{Str::words(strip_tags($post->content), 20, '...')}}</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img src="https://ui-avatars.com/api/?name=A+M&color=FFFFFF&background=111827" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                            <a href="/user/{{$post->user->username}}"> <span class="absolute inset-0"></span> {{$post->user->name}} </a>
                        </p>
                        <p class="text-gray-600">{{$post->user->job_title}}</p>
                        </div>
                    </div>
                </article> 
            @endforeach   
    
            <!-- More posts... -->
        </div>
        </div>
    </div>
@endsection