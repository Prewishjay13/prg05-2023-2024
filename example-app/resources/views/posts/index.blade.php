<x-layout>
    
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@foreach ($posts as $post)

@if ($post->status === 1)
                <x-post-card :post="$post"/>
            @endif
   
@endforeach

</div>

<div class="mt-6 p-4">
   
</div>

</x-layout>