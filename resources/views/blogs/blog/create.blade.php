<x-app-layout class="dark:bg-gray-800">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/">{{ __('Blogs / ') }}</a>
            <a href="/blogs">{{ 'myblogs / ' }}</a>
            {{ ('create') }}
        </h2>
    </x-slot>
<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                        Title
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="title" id="company_website" class="rounded-l-md border  border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="My Blogs">
                    </div>
                </div>
            </div>
            
            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">
                    Blog Text
                </label>
                <div class="mt-1">
                    <textarea id="about" name="body" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Blog"></textarea>
                </div>
            </div>

            <div class="form-group">
                <input id="image" type="file" name="image">
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </div>
</form>
</x-app-layout> 