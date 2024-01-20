<form action="/"  method="GET">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
    <button id="filterButton" class="absolute top-2 right-2 bg-gray-200 p-2 rounded-md cursor-pointer">
            <i class="fa fa-filter text-gray-600">DropDown</i>
        </button>
    <div class="absolute top-4 left-3">
            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search Post"/>
        <div class="absolute top-2 right-2">
            <button style="background:#44b0d4; color: white;" type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                Search
            </button>
        </div>
        <input type="hidden" name="tag" id="tagInput" value="">
        <div class="absolute top-14 left-0 w-full mt-2 bg-white border border-gray-200 rounded-lg hidden" id="dropdownContent">
        <ul class="py-2 px-4">
                @foreach($tags as $tag)
                    <li class="cursor-pointer hover:bg-gray-100">
                        <a href="#" onclick="document.getElementById('tagInput').value = '{{ $tag }}'; document.getElementById('filterForm').submit(); return false;">{{ $tag }}</a>
                    </li>
                @endforeach
            </ul>
    </div>
</div>
</form>