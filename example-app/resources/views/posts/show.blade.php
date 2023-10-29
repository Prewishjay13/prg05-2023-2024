<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">

                <h3 class="text-2xl mb-2">{{$post->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$post->company}}</div>
                <x-post-tags :tagsCsv="$post->tags"/>
                <div class="text-xl font-bold mb-4">{{$post->email}}</div>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> <a href="{{$post->link}}">{{$post->website}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Description
                    </h3>
                    <div class="text-lg space-y-5">
                        {{$post->description}}
                    </div>
                </div>
            </div>
        </x-card>


    @if(auth()->check() && auth()->user()->is_admin == 1)
    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/posts/{{$post->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>

        <form method="POST" action="/posts/{{$post->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
    </x-card>
    @endif
    </div>
</x-layout>