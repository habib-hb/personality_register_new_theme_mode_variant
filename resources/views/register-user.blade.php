<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body id="body_element" class="{{$theme_mode == 'dark' ? 'bg-dark_gray' : 'bg-light_gray'}} transition-all">

    {{-- This main is taking the whole height and containing the whole body --}}
    <main id="main_element" class="h-[100%]  transition-all {{$theme_mode == 'dark' ? 'bg-dark_gray' : 'bg-light_gray'}}">

    <nav class="w-full h-[64px] flex flex-col justify-center items-center {{$theme_mode == 'dark' ? 'bg-dark_gray' : 'bg-slate-50'}} " style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">

        <img id="light_mode_logo" class="cursor-pointer {{$theme_mode == 'dark' ? 'hidden' : ''}}" src="{{ asset('files/images/light_mode_logo.png') }}" width="88px" alt="Pic">

        {{-- Dark Mode Logo --}}
        <img id="dark_mode_logo" class="cursor-pointer {{$theme_mode == 'dark' ? '' : 'hidden'}}" src="{{ asset('files/images/dark_mode_logo.png') }}" width="88px" alt="Pic">

    </nav>

        {{-- Dark Mode Toggle --}}
        <div id="dark_mode_toggle_button" class="w-full flex flex-col justify-center items-center mt-[4vh] transition-all md:absolute md:top-[16px] md:items-end md:pr-4 md:mt-[0]">
            {{-- Light Mode Icon --}}
            <img id="light_mode_icon" class="cursor-pointer {{$theme_mode == 'dark' ? 'hidden' : ''}}" src="{{ asset('files/images/light_mode_icon.png') }}" width = "64px" alt="">

            {{-- Dark Mode Icon --}}
            <img id="dark_mode_icon" class="cursor-pointer {{$theme_mode == 'dark' ? '' : 'hidden'}}" src="{{ asset('files/images/dark_mode_icon.png') }}" width = "64px" alt="">

            {{-- Loading Message --}}
            <p id='theme_mode_change_loading_message' class='text-center hidden {{$theme_mode == 'dark' ? 'text-white' : ''}}'>Loading...</p>

        </div>



        {{-- Opening Message --}}
        <h2 id="first_message" class="{{$theme_mode == 'dark' ? 'text-dark_mode_blue' : 'text-light_mode_blue'}} text-center text-[32px] font-normal font-['Inter'] mt-[4vh]">Let’s Register :)</h2>



        {{-- The Github Button --}}
        <div class="flex flex-col justify-center items-center mt-[4vh]">

            <a href="auth/redirect" class="cursor-pointer flex flex-col items-center">
                <img src="{{ asset('files/images/github_button.png') }}" alt="Github logo" class="cursor-pointer hover:opacity-80 w-[94%] md:w-[300px]">
            </a>

        </div>
        {{-- Hr Line --}}
        <hr id="hr_line" class="{{$theme_mode == 'dark' ? 'bg-white' : 'bg-black'}} mt-[4vh] md:h-[2px]">



    {{-- Form Starts- 5 inputs (section select with 5 options, name , email, password, confirm password) --}}
    <form action="{{ route('register') }}" method="POST" class="w-full flex flex-col justify-center items-center mt-8 transition-all md:mt-2">

        {{-- Cross site request forgery Protection --}}
        @csrf

            {{-- Select Personality Type Input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:mt-2 md:max-w-[500px]">
                <label id="select_label" for="personality" class="text-left {{$theme_mode == 'dark' ? 'text-white' : ''}}">Select Your Personality Type:</label>
            </div>
            <select name="personality" id="section_input" class="w-[90vw] border-none rounded-md md:max-w-[500px] {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : ''}}">
                <option id="option-1" value="1" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Extroversion</option>
                <option id="option-2" value="2" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Agreeableness</option>
                <option id="option-3" value="3" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Openness</option>
                <option id="option-4" value="4" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Conscientiousness</option>
                <option id="option-5" value="5" class="text-black {{$theme_mode == 'dark' ? 'text-white' : ''}}">Neuroticism</option>
            </select>
            @error('personality')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Name input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                <label id="name_input_label" for="name" class="text-left {{$theme_mode == 'dark' ? 'text-white' : ''}}">Name:</label>
            </div>
            <input type="text" id="name_input" name="name" class="w-[90vw] border-none rounded-md md:max-w-[500px] {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : ''}}">
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Email input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                <label id="email_input_label" for="email" class="text-left {{$theme_mode == 'dark' ? 'text-white' : ''}}">Email:</label>
            </div>
            <input type="email" id="email_input" name="email" class="w-[90vw] border-none rounded-md md:max-w-[500px] {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : ''}}">
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Password input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                <label id="password_input_label" for="password" class="text-left {{$theme_mode == 'dark' ? 'text-white' : ''}}">Password:</label>
            </div>
            <input type="password" id="password_input" name="password" class="w-[90vw] border-none rounded-md md:max-w-[500px] {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : ''}}">
            @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Confirm Password input --}}
            <div class="flex flex-col self-center w-full max-w-[90vw] mt-4 md:max-w-[500px]">
                <label id="confirm_password_input_label" for="password_confirmation" class="text-left {{$theme_mode == 'dark' ? 'text-white' : ''}}">Confirm Password:</label>
            </div>
            <input type="password" id="confirm_password_input" name="password_confirmation" class="w-[90vw] border-none rounded-md md:max-w-[500px] {{$theme_mode == 'dark' ? 'bg-input_dark_mode text-white' : ''}}">
            @error('password_confirmation')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Submit button --}}
            <input type="submit" id="submit_button" value="Register" class="mt-[4vh] mb-[4vh] h-12 w-[90%] rounded-md  text-white hover:opacity-90 text-xl md:max-w-[350px] md:mb-[12vh] {{$theme_mode == 'dark' ? 'bg-dark_mode_blue' : 'bg-light_mode_blue'}}">

            @if ($errors->any())
            <div class="text-red-500 text-sm">
            {{ $errors->first() }}
            </div>
            @endif

        </form>



    </main>



    {{-- ******************** Javascript Code ******************** --}}

    <script>

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

                                            // Restarting the livewire component
                                            Livewire.dispatch('restart');
                                        })
                                        .catch(error => {
                                            console.log('set_theme_mode console error: ', error);
                                        });


                           // End Fetch POST request


            // Refreshing the page
            window.location.reload();


        })



</script>



</body>
</html>
