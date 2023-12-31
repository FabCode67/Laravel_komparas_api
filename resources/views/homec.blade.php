<div class="categoriesHorizontalMenu
    w-full
    h-fit
    flex
    flex-row
    justify-between
    items-center
    px-3
    mt-3
    
    overflow-x-scroll
    scrollbar-hide
    ">
    <a href="" class="categoryCard w-[10rem] h-[10rem] flex flex-col items-center justify-center">
        <p class="categoryCardText text-center text-sm font-bold">All</p>
    </a>
    @foreach($products as $cat)
    <a href="" class="categoryCard w-[10rem] h-[10rem] flex flex-col items-center justify-center">
        <p class="categoryCardText text-center text-sm font-bold">{{ $cat['name'] }}</p>
    </a>
    @endforeach
</div>