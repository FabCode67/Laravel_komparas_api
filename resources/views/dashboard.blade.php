<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        main {
            display: flex;
            flex: 1;
        }

        section {
            flex: 1;
            padding: 1rem;
        }
    </style>
</head>

<body>

    <header class="bg-blue-600 text-white flex justify-between">
        <div class="flex items-center w-[15%]">
            <a href="{{ route('welcome') }}">
                <p class="text-3xl font-bold">KOMPARAS</p>
            </a>
        </div>

        <div class="flex items-center w-[20%]">
                <p class="text-xl font-bold">{{ $title }}</p>
        </div>
        
        <div class="flex items-center justify-end float-right space-x-3 w-[65%]">
                <p class="messageIcon text-xl font-bold">
                    <i class="fas fa-envelope"></i>
                </p>
                <p class="notificationIcon text-xl font-bold">
                    <i class="fas fa-bell"></i>
                </p>
                <div class="userProfile  flex w-8 h-8 rounded bg-slate-400">
                    <img
                        src="https://cdn.vectorstock.com/i/1000x1000/51/05/male-profile-avatar-with-brown-hair-vector-12055105.webp"
                        alt="user profile" class="w-full h-full object-cover rounded" />

                </div>
        </div>

    </header>

    <main>
        <aside class="bg-gray-400 w-[15%] flex flex-col">
            <ul class="p-4 flex-col space-y-3">
                <li><a class="dashbordIcon flex space-x-2" href="{{ route('dashboard') }}">
                        <p class="text-xl font-bold">
                            <i class="fas fa-tachometer-alt"></i>
                        </p>
                        <p class="text-xl font-bold">Dashboard</p>
                </a></li>
                <li><a class="usersICon flex space-x-2" href="{{ route('dashboardUsers') }}">
                        <p class="text-xl font-bold">
                            <i class="fas fa-users"></i>
                        </p>
                        <p class="text-xl font-bold">Users</p>
                </a></li>
                <li><a class="productIcon flex space-x-2" href="{{ route('dashboardProducts') }}">
                        <p class="text-xl font-bold">
                            <i class="fas fa-shopping-cart"></i>
                        </p>
                        <p class="text-xl font-bold">Products</p>
                </a></li>
                <li><a class="shopsIcon flex space-x-2" href="{{ route('dashboardShops') }}">
                        <p class="text-xl font-bold">
                            <i class="fas fa-store"></i>
                        </p>
                        <p class="text-xl font-bold">Shops</p>
                </a></li>
                <li><a class="categoriesIcon flex space-x-2" href="{{ route('dashboardCategories') }}">
                        <p class="text-xl font-bold">
                            <i class="fas fa-list"></i>
                        </p>
                        <p class="text-xl font-bold">Categories</p>
                </a></li>
                <li><a class="ordersIcon flex space-x-2" href="{{ route('dashboardOrders') }}">
                        <p class="text-xl font-bold">
                            <i class="fas fa-shopping-bag"></i>
                        </p>
                        <p class="text-xl font-bold">Orders</p>
                </a></li>
                <li><a class="profileICon flex space-x-2 mt-80" href="{{ route('dashboardProfile') }}">
                        <p class="text-xl font-bold">
                            <i class="fas fa-user"></i>
                        </p>
                        <p class="text-xl font-bold">Profile</p>
                </a></li>
                <li><a class="loginIcon flex space-x-2" href="{{ route('login') }}">
                        <p class="text-xl font-bold">
                            <i class="fas fa-sign-out-alt"></i>
                        </p>
                        <p class="text-xl font-bold">Logout</p>
                </a></li>
            </ul>
        </aside>

        <section class="">
            @yield('content')
        </section>
    </main>

</body>

</html>