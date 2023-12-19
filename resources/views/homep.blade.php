

<div class='w-full px-3 h-fit flex flex-col'>
    <div class='productCard grid desktop:grid-cols-5 laptop:grid-cols-5 tablet:grid-cols-3 grid-cols-2 gap-6 mt-7 mb-7'>
        @foreach ($products as $product)
            <a href="" class='productCard1 min-h-[20rem] h-fit   w-full flex flex-col'>
                <div class='productCard1Img h-[10rem] bg-white w-full'>
                    <img src="{{ $product['image'] }}" alt='product' class='w-full h-full object-cover' />
                </div>
                <div class='productCard1Text  p-2 h-[7rem] bg-gray-400  w-full flex flex-col justify-start text-start items-start'>
                    <p class='productStarsRevew text-center text-xs text-yellow-300'>product Stars</p>
                    <p class='text-stert'>{{ $product['name'] }}</p>
                    <p class='text-start'>From <span class='font-bold'>${{ $product['price'] }}</span> in <span class='font-bold'>5</span> stores</p>
                </div>
            </a>
        @endforeach
    </div>
</div>

