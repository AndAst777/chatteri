<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Chatter</title>
</head>

<body>


    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="{{ url('/main') }}" class="flex ms-2 md:me-24">
                        <img src="{{ asset('images/logo.jpg') }}" class="h-8 me-3" alt="Chatter logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Chatter</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="">
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <div class="flex items-center ms-3">
                                        <div>
                                            <button type="button"
                                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                                <span class="sr-only">Open user menu</span>
                                                <img class="w-8 h-8 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                                    alt="user photo">
                                            </button>
                                        </div>
                                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                            id="dropdown-user">
                                            <div class="px-4 py-3" role="none">
                                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                                    {{ Auth::user()->name }}
                                                </p>
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                                    role="none">
                                                    {{ Auth::user()->email }}
                                                </p>
                                            </div>
                                            <ul class="py-1" role="none">
                                                <li>
                                                    <a href="{{ url('/home') }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        role="menuitem">Профиль</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        role="menuitem">Настройки</a>
                                                </li>

                                                <li>

                                                    <a href="{{ route('logout') }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        role="menuitem"
                                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Выйти') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="">Log
                                        in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                    </div>
                </div>
            </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Новости</span>
                    </a>
                </li>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        {{-- <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14"> --}}
            <div class="grid grid-cols-1 gap-4 mb-4 place-items-center items-center mt-14">
                @foreach ($applications as $application)
                    <div class="max-w-md p-4 bg-white border border-gray-300 rounded-lg ">
                        <div class="flex">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full border border-gray-200"
                                    src="{{ asset('image/avatar.jpg') }}" alt="Avatar-user">
                            </div>
                            <div class="flex-1">
                                <p class="text-md">{{ $application->user->name }}</p>
                                <p class="text-sm">{{ $application->created_at }}</p>
                            </div>

                        </div>

                        <div class="">
                            <p class="mt-2">{{ $application->content }}</p>
                        </div>

                        <img class="rounded-sm mt-2" class="p-0" src="{{ asset('images/meme.jpg') }}" alt="Post">
                        <div>



            </div>
        </div>



        </div>
        @endforeach
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
