@props(['post'])

<x-card>
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/post/{{$post->id}}">{{$post->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$post->company}}</div> 
            <x-post-tags :tagsCsv="$post->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid"></i> <a href="{{$post->link}}">{{$post->website}}</a>
            </div>
        </div>
    </div>
</x-card>