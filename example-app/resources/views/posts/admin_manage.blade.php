<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage all posts!
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($posts->isEmpty())
                @foreach($posts as $post)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg" >
                        <a href="/post/{{$post->id}}">
                            {{$post->title}}
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/posts/{{$post->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        @if($post->status)
                            <form method="POST" action="/posts/{{$post->id}}/deactivate">
                                @csrf
                                <button class="text-red-500"><i class="fa-solid fa-toggle-on"></i>Deactivate</button>
                            </form>
                        @else
                            <form method="POST" action="/posts/{{$post->id}}/activate">
                                @csrf
                                <button class="text-green-500"><i class="fa-solid fa-toggle-off"></i>Activate</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-grey-300">
                    <td class="px-4 py-8 border-t border-b border-grey-300 text-lg">
                        <p class="text-center">No posts found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>