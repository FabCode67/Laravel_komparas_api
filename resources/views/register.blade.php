<!-- resources/views/signup.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-gray-100">

    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full lg:w-1/3">
            <h1 class="text-2xl font-bold mb-6">Sign Up</h1>

            <form action="{{ route('signup.submit') }}" method="post">
                @csrf
                <div className="flex flex-col space-y-7 w-full laptop:px-0 px-1 ">
                                <div className="flex justify-center m-auto">
                                    <h1 className="text-2xl font-bold text-black">Sign in</h1>
                                </div>
                                <div className="w-full flex laptop:flex-row desktop:flex-row tablet:flex-row flex-col justify-between laptop:space-x-6 desktop:space-x-6 tablet:space-x-4 space-x-0  items-center">
                                    <div className="laptop:w-1/2 desktop:w-1/2 tablet:w-1/2 w-full flex flex-col space-y-2">
                                        <div className="input-field">
                                            <label htmlFor="first_name">First name</label>
                                            <input
                                                data-testid="first_name"
                                                type="first_name"
                                                name="first_name"
                                                id="first_name"
                                                placeholder="Enter your first_name"
                                                className="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md p-2 w-full h-[47px] outline-none"
                                            />
                                        </div>
                                        <div className="input-field">
                                            <label htmlFor="last_name">Last name</label>
                                            <input
                                                data-testid="last_name"
                                                type="last_name"
                                                name="last_name"
                                                id="last_name"
                                                placeholder="Enter your Last Name"
                                                className="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md p-2 w-full h-[47px] outline-none"
                                               
                                            />
                                        </div>
                                        <div className="input-field">
                                            <label htmlFor="email">Email</label>
                                            <input
                                                data-testid="email"
                                                type="email"
                                                name="email"
                                                id="email"
                                                placeholder="Enter your email"
                                                className="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md p-2 w-full h-[47px] outline-none"
                                          
                                            />
                                        </div>
                                        <div className="input-field relative">
                                            <label htmlFor="password">Password</label>
                                            <div className="flex justify-center items-center text-center m-auto">
                                                <input
                                                    type="text"
                                                    name="password"
                                                    id="password"
                                                    data-testid="password"
                                                    placeholder="Enter your password"
                                                    className="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md h-[47px] p-2 pr-10 w-full outline-none"
                                                    
                                                />
                                            </div>

                                            </div>
                                            <div className="input-field mt-2 relative">
                                                <label htmlFor="confirm_password">Confirm Password</label>
                                                <div className="flex justify-center items-center text-center m-auto">
                                                    <input
                                                        type=""
                                                        name="confirm_password"
                                                        id="confirm_password"
                                                        data-testid="confirm_password"
                                                        placeholder="Confirm your password"
                                                        className="focus:border border-green-700 bg-grey-200 focus:border-gray-300 rounded-md h-[47px] p-2 pr-10 w-full outline-none"
                                                    
                                                    />
                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="laptop:w-1/2 desktop:w-1/2 tablet:w-1/2 laptop:mt-0 tablet:mt-0 desktop:mt-0  mt-2 w-full justify-between flex felx-col space-y-4">
                                        <div className="flex flex-col w-full">
                                            <label className="text-sm mb-1 font-normal text-grey-700 ">
                                                Profile Image
                                            </label>
                                            
                                                <div className="relative w-full h-[250px]">
                                                    <img
                                                        src={imageUrl}
                                                        width={300}
                                                        height={400}
                                                        alt="Selected Profile"
                                                        className="w-full h-full object-fill rounded-lg"
                                                    />
                                                    <button
                                                        type="button"
                                                        onClick={handleRemoveProfilePicture}
                                                        className="absolute left-2 bottom-2  hover:text-red-700 bg-red-600 cursor-pointer"
                                                    >
                                                        <div className="p-2 bg-error rounded-full">
                                                            <RiDeleteBin6Line className="text-white text-xl  rounded-full  cursor-pointer" />
                                                        </div>{" "}
                                                    </button>
                                                </div>
                                                <div
                                                    className="flex flex-col text-center items-center justify-center m-auto w-full h-[250px] bg-grey-200 border-2  border-grey-500 rounded-lg relative hover:cursor-pointer"
                                                    onClick={handleImageUpload}
                                                >
                                                    <input
                                                        type="file"
                                                        accept="image/png, image/jpeg"
                                                        id="profile_picture"
                                                        name="profile_picture"
                                                        onChange={handleImageChange}
                                                    />
                                                    <div className="absolute flex flex-col gap-5 items-center">
                                                        <UploadSimple
                                                            color="#90A8A2"
                                                            size={22}
                                                        />
                                                        <p className="text-sm text-grey-700">
                                                            Upload Profile
                                                        </p>
                                                    </div>
                                                </div>
                                            <button type="button" className={`bg-blue-700 text-white space-x-3 rounded-md flex justify-center m-auto items-center p-2 h-[47px] mt-5 w-full ${formData?.profile_picture? 'opacity-50 cursor-not-allowed':''}`} onClick={handleImageUpload}
>
                                            <p>Upload Profile</p>
                                            <UploadSimple color="#90A8A2" size={22} />

                                        </button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                <div className="input-field">
                                    <button
                                        data-testid="login-button"

                                        className="bg-blue-700 text-white rounded-md p-2 h-[54px] w-full ${!email || !password || loading ? "

                                        type="submit"
                                    >
                                       
                                            "Signup"
                                      
                                    </button>
                                    <!-- <div className="flex justify-between mt-4 mb-8 laptop:mb-0 desktop:mb-0 tablet:mb-0">
                                        <Link
                                            className="text-blue-500 underline" to={""}>
                                            Forgot Password?
                                        </Link>
                                        <Link
                                            className="text-blue-500 underline" to={"/login"}>
                                            Already have account?
                                        </Link>
                                    </div> -->
                                </div>
                            </div>
            </form>

            <p class="mt-4 text-sm">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
        </div>
    </div>

</body>
</html>
