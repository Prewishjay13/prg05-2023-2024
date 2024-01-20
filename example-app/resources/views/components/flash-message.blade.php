@if(session()->has('message'))
    <div style="background: #FF0000;" class="fixed top-0 left-1/2 transform -translate-x-1/2 text-white px-48 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif