<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Blog / ') }}{{ $blog->title }} 
        </h2>
    </x-slot>
    
    <div class="container my-12 mx-auto px-4 md:px-12 ">
        <!-- component -->
        <!-- This is an example component -->
        <div class="bg-white overflow-auto shadow-none border-b-4 border-r-4 border-gray-400  border-opacity-25" >
            <div class="grid grid-cols-3 min-w-full">
                
                <div class="col-span-2 w-full">
                    <img class="w-full max-w-full min-w-full"
                    src="{{ $blog->url }}"
                    alt="Description">
                </div>
                
                <div class="col-span-1 relative pl-4" >
                    <header class="border-b border-grey-400">
                        <a href="#" class="block cursor-pointer py-4 flex items-center text-sm outline-none focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img src="https://picsum.photos/32/32/?random" class="h-9 w-9 rounded-full object-cover"
                            alt="user" />
                            <p class="block ml-2 font-bold">{{ $blog->user->name }}</p>
                        </a>
                    </header>
                    <div>
                    @foreach ($comments->reverse() as $comment)
                        <div class="pt-1">
                            <div class="text-sm mb-2 flex flex-start items-center">
                                <div v-if="showUserImage">
                                    <a href="#" class="cursor-pointer flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                        src="https://picsum.photos/32/31/?random"
                                        alt="user" />
                                    </a>
                                </div>
                                <p class="font-bold ml-2">
                                @if ($comment->user_id)
                                    <a class="cursor-pointer">{{ $comment->user->name }}:</a>   
                                @else
                                    <a class="cursor-pointer">{{ 'Unknown' }}:</a>   
                                @endif
                                    <span class="text-gray-700 font-medium ml-1">
                                        {{ $comment->text }}
                                    </span>
                                </p>
                            </div>
                        </div> 
                    @endforeach
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 pl-4">
                        <div class="pt-4">
                            <div class="mb-2">
                                <div class="flex items-center">
                                    <span class="mr-3 inline-flex items-center cursor-pointer">
                                        <svg class="text-gray-700 inline-block h-7 w-7 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                    </span>
                                </div>
                                <span class="text-gray-600 text-sm font-bold">Typo...</span>
                            </div>
                            <span class="block ml-2 text-xs text-gray-600">{{ $blog->created_at }}</span>
                        </div>
                        
                        <div class="pt-4 pb-1 pr-3">
                            <form action="{{ route('blogs.comments.store',$blog->id) }}" method="POST">
                                @csrf
                                <div class="flex items-start">
                                    <input name="text" class="form-input mt-1 block w-full focus:outline-none border-none" placeholder="Comment">
                                    <button class="mb-2 focus:outline-none border-none bg-transparent text-blue-600">
                                        post
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-span-2 w-full border-2 border-gray-400  border-opacity-25 mt-5 mb-5">
            <div class="capitalize text-2xl font-normal pl-2 leading-normal border-opacity-25 mt-0 mb-2 border-b-2 border-gray-400 ">
                {{ $blog->title }}
            </div>
            <div class=" text-xl font-normal leading-normal mt-0 mb-2 text-gray-800 text-center whitespace-normal">
                {{ $blog->body }}
            </div>
            <div>
            </div>
        </x-app-layout>