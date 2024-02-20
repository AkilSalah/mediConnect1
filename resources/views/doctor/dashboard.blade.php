<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor | Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
   <style>
        .sidebar {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 100%;
            width: 220px; 
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding: 20px;
        }

        .content {
            margin-left: 240px; 
            padding: 20px;
            width: 100%
        }

    </style>
</head>

<body class="font-sans antialiased">
    <div class="flex">
        <x-doctor-nav />
        <div class="content">
          
           <div class="max-w-6xl mx-auto text-[#333] font-[sans-serif]">
                <div class="bg-gray-50 max-sm:px-8 px-12 py-8 w-full rounded">
                  <h1 class="text-4xl text-blue-700 font-extrabold">Les dossiers médicaux </h1>
                  <div class="my-6">
                    <p class=" text-sm">Vous trouverez ci-dessous tous les dossiers médicaux des patients avec lesquels vous avez effectué une consultation.</p>
                  </div>
                </div>
                @if (@isset($dossiers))
                  @foreach ($dossiers as $do)
                <div class="grid md:grid-cols-2 gap-4 mt-4">
                  <div class="bg-gray-50 max-sm:px-8 px-12 py-8 w-full rounded">
                    <div class="flex justify-between" >
                      <h2 class=" font-bold">Monsieur</h2>
                    <h2 class=" font-bold"> {{$do->created_at->format('Y-m-d') }} </h2>  
                    </div>
                    <h4 class="mt-2 font-bold"> {{$do->name}} </h4>  

                    <div class="my-6">
                      <p class=" text-sm">{{$do->details}} </p>
                    </div>
                  </div>
                </div> 
                @endforeach  
                    
                @endif
                
              </div>   
         
            
         </div>

    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>


