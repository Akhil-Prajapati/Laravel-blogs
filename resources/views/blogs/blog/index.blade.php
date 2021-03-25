<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            <a href="/">{{ __('Blogs') }}</a>
            {{ ' / myblogs' }}
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
                            {{ $blog->created_at->diffForHumans() }}
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
                            <button onclick="openModal(true)" class="no-underline text-grey-darker hover:text-red-dark text-red-600">
                                <span>Delete</span>
                            </button>
                        <a class="no-underline text-grey-darker hover:text-red-dark flote-left" href="{{ route('blogs.edit',  $blog->id ) }}">
                            <span>Edit</span>
                        </a>
                    </footer>
                    
                </article>
                
                <!-- END Article -->
            </div>
            <!-- component -->
            <!-- overlay -->
            <div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
                
                <!-- modal -->
                <div id="modal" class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">
                    
                    <!-- button close -->
                    <button 
                    onclick="openModal(false)"
                    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                    &cross;
                </button>
                
                <!-- header -->
                <div class="px-4 py-3 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-600">{{ $blog->title }}</h2>
                </div>
                
                <!-- body -->
                <div class="w-full p-3">
                    are you sure!!
                    you want to delete
                </div>
                
                <!-- footer -->
                <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                    <form action="{{ route('blogs.destroy' ,$blog->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none">
                            <span>Delete</span>
                            <i class="fa fa-heart"></i>
                        </button>
                    </form>
                    <button 
                    onclick="openModal(false)"
                    class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none"
                    >Close</button>
                </div>
            </div>
            <!-- overlay -->
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

<script>
    const modal_overlay = document.querySelector('#modal_overlay');
    const modal = document.querySelector('#modal');
    
    function openModal (value){
        const modalCl = modal.classList
        const overlayCl = modal_overlay
        
        if(value){
            overlayCl.classList.remove('hidden')
            setTimeout(() => {
                modalCl.remove('opacity-0')
                modalCl.remove('-translate-y-full')
                modalCl.remove('scale-150')
            }, 100);
        } else {
            modalCl.add('-translate-y-full')
            setTimeout(() => {
                modalCl.add('opacity-0')
                modalCl.add('scale-150')
            }, 100);
            setTimeout(() => overlayCl.classList.add('hidden'), 300);
        }
    }
</script>