<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit post</h2>
            <p class="mb-4">Edit {{$post->title}}</p>
        </header>

        <form method="POST" action="/posts/{{$post->id}}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$post->title}}"/>
            </div>

            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" placeholder="Example: dubstep, electronic, techno" value="{{$post->company}}"/>
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{$post->tags}}"/>
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$post->email}}"/>
            </div>       

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="website" rows="10" value="{{$post->website}}"></textarea>
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description" value="{{$post->description}}"/>
            </div>   

            <div class="mb-6">
                <button style="background: #44b0d4;" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Edit</button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>