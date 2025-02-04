<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sambuilding - Tailwind Template</title>
        <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head> 

    <body class="font-body">

        <!-- home section -->
        <section class="bg-white mb-20 md:mb-52 xl:mb-72">

            <div class="container max-w-screen-xl mx-auto px-4">

            <nav class="flex-wrap lg:flex items-center py-14 xl:relative z-10" x-data="{navbarOpen:false}">
    <div class="flex items-center justify-between mb-10 lg:mb-0">
        <img src="{{ asset('assets/image/navbar-logo.png') }}" alt="Logo img" class="w-52 md:w-80 lg:w-full">

        <button class="lg:hidden w-10 h-10 ml-auto flex items-center justify-center text-green-700 border border-green-700 rounded-md" @click="navbarOpen = !navbarOpen">
            <i data-feather="menu"></i>
        </button>
    </div>

    <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-5 xl:space-x-13" :class="{'hidden': !navbarOpen, 'flex': navbarOpen}">

        <li><a href="/" class="/home">Home</a></li>
        <li><a href="/posts">News</a></li>
        <li><a href="/products">Products</a></li>
        <li id="login"><a href="/login">Login</a></li>
        <li id="register"><a href="/register">Register</a></li>
        <li id="logout" style="display:none;"><a href="/logout">Logout</a></li>
    
        <!-- Auth Links (Log in, Register, Dashboard) -->
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
    



                <div class="flex items-center justify-center xl:justify-start">

                    <div class="mt-28 text-center xl:text-left">
                        <h1 class="font-semibold text-4xl md:text-6xl lg:text-7xl text-gray-900 leading-normal mb-6"> hello movie lovers <br> Explore the Films I've Watched! </h1>

                        <p class="font-normal text-xl text-gray-400 leading-relaxed mb-12">here, you'll find a collection of movies I've enjoyed, along with my personal reviews and ratings. <br>dive in and discover something new!</p>

                        <button class="px-6 py-4 bg-green-700 text-white font-semibold text-lg rounded-xl hover:bg-green-900 transition ease-in-out duration-500">Contact us</button>
                    </div>

                    <div class="hidden xl:block xl:absolute z-0 top-0 right-0">
                        <img src="{{ asset('assets/image/home-img.png') }}" alt="Home img">
                    </div>

                </div>

            </div> <!-- container.// -->

        </section>
        <!-- home section //end -->
    
        <!-- feature section -->
        <section class="bg-white py-10 md:py-16 xl:relative">

            <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col xl:flex-row justify-end">

                    <div class="hidden xl:block xl:absolute left-0 bottom-0 w-full">
                        <img src="{{ asset('assets/image/feature-img.png') }}" alt="Feature img">
                    </div>

                    <div class="">

                        <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center leading-normal mb-6">Choice of various types of <br> house</h1>

                        <p class="font-normal text-gray-400 text-md md:text-xl text-center mb-16">We provide a wide of selection of home types for you and your <br> family and are free to choose a home model</p>

                        <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <i data-feather="check-circle" class=" text-green-900"></i>
                            </div>
                            
                            <div class="text-center md:text-left">
                                <h4 class="font-semibold text-gray-900 text-2xl mb-2">Best Home Guarantee</h4>
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">We guarantees the quality of your home you bought <br> from D’house</p>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <i data-feather="lock" class=" text-green-900"></i>
                            </div>

                            <div class="text-center md:text-left">
                                <h4 class="font-semibold text-gray-900 text-2xl mb-2">Safe Transaction</h4>
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Your transactions will always be kept confidential <br> and will get discounted</p>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <i data-feather="credit-card" class=" text-green-900"></i>
                            </div>

                            <div class="text-center md:text-left">
                                <h4 class="font-semibold text-gray-900 text-2xl mb-2">Low and Cost Home Taxes</h4>
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">By buying a house from D’house, you will get a tax <br> discount</p>
                            </div>
                        </div>

                    </div>

            </div>

            </div> <!-- container.// -->

        </section>
        <!-- feature section //end -->
        
        <!-- gallery section -->
        <section class="bg-white py-10 md:py-16">

            <div class="container max-w-screen-xl mx-auto px-4">

                <h1 class="font-semibold text-gray-900 text-4xl text-center mb-10">Our Gallery</h1>

                <div class="hidden md:block flex items-center text-center space-x-10 lg:space-x-20 mb-12">
                    <a href="#" class="px-6 py-2 bg-green-800 text-white font-semibold text-xl rounded-lg hover:bg-green-600 transition ease-in-out duration-500">All</a>
                    <a href="#" class="px-6 py-2 text-gray-900 font-normal text-xl rounded-lg hover:bg-gray-200 hover:text-gray-400 transition ease-in-out duration-500">Exterior</a>
                    <a href="#" class="px-6 py-2 text-gray-900 font-normal text-xl rounded-lg hover:bg-gray-200 hover:text-gray-400 transition ease-in-out duration-500">Interior</a>
                    <a href="#" class="px-6 py-2 text-gray-900 font-normal text-xl rounded-lg hover:bg-gray-200 hover:text-gray-400 transition ease-in-out duration-500">Building</a>
                </div>

                <div class="flex space-x-4 md:space-x-6 lg:space-x-8">
                    <div>
                        <img src="{{ asset('assets/image/gallery-1.png') }}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{ asset('assets/image/gallery-4.png') }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>

                    <div>
                        <img src="{{ asset('assets/image/gallery-2.png') }}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{ asset('assets/image/gallery-5.png') }}" alt="image" class="mb-3 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{ asset('assets/image/gallery-6.png') }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>

                    <div>
                        <img src="{{ asset('assets/image/gallery-3.png') }}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{ asset('assets/image/gallery-7.png') }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>
                </div>

            </div> <!-- container.// -->

        </section>
        <!-- gallery section //end -->

        <!-- testimoni section -->
        <section class="bg-white py-10 md:py-16">

            <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

                <p class="font-normal text-gray-400 text-lg md:text-xl text-center uppercase mb-6">Testimonial</p>

                <h1 class="font-semibold text-gray-900 text-2xl md:text-4xl text-center leading-normal mb-14">What People Say <br> About D’house</h1>

                <div class="hidden xl:block xl:absolute top-0">
                    <img src="{{ asset('assets/image/testimoni-1.png') }}" alt="Image">
                </div>

                <div class="hidden xl:block xl:absolute top-32">
                    <img src="{{ asset('assets/image/testimoni-2.png') }}" alt="Image">
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-center md:space-x-8 lg:space-x-12 mb-10 md:mb-20">
                    
                <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
    <div class="mb-12 space-y-2 text-center">
      {{-- @dump($post) --}}
        <h2 class="text-3xl font-bold text-white-800 md:text-4xl dark:text-white">Latest Articles</h2>
        <p class="lg:mx-auto lg:w-6/12 text-white-600 dark:text-gray-300">
          Quam hic dolore cumque voluptate rerum beatae et quae, tempore sunt, debitis dolorum officia
          aliquid explicabo? Excepturi, voluptate?
        </p>
      </div>
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($post as $p)
        <div class="group p-6 sm:p-8 rounded-3xl bg-white border border-white-100 dark:shadow-none dark:border-white-700 dark:bg-white-800 bg-opacity-50 shadow-2xl shadow-white-600/10">
          <div class="relative overflow-hidden rounded-xl">
            <img src="d/image/TILANG.jpg alt="art cover loading="lazy" width="1000" height="667" class="h-64 w-full object-cover object-top transition duration-500 group-hover:scale-105">
          </div>
          <div class="mt-6 relative">
            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray">
              {{$p->title}}
            </h3>
            <p class="mt-6 mb-8 text-gray-600 dark:text-gray-300">
              {!! $p->content !!}
            </p>
            <a class="inline-block" href="#">
              <span class="text-info dark:text-blue-300">Read more</span>
            </a>
          </div>
        </div>
        @endforeach
      </div>
</div>

                </div>

            </div> <!-- container.// -->

        </section>
        <!-- testimoni section //end -->

        <!-- book section -->
        <section class="bg-white py-10 md:py-16">

            <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

                <div class="bg-green-800 flex flex-col lg:flex-row items-center justify-evenly py-14 rounded-3xl">

                    <div class="text-center lg:text-left mb-10 lg:mb-0">
                        <h1 class="font-semibold text-white text-4xl md:text-5xl lg:text-7xl leading-normal mb-4">Talk to us <br> to discuss</h1>

                        <p class="font-normal text-white text-md md:text-xl">Need more time to discuss? Won’t worry, we are <br> ready to help you. You can fill in the column on the <br> right to book a meeting with us. Totally free.</p>
                    </div>

                    <div class="hidden xl:block xl:absolute right-0">
                        <img src="{{ asset('assets/image/book.png') }}" alt="Image">
                    </div>

                    <div class="hidden md:block bg-white xl:relative px-6 py-3 rounded-3xl">
                        <div class="py-3">
                            <h3 class="font-semibold text-gray-900 text-3xl">Book a meeting</h3>
                        </div> 

                        <div class="py-3">
                            <input type="text" placeholder="Full Name" class="px-4 py-4 w-96 bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                        </div>

                        <div class="py-3">
                            <input type="text" placeholder="Email" class="px-4 py-4 w-96 bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                        </div>

                        <div class="py-3 relative">
                            <input type="text" placeholder="Date" class="px-4 py-4 w-96 bg-gray-100 font-normal text-lg placeholder-gray-400 rounded-xl outline-none">

                            <div class="absolute inset-y-0 left-80 ml-6 flex items-center text-xl text-gray-600">
                                <i data-feather="calendar"></i>
                            </div>
                        </div>

                        <div class="py-3 relative">
                            <input type="text" placeholder="Virtual Meeting" class="px-4 py-4 w-96 bg-gray-100 placeholder-gray-400 rounded-xl outline-none">

                            <div class="absolute inset-y-0 left-80 ml-6 flex items-center text-xl text-gray-600">
                                <i data-feather="chevron-down"></i>
                            </div>
                        </div>

                        <div class="py-3">
                            <button class="w-full py-4 font-semibold text-lg text-white bg-green-700 rounded-xl hover:bg-green-900 transition ease-in-out duration-500">Booking</button>
                        </div>
                    </div>

                </div>

            </div> <!-- container.// -->

        </section>
        <!-- book section //end -->

        <!-- footer -->
        <footer class="bg-white py-10 md:py-16">

            <div class="container max-w-screen-xl mx-auto px-4">

                <div class="flex flex-col lg:flex-row justify-between">
                    <div class="text-center lg:text-left mb-10 lg:mb-0">
                        <div class="flex justify-center lg:justify-start mb-5">
                            <img src="assets/image/footer-logo.png" alt="Image">
                        </div>

                        <p class="font-light text-gray-400 text-xl mb-10">Get your dream house with <br> D’house</p>

                        <div class="flex items-center justify-center lg:justify-start space-x-5">
                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="facebook"></i>
                            </a>

                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="twitter"></i>
                            </a>

                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="linkedin"></i>
                            </a>
                        </div>
                    </div>

                    <div class="text-center lg:text-left mb-10 lg:mb-0">
                        <h4 class="font-semibold text-gray-900 text-2xl mb-6">Sitemap</h4>

                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Home</a>

                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Features</a>
                        
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Gallery</a>
                        
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Testimoni</a>
                        
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Book a meeting</a>
                    </div>

                    <div class="text-center lg:text-left mb-10 lg:mb-0">
                        <h4 class="font-semibold text-gray-900 text-2xl mb-6">Landing</h4>

                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Mobile App</a>

                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Property</a>
                        
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Personal Website</a>
                        
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Web Developer</a>
                        
                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Online Course</a>

                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Donation</a>
                    </div>

                    <div class="text-center lg:text-left">
                        <h4 class="font-semibold text-gray-900 text-2xl mb-6">Utility</h4>

                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">FAQ</a>

                        <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Terms & Conditions</a>
                    </div>
                </div>

            </div> <!-- container.// -->

        </footer>
        <!-- footer //end -->

        <script>
            feather.replace()
        </script>

    </body>
</html>