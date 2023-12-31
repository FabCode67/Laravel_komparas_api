<div class="w-full flex flex-col min-h-screen">
    <div
        class='singleProduct min-h-screen h-fit laptop:px-20 desktop:px-20 tablet:px-10 px-3 flex  flex-row mt-24 pb-20'>
        <div
            class='flex w-full laptop:flex-row tablet:flex-row flex-col h-fit desktop:space-x-5 tablet:space-x-3 laptop:space-x-5 space-x-0 laptop:space-y-0 desktop:space-y-0 tablet:space-y-0 space-y-3'>
            <div class='laptop:w-[60%] desktop:w-[60%] tablet:w-[60%] w-full  flex-col space-y-8  h-fit'>
                <div class='w-full bg-white rounded-md flex flex-col h-fit pb-10'>
                    <div class='w-full flex flex-col  h-fit p-5 space-y-4'>
                        <h1 class='text-4xl font-bold'>{{ $product['name'] }}</h1>
                        <div class='productRating flex space-x-2 justify-start my-auto items-center'>
                            starts
                            <span class='text-lg text-gray-400'>(4.5)</span>
                        </div>
                        <div class='line w-full h-[1px] bg-blue-700'>
                        </div>
                        <div class='image flex w-full h-[25rem] p-2 rounded-sm'>
                            <img src={{ $product['image'] }}
                                alt='product' class='w-full h-full rounded-sm object-cover' />
                        </div>
                        <div
                            class="relatedPictures flex  w-full justify-center items-center m-auto h-[7rem] space-x-2 p-2">
                            <div key={index} class="w-[7rem] h-full bg-gray-400 rounded-sm">
                                <img src={{ $product['image'] }} alt='product' class='w-full h-full rounded-sm object-cover' /> 
                            </div>
                        </div>
                        <div class='description flex h-[60%] flex-col w-full'>
                            <div class='w-full h-fit'>
                                <div class='w-full flex flex-col h-fit py-5 px-2 space-y-4'>
                                    <h1 class='text-2xl font-bold'>{{ $product['name'] }}</h1>
                                    <p class='text-lg font-medium'>
                                        {{ $product['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="addToCart flex w-full justify-between px-2 mb-10">
                            <button
                                class='py-3 font-semibold text-xl px-4 text-gray-500 border-gray-300 border flex   rounded-md'>Add
                                to
                                wishlist</button>
                            <button
                                class='py-3 font-semibold text-xl px-4 text-white border-gray-300 border flex  bg-blue-700  rounded-md'>Add
                                to cart</button>
                        </div>
                        <h1 class='text-2xl font-bold mt-16 ml-2 pb-4 pt-8'>Full specification</h1>
                        <div class="flex flex-col w-full text-gray-500 px-2">
                            <div class="flex justify-between w-full py-2 border-b-4">
                                <div class="flex w-1/2 font-medium">spec</div>
                                <div class="flex w-1/2">spec</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='laptop:w-[40%] desktop:w-[40%] tablet:w-[40%] w-full h-fit flex flex-col space-y-4'>
                <div class='w-full flex flex-col h-fit'>
                    <table class="rounded shadow w-full">
                        <thead>
                            <tr class="gap-1 px-2 py-6 text-black-1000 font-[400] bg-blue-200">
                                <th class="p-2 py-3 font-[400] text-left">Shop Logo</th>
                                <th class="p-2 py-3 font-[400] text-left">Working hours</th>
                                <th class="p-2 py-3 font-[400] text-left">Address</th>
                            </tr>
                        </thead>
                        
                        <tbody class="bg-white">
                            <tr class="border-b shadow border-grey-800 hover:bg-green-100 hover:cursor-pointer"
                                key={index}>
                                <td
                                    class="md:py-4 xs:py-2 whitespace-nowrap capitalize text-sm font-normal px-2 text-gray-800">
                                    {{ $shop['name'] }}
                                </td>
                                <td
                                    class="md:py-4 xs:py-2 whitespace-nowrap capitalize text-sm font-normal px-2 text-gray-800">
                                    <p class="text-sm font-normal text-gray-800">
                                        {{ $shop['working_hours'] }}
                                    </p>
                                </td>
                                <td
                                    class="md:py-4 xs:py-2 whitespace-nowrap capitalize text-sm font-normal px-2 text-gray-800">
                                    <p class="text-sm font-normal text-gray-800">
                                        Location: {{ $shop['location'] }}
                                    </p>
                                    <p class="text-sm font-normal text-gray-800">
                                        phone: {{ $shop['phone'] }}
                                    </p>
                                    <p class="text-sm font-normal text-gray-800">
                                        email: {{ $shop['email'] }}
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class='font-bold text-xl text-gray-700'>Related products</p>
                <div class='grid laptop:grid-cols-2 desktop:grid-cols-2 tablet:grid-cols-1 phone:grid-cols-2 gap-2'>
            @foreach($categoryProducts as $product)
                    <div ref={drag} class='productCard bg-white rounded-md shadow-md cursor-pointer'>
                        <div class='w-full h-[200px]'>
                            <img src="{{ $product['image'] }}"
                                alt="product" class="w-full h-full rounded-sm object-cover" />
                        </div>
                        <div class='w-full h-[fit] flex flex-col justify-start items-start p-3'>
                            <p class='text-sm font-normal text-gray-800'>
                                <span class='f font-semibold'>Name:</span> {{ $product['name'] }}
                            </p>
                            <p class='text-sm font-normal text-gray-800'>
                                <span class='f font-semibold'>Price:</span> {{ $product['price'] }}
                            </p>
                            <p class='text-sm font-normal text-gray-800'>
                                <span class='f font-semibold'>description:</span> {{ $product['description'] }}
                            </p>
                        </div>
                    </div>
            @endforeach
                </div>
            </div>
        </div>
    </div>
</div>