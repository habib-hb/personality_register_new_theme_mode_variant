<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes Input</title>
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" /> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body id="body_element" class="{{$theme_mode == 'dark' ? 'bg-dark_gray' : 'bg-light_gray'}} transition-all">

        {{-- The best athlete wants his opponent at his best. --}}
        {{-- This main is taking the whole height and containing the whole body --}}
        <main id="main_element" class="h-[100%] {{$theme_mode == 'dark' ? 'bg-dark_gray' : 'bg-light_gray'}} transition-all">

            <nav class="w-full h-[64px] flex flex-col justify-center items-center  {{$theme_mode == 'dark' ? 'bg-dark_gray' : 'bg-slate-50'}}}" style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">

                <img id="light_mode_logo" class="cursor-pointer {{$theme_mode == 'dark' ? 'hidden' : ''}}" src="{{ asset('files/images/light_mode_logo.png') }}" width="88px" alt="Pic">

                {{-- Dark Mode Logo --}}
                <img id="dark_mode_logo" class="cursor-pointer {{$theme_mode == 'dark' ? '' : 'hidden'}}" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

            </nav>

                {{-- Dark Mode Toggle --}}
                <div id="dark_mode_toggle_button" class="flex flex-col justify-center items-center mt-[4vh] transition-all   md:absolute md:top-[16px] md:right-0 md:pr-4 md:mt-[0]">
                    {{-- Light Mode Icon --}}
                    <img id="light_mode_icon" class="cursor-pointer {{$theme_mode == 'dark' ? 'hidden' : ''}}" src="{{ asset('files/images/light_mode_icon.png') }}" width = "64px" alt="">

                    {{-- Dark Mode Icon --}}
                    <img id="dark_mode_icon" class="cursor-pointer {{$theme_mode == 'dark' ? '' : 'hidden'}}" src="{{ asset('files/images/dark_mode_icon.png') }}" width = "64px" alt="">

                    {{-- Loading Message --}}
                    <p id='theme_mode_change_loading_message' class='text-center hidden {{$theme_mode == 'dark' ? 'text-white' : ''}}'>Loading...</p>

                </div>



                {{-- Opening Message --}}
                <h2 id="first_message" class=" {{$theme_mode == 'dark' ? 'text-dark_mode_blue' : 'text-light_mode_blue'}} text-center text-[32px] font-normal font-['Inter'] mt-[4vh]">Let’s Add Some Magic :)</h2>



                {{-- The livewire component --}}
              @livewire('input-into-quotes-database')



            </main>



            {{-- @livewireScripts --}}
           {{-- ******************** Javascript Code ******************** --}}

           <script>

            // Reset Form Function
            function resetForm() {
                setTimeout(function() {
               document.getElementById('add_quote_form').reset();
                 }, 300);

                setTimeout(function() {
                    document.getElementById('session-message').style.display = 'none';
                }, 3000);
            }
                    // The on click event
                    document.getElementById('submit_button').addEventListener('click', resetForm);



            // Making the Delete session disappear after 5 seconds on the button click
            function reset_delete_msg_after_timeout() {
                    setTimeout(function() {
                    document.getElementById('session-message').style.display = 'none';
                    }, 5000);
                }

                        document.getElementById('delete_popup_submit_button').addEventListener('click', reset_delete_msg_after_timeout);




            // Making the Edit session disappear after 5 seconds on the popup form submit button click
            function reset_edit_msg_after_timeout() {
                    setTimeout(function() {
                    document.getElementById('session-message').style.display = 'none';
                    }, 5000);
                }

                        document.getElementById('edit_popup_submit_button').addEventListener('click', reset_edit_msg_after_timeout);



                // Dark mode toggle button operation
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
                                                theme_mode: @json($theme_mode) == 'dark' ? 'light' : 'dark'

                                            })
                                        }).then(response => response.text())
                                        .then(data => {
                                                console.log('set_theme_mode console response: ', data);

                                                // // Restarting the livewire component
                                                // Livewire.dispatch('restart');
                                            })
                                            .catch(error => {
                                                console.log('set_theme_mode console error: ', error);
                                            });



                    // Refreshing the page
                    window.location.reload();


            })



    </script>



        @livewireScripts
</body>
</html>
