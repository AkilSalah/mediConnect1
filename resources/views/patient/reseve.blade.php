<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur | Reservation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <style>
    .date-button.selected {
    background-color: #ffcccb; /* Changer la couleur de fond pour indiquer la sélection */
    cursor: not-allowed; /* Changer le curseur pour indiquer que le bouton est désactivé */
}
    </style>
</head >

<body class="font-sans antialiased">

    <x-patient-nav />

    <div class="w-screen">
        <div class="relative mx-auto mt-20 mb-20 max-w-screen-lg overflow-hidden rounded-t-xl bg-emerald-400/60 py-32 text-center shadow-xl shadow-gray-300">
          <h1 class="mt-2 px-8 text-3xl font-bold text-white md:text-5xl">Reservez maintenant</h1>
          <p class="mt-6 text-lg text-white">Get an appointment with our experienced accountants</p>
          <img class="absolute top-0 left-0 -z-10 h-full w-full object-cover" src="https://images.unsplash.com/photo-1504672281656-e4981d70414b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" />
        </div>

<form id="rendezVousForm" action="{{ route('rendezVousStore')}}" method="POST">
  @csrf
  <input type="hidden" name="iddoctor" value="{{ $idDoctor }}">
  <input type="hidden" name="date" id="selectedDate"> 
  
  <div class="mx-auto grid max-w-screen-lg px-6 pb-20">
      <div class="">
          <p class="mt-8 font-serif text-xl font-bold text-blue-900">Select a time</p>
          <div class="mt-4 grid grid-cols-4 gap-2 lg:max-w-xl"> 
              @php
                  $hours = ['08:00', '09:00', '10:00', '11:00', '14:00', '15:00', '16:00', '17:00'];
              @endphp
              @foreach ($hours as $hour)
                  @php
                      $isDisabled = in_array($hour, $existingDates);
                      $class = $isDisabled ? 'bg-red-500 text-white' : 'bg-emerald-100 text-emerald-900';
                  @endphp
                  <button class="date-button rounded-lg px-4 py-2 font-medium active:scale-95 {{ $class }}" value="{{ $hour }}" {{ $isDisabled ? 'disabled' : '' }}>
                      {{ $hour }}
                  </button>
              @endforeach
          </div>
      </div>
      <button id="confirmButton" class="mt-8 w-56 rounded-full border-8 border-emerald-500 bg-emerald-600 px-10 py-4 text-lg font-bold text-white transition hover:translate-y-1" disabled>Book Now</button>
  </div>
</form>

</div>
<script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>

<x-footer />


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateButtons = document.querySelectorAll('.date-button');
        let selectedButton = null;

        dateButtons.forEach(button => {
            button.addEventListener('click', function () {
                if (!button.disabled) {
                    dateButtons.forEach(btn => {
                        btn.disabled = true;
                        btn.classList.remove('selected'); 
                    });

                    button.classList.add('selected');
                    selectedButton = button;
                    
                    document.getElementById('selectedDate').value = button.value;
                    
                    document.getElementById('confirmButton').disabled = false;
                }
            });
        });

        document.getElementById('confirmButton').addEventListener('click', function (event) {
            event.preventDefault(); 
            
            if (selectedButton) {
                selectedButton.disabled = true;
            }
            
            document.getElementById('rendezVousForm').submit();
        });
    });
</script>



    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>
