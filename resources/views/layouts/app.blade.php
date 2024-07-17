<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body  class="font-sans antialiased">
        <div id="app_main_div_body" class="min-h-screen  {{session('theme_mode') == 'dark' ? 'bg-dark_gray' : 'bg-light_gray'}} ">
            {{-- dark:bg-gray-900 --}}
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="{{session('theme_mode') == 'dark' ? 'bg-dark_gray' : 'bg-light_gray'}} shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>



        {{-- *** JAVASCRIPT CODE *** --}}
        <script>

            // Dark mode toggle button operation
                let first_load_check = true;
            document.querySelector('#dark_mode_toggle_button').addEventListener('click', async()=>{

                 // Setting the loading notification
                 document.querySelector('#theme_mode_change_loading_message').classList.remove('hidden');// The notification will automatically get removed when the page loads through javascript below

                 

                    // Setting theme mode session based on user click through api post request
                         // Fetch POST request
                    await fetch('{{ route('set_theme_mode') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            theme_mode: @json(session('theme_mode')) == 'dark' ? 'light' : 'dark'

                                        })
                                    }).then(response => response.text())
                                    .then(data => {
                                            console.log('set_theme_mode console response: ', data);

                                            // Restarting the livewire component
                                            Livewire.dispatch('restart');
                                        })
                                        .catch(error => {
                                            console.log('set_theme_mode console error: ', error);
                                        });



                    //Refreshing the page
                    window.location.reload();


            })


        </script>
    </body>
</html>
