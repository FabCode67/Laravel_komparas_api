<div class='flex z-50 fixed justify-between text-lg font-semibold w-full h-fit p-5 mt-0 laptop:px-12 desktop:px-12 tablet:px-12 px-3 bg-white border-b-2 border-gray-200'>
    <div class='log tablet:text-3xl desktop:text-3xl laptop:text-3xl text-xl'>
        <button class='bg-white'>KOMPARAS</button>
    </div>
    <div class='laptop:flex tablet:flex desktop:flex justify-between space-x-10'>
        <button class='bg-white'>Home</button>
        <button class='bg-white'>About</button>
        <button class='bg-white'>Contact</button>
    </div>
    <div class='laptop:flex tablet:flex desktop:flex justify-between space-x-10'>
        <button class='relative bg-white'>
            <i class="fas fa-heart"></i>
            <span class="icon-badge">9+</span>
        </button>
        <button class='relative bg-white' >
        <span class="icon-badge">1+</span>
            <a href="{{ route('cart') }}"> <i class="fas fa-shopping-cart"></i></a>
        </button>
       <!-- ... other HTML code ... -->
@if(Session::has('user') && Session::has('token'))
    <!-- User is logged in -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class='bg-blue-700 text-white px-2 border rounded-md'>Logout</button>
    </form>
@else
    <!-- User is not logged in -->
    <button class='bg-blue-700 text-white px-2 border rounded-md'>
        <a href="{{ route('login') }}">Login</a>
    </button>
@endif
<!-- ... other HTML code ... -->

    </div>
</div>
