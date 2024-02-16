<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur | Doctor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>

<body class="font-sans antialiased">
    <x-patient-nav />
    <div class=" bg-white min-h-[475px] mt-10 text-[#333] font-[sans-serif]">
        <div class="">
            <div class="bg-white shadow ">
                <div class="grid grid-cols-1 md:grid-cols-1">
                    
                    <div class="relative">
                        <div
                            class="w-28 h-28 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 mt-5 flex items-center justify-center  text-indigo-500">
                            <img src="{{ asset('/logo/doctorAvatar.jpg') }} " class="w-60 h-50 rounded-full object-cover " alt="">
                        </div>
                    </div>
                </div>
                <div class="mt-40 text-center border-b pb-12">
                    <h1 class="text-4xl font-medium text-gray-700">DR. {{$medecinDetails->name}} </h1>
                    <div class="flex justify-center items-center mt-4 ">
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                    </div>
                     <p class="mt-8 text-gray-500">Spécialité - {{$medecinDetails->specialityName}} </p>
                </div>
                <div class="space-x-8 flex justify-between mt-5 md:justify-center">
                    <form action="{{ route('favoriStore',$id_medecin) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button
                    class="text-white py-2 px-4 uppercase rounded bg-red-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                    Favoris</button>
                </form>   
                 <button 
                    class="text-white py-2 px-4 uppercase rounded bg-green-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                    Rendez vous</button> 
                </div>
                <section class="bg-white dark:bg-gray-900 antialiased">
                    <div class="max-w-2xl mt-10 mx-auto px-4">
                        <div class="flex justify-between items-center mb-6">
                          <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Commentaire</h2>
                      </div>
                      <form class="mb-6">
                          <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                              <label for="comment" class="sr-only">Your comment</label>
                              <textarea id="comment" rows="6"
                                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                  placeholder="Write a comment..." required></textarea>
                          </div>
                          <button type="submit"
                              class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                              Post comment
                          </button>
                      </form>
                      <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                          <footer class="flex justify-between items-center mb-2">
                              <div class="flex items-center">
                                  <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                          class="mr-2 w-6 h-6 rounded-full"
                                          src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                          alt="Michael Gough">Michael Gough</p>
                                  <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                          title="February 8th, 2022">Feb. 8, 2022</time></p>
                              </div>
                              <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                  class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                  type="button">
                                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                      <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                  </svg>
                                  <span class="sr-only">Comment settings</span>
                              </button>
                              <!-- Dropdown menu -->
                              <div id="dropdownComment1"
                                  class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                  <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                      aria-labelledby="dropdownMenuIconHorizontalButton">
                                      <li>
                                          <a href="#"
                                              class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                      </li>
                                      <li>
                                          <a href="#"
                                              class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                      </li>
                                      <li>
                                          <a href="#"
                                              class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                      </li>
                                  </ul>
                              </div>
                          </footer>
                          <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                              instruments for the UX designers. The knowledge of the design tools are as important as the
                              creation of the design strategy.</p>
                          
                      </article>          
    </div>
    <div class="w-full ">
       <x-footer />  
    </div>
   

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>