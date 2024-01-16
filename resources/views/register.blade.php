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
<livewire:toasts />
    <div class="h-screen relative w-full">

        <div class="flex basis-full min-h-screen relative">
            <div
                class="w-1/2 bg-[url(https://www.virajtechnologies.com/assets/img/ecomm.jpg)] bg-cover bg-no-repeat min-h-full xs:hidden tablet:hidden md:hidden  lg:block laptop:block desktop:block 2xl:block 3xl:block 4xl:block">
            </div>
            <div class=" laptop:basis-[55%] desktop:basis-[55%] basis-[100%] text-grey-900 flex justify-center m-auto">
                <div class="form w-[80%]">

                <form data-register-url="{{ route('register') }}" class="flex flex-col space-y-10" data-testid="signup-form" id="signupForm" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-center m-auto">
                            <a href="{{ route('welcome') }}">
                                <p class="t text-3xl font-bold">KOMPARAS</p>
                            </a>
                        </div>
                        <div class="flex flex-col space-y-7 w-full laptop:px-0 px-1 ">
                            <div class="flex justify-center m-auto">
                                <h1 class="text-2xl font-bold text-black">Sign in</h1>
                            </div>
                            <div
                                class="w-full flex laptop:flex-row desktop:flex-row tablet:flex-row flex-col justify-between laptop:space-x-6 desktop:space-x-6 tablet:space-x-4 space-x-0  items-center">
                                <div class="laptop:w-1/2 desktop:w-1/2 tablet:w-1/2 w-full flex flex-col space-y-2">
                                    <div class="input-field">
                                        <label htmlFor="first_name">First name</label>
                                        <input data-testid="first_name" type="text" name="first_name" id="first_name"
                                            placeholder="Enter your first name"
                                            class="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md p-2 w-full h-[47px] outline-none"
                                            value="{{ old('first_name') }}" required />
                                    </div>
                                    <div class="input-field">
                                        <label htmlFor="last_name">Last name</label>
                                        <input data-testid="first_name" type="text" name="last_name" id="last_name"
                                            placeholder="Enter your last name"
                                            class="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md p-2 w-full h-[47px] outline-none"
                                            value="{{ old('last_name') }}" required />
                                    </div>
                                    <div class="input-field">
                                        <label htmlFor="email">Email</label>
                                        <input data-testid="first_name" type="email" name="email" id="email"
                                            placeholder="Enter your last name"
                                            class="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md p-2 w-full h-[47px] outline-none"
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
                                                <i class="fas fa-eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-field relative">
                                        <label for="password">Confirm Password</label>
                                        <div class="flex justify-center items-center text-center m-auto">
                                            <input type="password" name="confirm_password" id="confirm_password"
                                                data-testid="confirm_password" placeholder="Confirm your password"
                                                class="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md h-[54px] p-2 pr-10 w-full outline-none"
                                                required />
                                            <div class="eye-icon absolute right-0 flex items-center pr-3 cursor-pointer"
                                                data-testid="eye-icon">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="image laptop:w-1/2 desktop:w-1/2 tablet:w-1/2 laptop:mt-0 tablet:mt-0 desktop:mt-0  mt-2 w-full justify-between flex felx-col space-y-4">
                                    <div class="flex flex-col w-full">
                                        <label class="text-sm mb-1 font-normal text-grey-700 ">
                                            Profile Image
                                        </label>
                                        <div class="imageField flex flex-col text-center items-center justify-center m-auto w-full h-[250px] bg-grey-200 border-2 border-grey-500 rounded-lg relative hover:cursor-pointer"
                                            id="imageField">

                                            <input type="file" accept="image/png, image/jpeg" id="profile_picture"
                                                name="profile_picture" style="display: none;" />
                                            <div class="image-preview"></div>
                                        </div>
                                        <button type="button"
                                            onclick="document.getElementById('profile_picture').click()"
                                            class="bg-blue-700 text-white space-x-3 rounded-md flex justify-center m-auto items-center p-2 h-[47px] mt-5 w-full">
                                            <p>Upload Profile</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="input-field">
                                <button data-testid="login-button"
                                    class="bg-blue-700 text-white rounded-md p-2 h-[54px] w-full" type="submit">
                                    Signup
                                </button>
                                <div class="flex justify-between mt-4">

                                    <a class="text-blue-500 underline" href="{{ route('login') }}">
                                        Already have an account?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="{{ mix('resources/js/signup.js') }}"></script>
</body>

</html>