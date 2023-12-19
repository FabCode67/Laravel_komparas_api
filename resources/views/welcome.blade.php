<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>My App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  @vite('resources/css/app.css')
</head>

<body>

  @include('components.navbar')
  @include('components.home')
  <div
    class="fewDescription w-full flex desktop:flex-row laptop:flex-row tablet:flex-row flex-col laptop:space-y-0 tablet:space-y-0 desktop:space-y-0 space-y-4 laptop:px-24 desktop:px-24 tablet:px-4 px-2  pb-10 laptop:space-x-10 tablet:space-x-5 desktop:space-x-10 space-x-0 text-gray-600 items-center">
    <div
      class='flex flex-col laptop:w-[70%] desktop:w-[70%] tablet:w-[70%] w-full justify-start  shadow-2xl p-6 space-y-5'>
      <div class="text-4xl font-bold">What is Komparas?</div>
      <div class="laptop:text-lg desktop:text-lg tablet:text-base text-sm font-bold">
        Komparas is a website where you can compare prices from different stores. We provide you
        with the best prices and the best quality. <b>Our goals</b> are to provide you with the bes prices and the best
        quality. We also want to
        make your shopping experience easier and more convenient.
      </div>
    </div>
    <div class="buttons laptop:w-[30%] desktop:w-[30%] tablet:w-[30%] w-full shadow-2xl space-y-3 p-3 flex flex-col">
      <p class="text-sm font-bold">Quality is never an accident; it is always the result of high intention, sincere
        effort, intelligent direction and skillful execution; it represents the wise choice of many
        alternatives.</p>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Learn More
      </button>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Contact Us
      </button>
    </div>
  </div>

 

  @include('homep')
  @include('components.footer')
  <script type="module" src="{{ mix('resources/js/home.js') }}"></script>
</body>

</html>