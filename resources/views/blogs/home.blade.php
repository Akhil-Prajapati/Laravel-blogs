<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>
    
    <!-- component -->
    <div class="container my-12 mx-auto px-4 md:px-12">
        @if(count($blogs) > 0)
            @foreach ($blogs as $key => $blog)
            <div class="flex h-60 mt-5 flex-row">
                <img src="https://picsum.photos/seed/{{ $key+5 }}/200/300" alt="" class="" >
                <div class="max-w-md w-full lg:flex mb-5" style="display: contents;">
                    {{-- <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url({{ $blog->url }})" title="Woman holding a mug">
                    </div> --}}
                    <div class="border-r border-l-8 border-b w-full border-grey-700 border-opacity-60 lg:border-t lg:border-grey-700 bg-white rounded-b p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            {{-- <p class="text-sm text-grey-dark flex items-center">
                                <svg class="text-grey w-3 h-3 mr-2" xmlns="{{ $blog->url }}" viewBox="0 0 20 20">
                                    <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                </svg>
                                Members only
                            </p> --}}
                            <div class=" capitalize text-black font-bold text-xl mb-2">
                                <a href="{{ url('/read/' . $blog->id) }}">
                                    {{ $blog->title }}
                                </a>
                            </div>
                            <p class="text-grey-darker text-base">{{ $blog->body }}</p>
                        </div>
                        <div class="flex items-center">
                            <img class="w-10 h-10 rounded-full mr-4" src="https://picsum.photos/32/32/?random" alt="Avatar of Jonathan Reinink">
                            <div class="text-sm">
                                <p class="text-black leading-none">{{ $blog->user->name }}</p>
                                <p class="text-grey-dark">{{ $blog->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            @endforeach
            @else
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                
                <!-- Article -->
                <article class="overflow-hidden rounded-lg">
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-indigo-500">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <i class="fas fa-bell" />
                        </span>
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Blogs!   </b>   Sorry system is blind
                        </span>
                        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                            <span>×</span>
                        </button>
                    </div>
                </article>
            </div>    
        @endif
    </div>
</x-app-layout>