<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Reviews</title>
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-body">

    <section class="bg-white mb-20 md:mb-52 xl:mb-72">
        <div class="container max-w-screen-xl mx-auto px-4">
            <nav class="flex-wrap lg:flex items-center py-14 xl:relative z-10" x-data="{navbarOpen:false}">
                <div class="flex items-center justify-between mb-10 lg:mb-0">
                    <a href="/" class="flex items-center"> <img src="{{ asset('assets/image/navbar-logo.png') }}" alt="Logo img" class="w-52 md:w-80 lg:w-full"></a>

                    <button class="lg:hidden w-10 h-10 ml-auto flex items-center justify-center text-green-700 border border-green-700 rounded-md"
                        @click="navbarOpen = !navbarOpen">
                        <i data-feather="menu"></i>
                    </button>
                </div>

                <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-5 xl:space-x-13"
                    :class="{'hidden': !navbarOpen, 'flex': navbarOpen}">

                    <li><a href="/" class="/home">Home</a></li>
                    <li><a href="/posts">News</a></li>
                    <li><a href="/products">Products</a></li>
                    <li id="login"><a href="/login">Login</a></li>
                    <li id="register"><a href="/register">Register</a></li>
                    <li id="logout" style="display:none;"><a href="/logout">Logout</a></li>

                    <script>
                        // Example script to toggle login/register and logout links based on user authentication status
                        let userIsLoggedIn = false; // Change this based on actual authentication status

                        if (userIsLoggedIn) {
                            document.getElementById('login').style.display = 'none';
                            document.getElementById('register').style.display = 'none';
                            document.getElementById('logout').style.display = 'block';
                        }
                    </script>
                </ul>
            </nav>

            <div class="flex items-center justify-center xl:justify-start">
                <div class="mt-28 text-center xl:text-left">
                    <h1 class="font-semibold text-4xl md:text-6xl lg:text-7xl text-gray-900 leading-normal mb-6">
                        Explore the Films I've Watched!
                    </h1>

                    <p class="font-normal text-xl text-gray-400 leading-relaxed mb-12">
                        Here, you'll find a collection of movies I've enjoyed, along with my personal reviews and ratings. Dive in and discover something new!
                    </p>

                    <button
                        class="px-6 py-4 bg-green-700 text-white font-semibold text-lg rounded-xl hover:bg-green-900 transition ease-in-out duration-500">
                        Contact Us
                    </button>
                </div>

                <div class="hidden xl:block xl:absolute z-0 top-0 right-0">
                    <img src="{{ asset('assets/image/home-img.png') }}" alt="Home img">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-10 md:py-16 xl:relative">
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col xl:flex-row justify-end">
                <div class="hidden xl:block xl:absolute left-0 bottom-0 w-full">
                    <img src="{{ asset('assets/image/feature-img.png') }}" alt="Feature img">
                </div>

                <div>
                    <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center leading-normal mb-6">
                        Why This Site?
                    </h1>

                    <p class="font-normal text-gray-400 text-md md:text-xl text-center mb-16">
                        I wanted a place to share my thoughts on movies and connect with other film enthusiasts.  This site is a work in progress, but I hope you find it useful!
                    </p>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                        <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <i data-feather="check-circle" class=" text-green-900"></i>
                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">My Personal Reviews</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">
                                These are my honest opinions on the films I've watched.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                        <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <i data-feather="lock" class=" text-green-900"></i>
                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">No Ads!</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">
                                Enjoy your movie reviews without annoying ads.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4">
                        <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <i data-feather="credit-card" class=" text-green-900"></i>
                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">Completely Free</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">
                                This site is free to use.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>