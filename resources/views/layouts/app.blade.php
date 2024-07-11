<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css', 'resources/js/zipcodesfunctions.js')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
</head>
<body class="bg-bgColor">
    <header class="border-b bg-purpleColor shadow">
        <div class="container mx-auto flex justify-end items-center">
            <nav class="flex gap-2 items-center">
                <div class="relative inline-block text-left dropdown">
                    <div class="inline-flex justify-center items-center rounded-[25px] bg-white bg-opacity-10 text-chico text-white hover:bg-gray-50 hover:bg-opacity-30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-2 py-1">
                        EN
                        <svg class="ml-1 -mr-1 h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <polygon points="10 15 5 10 15 10" />
                        </svg>
                    </div>
                    <ul class="absolute right-0 mt-2 w-28 rounded-md shadow-lg bg-white bg-opacity-20 ring-1 ring-black ring-opacity-5 focus:outline-none dropdown-menu">
                        <li class="py-1"><a href="#" class="block px-4 py-2 text-chico text-gray-700 hover:bg-gray-100">ES</a></li>
                        <li class="py-1"><a href="#" class="block px-4 py-2 text-chico text-gray-700 hover:bg-gray-100">FR</a></li>
                    </ul>
                </div>
                <div class="relative inline-block text-left">
                    <div class="inline-flex justify-center items-center rounded-[25px] bg-white bg-opacity-10 text-xs text-white hover:bg-gray-50 hover:bg-opacity-30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-3 py-1">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>
                <div class="relative inline-block text-left">
                    <div class="inline-flex justify-center items-center rounded-[25px] bg-white bg-opacity-10 text-xs text-white hover:bg-gray-50 hover:bg-opacity-30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-3 py-1">
                        <i class="fas fa-question-circle"></i>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mx-auto flex justify-start pt-5 ps-10">
        <img src="{{asset('img/LogoHB_Spelled.svg')}}" alt="Health">
    </div>
    <div class="md:flex md:justify-evenly mt-5">
        <div class="md:w-8/12">
            <img src="{{asset('img/Splash-01-FULL@2x.png')}}" alt="Health">
        </div>
        <div class="md:w-8/12 mt-10 flex flex-col">
            <div class="w-[441px]">
                <p class="font-bold text-purpleColor text-2xl pl-44 font-avenir-next md:text-left ">
                    Discover the health plan that best suits your needs
                </p>
                <p class="text-textColor text-chico pl-44 pr-12 pt-5 font-avenir-next text-justify md:text-justify ">
                    Share a few details about you so our AI Costa can make tailored recommendations.
                </p>
                <p class="font-bold text-textColor text-chico pl-44 pt-2 font-avenir-next text-justify md:text-justify ">
                    It will be as quick as ordering coffee.
                </p>
            </div>
            <div>
                <div class="text-textColor text-super-chico pl-44 pr-12 pt-5 font-avenir-next text-justify md:text-justify">
                    ZIP Code
                </div>
                <div class="pl-44">
                    <form action="/checkzipcode" method="post" name="zipcodeform" id="zipcodeform" class="flex items-center space-x-3">
                        @csrf
                        <input type="text" name="zipcode" id="zipcode" placeholder="Enter your Zip Code" class="py-2 px-3 text-chico rounded-md">
                        <button type="button" id="sendData" class="py-2 px-4 w-28 h-8 text-super-chico rounded-md bg-purpleLight text-white hover:bg-purpleColor focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                            GET STARTED
                        </button>
                    </form>
                </div>
                @if (session('success'))
                    <div class="bg-green-100 text-chico text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 text-chico text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
            </div>
            <div class="footer py-4 mt-auto mb-10">
                <div class="text-center">
                    <p class="text-sm text-gray-600 text-chico mb-20">
                        <span class="text-footerColor">Already have an account.</span> <a href="#" class="text-pinkColor">SIGN IN</a>
                    </p>
                    <p class="text-chico text-gray-500">
                        Data subject <span class="text-pinkColor font-bold">|</span> Privacy policy <span class="text-pinkColor font-bold">|</span> Terms of services
                    </p>
                </div>
            </div>
            
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/zipcodesfunctions.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>