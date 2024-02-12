<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specialities</title>
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
        <x-admin-nav />
        <div class="content">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:py-24 lg:px-8">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Our service statistics</h2>
                <div class="grid grid-cols-2 gap-5 mt-4">
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total Médecins</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600"> {{$medecinCount}} </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total Médicaments</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">19.2K</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total Specialities</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600"> {{$specialitiesCount}} </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total Patients</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">{{$patientCount}} </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

            
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>


