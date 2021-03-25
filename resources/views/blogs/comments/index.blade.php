<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            <a href="/">{{ __('Blog / ') }}</a>
            <a href="/read/{{ $blog->id}}">{{ $blog->title }}</a>
            {{ ' / comments' }}
        </h2>
    </x-slot>
<!-- component -->
<div class="bg-white border-t-2 border-gray-200">
    <div class="max-w-xl mx-auto p-8">
        <div class="flow-root">
            <ul class="-mb-8">
                @foreach ($comments as $comment)
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                            <div class="relative flex items-start space-x-3">
                                <div>
                                    <div class="relative px-1">
                                        <img class="h-8 w-8 bg-blue-500 rounded-full ring-8 ring-white flex items-center justify-center" src="https://picsum.photos/32/28/?random" alt="">
                                    </div>
                                </div>
                                <div class="min-w-0 flex-1 py-0">
                                    <div class="text-md text-gray-500">
                                        <div>
                                            @if ($comment->user_id)
                                                <a href="#" class="font-medium text-gray-900 mr-2">{{ $comment->user->name }}:</a>
                                            @else
                                                <a href="#" class="font-medium text-gray-900 mr-2">{{ 'Unknown' }}:</a>
                                            @endif
                                            @if (!Auth::guest())
                                            @if ($comment->user_id == Auth::user()->id || $blog->user_id == Auth::user()->id )
                                                <a href="#" class="my-0.5 relative inline-flex items-center bg-white rounded-full border border-gray-300 px-3 py-0.5 text-sm">
                                                    <div class="absolute flex-shrink-0 flex items-center justify-center">
                                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500" aria-hidden="true"></span>
                                                    </div>
                                                    <form action="{{ route('blogs.comments.destroy', [$blog->id, $comment->id]) }}" method="post">
                                                        @csrf 
                                                        @method('delete')
                                                        <button class="ml-3.5 font-medium text-gray-900">delete</button>
                                                    </form>
                                                </a>   
                                            @endif
                                            @endif
                                        </div>
                                        <span class="whitespace-nowrap text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="mt-2 text-gray-700">
                                        <p>{{ $comment->text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="mt-6 text-base font-semibold text-gray-600 ">Coming soon</li>
            </ul>
        </div>
    </div>
</div>
</x-app-layout>