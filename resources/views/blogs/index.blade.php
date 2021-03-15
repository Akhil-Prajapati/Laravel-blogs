<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="container my-12 mx-auto px-4 md:px-12 ">
        <a href="{{ route('blogs.create') }}" class="inline-flex items-center h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
            <span>Create Blog</span>
            <svg class="w-4 h-4 ml-3 fill-current" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        </a>
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <!-- Column -->
            @if(count($blogs) > 0)
                @foreach ($blogs as $blog)
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <a href="#">
                                <img alt="Placeholder" class="block h-auto w-full" src="{{ $blog->url }}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black" href="#">
                                        {{ $blog->title }}
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    {{ $blog->created_at }}
                                </p>
                            </header>
                            <main class="lex items-center justify-between leading-tight p-2 md:p-4">
                                <p>
                                    {{ $blog->body }}
                                </p>
                            </main>
                            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">
                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                    <p class="ml-2 text-sm">
                                        {{ $blog->user->name }}
                                    </p>
                                </a>
                                <form action="{{ route('blogs.destroy' ,$blog->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="no-underline text-grey-darker hover:text-red-dark text-red-600">
                                        <span>Delete</span>
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </form>
                                <a class="no-underline text-grey-darker hover:text-red-dark flote-left" href="{{ route('blogs.edit',  $blog->id ) }}">
                                    <span>Edit</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </footer>

                        </article>
                        <!-- END Article -->
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
            <!-- END Column -->

        </div>
    </div>
</x-app-layout>