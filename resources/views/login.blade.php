<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 w-full">
    <div class="h-screen relative w-full">

        <div class="flex basis-full min-h-screen relative">
            <div
                class="w-1/2 bg-[url(https://www.virajtechnologies.com/assets/img/ecomm.jpg)] bg-cover bg-no-repeat min-h-full xs:hidden tablet:hidden md:hidden  lg:block laptop:block desktop:block 2xl:block 3xl:block 4xl:block">
            </div>
            <div class="laptop:basis-[55%] desktop:basis-[55%] basis-[100%] text-grey-900 flex justify-center m-auto">
                <div class="form">
                    <form
                        class="felx flex-col space-y-10"
                        data-testid="login-form"
                        action="{{ route('login') }}"
                        method="POST"
                    >

                        @csrf
                        <div class="flex justify-center m-auto">
                            <a href="{{ route('welcome') }}">
                                <p class="t text-3xl font-bold">KOMPARAS</p>
                            </a>
                        </div>
                        <div class="flex flex-col space-y-7 w-[400px] laptop:px-0 px-8 ">
                            <div class="flex justify-center m-auto">
                                <h1 class="text-2xl font-bold text-black">Log in</h1>
                            </div>
                            <div class="input-field">
                                <label for="email">Email</label>
                                <input data-testid="email" type="email" name="email" id="email"
                                    placeholder="Enter your email"
                                    class="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md p-2 w-full h-[54px] outline-none"
                                    value="{{ old('email') }}" required />
                            </div>
                            <div class="input-field relative">
                                <label for="password">Password</label>
                                <div class="flex justify-center items-center text-center m-auto">
                                    <input type="password" name="password" id="password" data-testid="password"
                                        placeholder="Enter your password"
                                        class="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md h-[54px] p-2 pr-10 w-full outline-none"
                                        required />
                                    <div class="eye-icon absolute right-0 flex items-center pr-3 cursor-pointer"
                                        data-testid="eye-icon">
                                        <!-- Add your eye icon here -->
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="input-field">
                                <button data-testid="login-button"
                                    class="bg-blue-700 text-white rounded-md p-2 h-[54px] w-full" type="submit">
                                    Login
                                </button>
                                <div class="flex justify-between mt-4">

                                    <a class="text-blue-500 underline" href="{{ route('register') }}">
                                        Don't have an account?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('user') && Session::has('token'))
        <script>
            if("{{ Session::get('user')->role }}" == "admin"){
                window.location.href = "{{ route('register') }}";
            }else{
                window.location.href = "{{ route('welcome') }}";
            }

        </script>
       
    @endif
</body>

</html>
