<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            <a href="/">{{ __('Blogs / ') }}</a>
            {{ $blog->title }} 
        </h2>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </x-slot>
    
    <div class="container my-12 mx-auto px-4 md:px-12">
        <!-- component -->
        <!-- This is an example component -->
        <div class="bg-white overflow-auto shadow-none border-b-4 border-r-4 border-gray-400  border-opacity-25 h-auto" >
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
                    <div class="overflow-y-auto md:h-28 sm:h-10 lg:h-60">
                    @foreach ($comments as $comment)
                        <div class="pt-1 pr-5">
                            <div class="text-sm mb-2 flex flex-start items-center">
                                <div v-if="showUserImage">
                                    <a href="#" class="cursor-pointer flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                        src="https://picsum.photos/32/28/?random"
                                        alt="user" />
                                    </a>
                                </div>
                                <p class="font-bold ml-2">
                                @if ($comment->user_id)
                                    <a class="cursor-pointer">{{ $comment->user->name }}:</a>   
                                @else
                                    <a class="cursor-pointer">{{ 'Unknown' }}:</a>   
                                @endif
                                    <span class="text-justify break-all text-gray-700 font-medium ml-1">
                                        {{ $comment->text }}
                                    </span>
                                </p>
                                <div class="pl-24 object-right">
                                @if (!Auth::guest())
                                @if ($comment->user_id == Auth::user()->id || $blog->user_id == Auth::user()->id )
                                <form action="{{ route('blogs.comments.destroy', [$blog->id, $comment->id]) }}" method="post">
                                    <button class="focus:outline-none  relative inline-flex items-center bg-white rounded-full border border-gray-300 px-3 py-0.5 text-sm">
                                        <div class="absolute flex-shrink-0 flex items-center justify-center">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500" aria-hidden="true"></span>
                                        </div>
                                            @csrf 
                                            @method('delete')
                                            <span class="ml-3.5 font-medium text-gray-900"> 🗑 </span>
                                    </button>   
                                </form>
                                @endif
                                @endif
                            </div>
                            </div>
                            
                        </div>
                    @endforeach
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 pl-4">
                        <div class="mb-2">
                            <div class="flex items-center">
                                <span class="mr-3 inline-flex items-center cursor-pointer">
                                    <svg class="text-gray-700 inline-block h-7 w-7 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </span>
                                <span class=" mr-3 inline-flex items-center cursor-pointer focus:outline-none">
                                    <form action="{{ route('blogs.likes.store',$blog->id) }}" method="POST">
                                        @csrf
                                        <div>
                                            {{-- <input class="form-checkbox text-gray-500" type="checkbox" name="like" id="like" value="true"/> --}}
                                            
                                            <button id="button" class="focus:outline-none focus:border-transparent">
                                                <i class="far fa-heart fa-lg text-red-500 focus:outline-none"></i>
                                            </button>
                                        </div>
                                    </form>
                                        {{-- <i class="fas fa-heart fa-lg text-red-500"></i> --}}
                                </span>
                            </div>
                            <a href="{{ url('read/' . $blog->id . '?comments=' . ($limit+5)) }}">
                                <span class="text-gray-600 text-sm font-bold">
                                    Load more   
                                    <span class="text-purple-700 border-l-2 pl-2 border-gray-400">{{ count($likes)}}</span> {{' Likes'  }}
                                </span>
                            </a>
                            <a href="{{ route('blogs.comments.index',$blog->id) }}">
                                <span class="text-gray-600 text-md pr-5 font-bold float-right">
                                    view all
                                </span>
                            </a>
                        </div>
                        <span class="block ml-2 text-xs text-gray-600">{{ $blog->created_at }}</span>
                        
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
            <div class="capitalize text-3xl font-normal pl-2 leading-normal mt-0 mb-2  old  ">
                {{ $blog->title }}
            </div>
            <div class=" text-xl font-normal leading-normal mt-0 mb-2 text-gray-800 text-center whitespace-normal">
                {{ $blog->body }}
            </div>
            <div>
            </div>
        </x-app-layout>
 
        
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("#like").change(function (e) { 
            $("#button").trigger('click');
        });
    });
</script>