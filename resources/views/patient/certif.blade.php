<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat médical</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>
<body class="bg-gray-100">
    <x-patient-nav />
    @foreach ($medicalCertificate as $item)
   <div class="container mx-auto py-8">
        <div class="bg-white rounded-lg shadow overflow-hidden max-w-lg mx-auto">
            <div class="px-6 py-4">
                <div class="flex justify-between" >
                  <div>
                    <h2 class="text-xl font-semibold mb-2">Certificat médical</h2>
                </div> 
                <div>
                    <h2 class="text-xl font-semibold mb-2">{{ $item->created_at->format('Y-m-d') }}</h2>
                </div>   
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nom du médecin</label>
                    <p class="form-text mt-1 block">{{ $item->medecin->user->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nom du patient</label>
                    <p class="form-text mt-1 block">{{ $item->patient->user->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nombre de jours de repos</label>
                    <p class="form-text mt-1 block">{{ $item->joursRepos }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Détails</label>
                    <p class="form-text mt-1 block">{{ $item->details }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
