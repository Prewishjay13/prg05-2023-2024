<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Create a post</h2>
            <p class="mb-4">Post your favorite post!</p>
        </header>

        <form method="POST" action="/posts">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title')}}"/>
                
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" value="{{old('company')}}"/>
                
                @error('company')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="Example: dubstep, electronic, techno" value="{{old('tags')}}"/>
                
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}"/>
                
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" value="{{old('website')}}"/>
                
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>       

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" >{{old('description')}}</textarea>
               
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
            </div>  

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Post Post</button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
    @if(session('message'))
        <p class="text-red-500">{{ session('message') }}</p>
    @endif
</x-layout>