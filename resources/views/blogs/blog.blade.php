<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Blog / ') }}{{ $blog->title }} 
        </h2>
    </x-slot>
    
    <div class="container my-12 mx-auto px-4 md:px-12 ">
        <!-- component -->
        <!-- This is an example component -->
        <div class="bg-white overflow-hidden shadow-none">
            <div class="grid grid-cols-3 min-w-full">

                <div class="col-span-2 w-full">
                    <img class="w-full max-w-full min-w-full"
                        src="{{ $blog->url }}"
                        alt="Description">
                </div>

                <div class="col-span-1 relative pl-4">
                    <header class="border-b border-grey-400">
                        <a href="#" class="block cursor-pointer py-4 flex items-center text-sm outline-none focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img src="https://picsum.photos/32/32/?random" class="h-9 w-9 rounded-full object-cover"
                            alt="user" />
                            <p class="block ml-2 font-bold">{{ $blog->user->name }}</p>
                        </a>
                    </header>

                    <div>
                        <h1 class="text-xl tracking-wide bold  ">
                                {{ $blog->title }}    
                        </h1>
                        <main class="lex items-center justify-between leading-tight p-2 md:p-4">
                            <p>
                                {{ $blog->body }}
                            </p>
                        </main>
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
                            <div class="flex items-start">
                                <input class="form-input mt-1 block w-full focus:outline-none border-none" placeholder="Comment">
                                <button class="mb-2 focus:outline-none border-none bg-transparent text-blue-600">
                                    
                                    post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>