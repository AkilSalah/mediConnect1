<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur | Favoris</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>

<body class="font-sans antialiased">

    <x-patient-nav />

    <div>
        <h1 class="text-center text-4xl font-extrabold mt-4">Favoris</h1>
        <div class="flex flex-wrap justify-center mt-10">
            @foreach ($medecinFavoris as $favorite)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                    <div class="bg-white p-6 shadow-[0_2px_15px_-6px_rgba(0,0,0,0.2)] rounded-2xl font-[sans-serif] overflow-hidden">
                        <div class="flex flex-col items-center">
                            <img src='https://readymadeui.com/profile_2.webp' class="w-28 h-w-28 rounded-full" />
                            <div class="mt-4 text-center">
                                <p class="text-xl text-[#333] font-extrabold"> {{ $favorite->name }} </p>
                                <p class="text-sm text-gray-500 mt-2"> {{ $favorite->email }} </p>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-center">
                            <form action="{{ route('doctorProfil', $favorite->id) }}" method="GET">
                                @csrf
                                <div class="w-12 h-12 p-3 flex items-center justify-center cursor-pointer">
                                    <button type="submit" class="px-4 py-2 text-sm rounded-full font-bold text-white border-2 border-[#35ac33] bg-[#35ac33] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#35ac33]">Consulter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>    
   
    