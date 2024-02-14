<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur | Home</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>

<body class="font-sans antialiased">

    <x-patient-nav />

    <div class="bg-white min-h-[475px] mt-10 text-[#333] font-[sans-serif]">
        <div class="grid md:grid-cols-2 justify-center items-center max-md:text-center gap-8">
            <div class="max-w-md mx-auto p-4">
                <h2 class="text-2xl md:text-4xl font-extrabold mb-6 md:!leading-[55px]"> Connectez-vous à une Santé Plus
                    Intelligente</h2>
                <p class="text-base">MediConnect est votre portail vers une santé améliorée. Explorez notre plateforme
                    intuitive pour accéder à des informations médicales fiables !</p>
                <div class="mt-8 space-y-6">
                    <button type="button"
                        class="w-full px-4 py-2 text-base tracking-wider font-semibold outline-none border border-[#333] bg-[#222] text-white hover:bg-transparent hover:text-[#333] transition-all duration-300">Try
                        now</button>
                </div>
            </div>
            <div class="md:text-right max-md:mt-12 h-full">
                <img src=" {{ asset('/logo/docteur-new-york.jpeg') }} " alt="Premium Benefits"
                    class="w-full h-full object-cover" />
            </div>
        </div>
    </div>
    <div>
        <h2 class="text-center text-4xl font-extrabold mt-4">Specialities</h2>
        <div class=" flex justify-center" >
          <form action="{{ route('index') }} " class="flex gap-2 " method="GET">
            <select id="countries" name="speciality" class="mt-6 ml-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Sélectionnez un continent</option>
                @foreach ($specialities as $speciality)
                <option value="{{ $speciality->id }}">{{ $speciality->specialityName }}
                </option>
            @endforeach
            </select>
            <div>
            <button type="submit" class="px-4 py-2 mt-7 text-sm font-medium text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                Filtrer
            </button> 
            </div>
            
        </form>
        </div>
          
        </div>



        <div class="flex flex-wrap justify-center mt-10">
          @foreach ($doctors as $doctor)
              <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                  <div class="bg-white p-6 shadow-[0_2px_15px_-6px_rgba(0,0,0,0.2)] rounded-2xl font-[sans-serif] overflow-hidden">
                      <div class="flex flex-col items-center">
                          <img src='https://readymadeui.com/profile_2.webp' class="w-28 h-w-28 rounded-full" />
                          <div class="mt-4 text-center">
                              <p class="text-xl text-[#333] font-extrabold"> {{ $doctor->name }} </p>
                              <p class="text-sm text-gray-500 mt-2"> {{ $doctor->email }} </p>
                          </div>
                      </div>
                      <div class="mt-8 flex justify-center">
                          <div class="w-12 h-12 p-3 flex items-center justify-center cursor-pointer">
                              <button type="button" class="px-4 py-2 text-sm rounded-full font-bold text-white border-2 border-[#35ac33] bg-[#35ac33] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#35ac33]">Consulter</button>
                          </div>
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
