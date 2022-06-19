<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

    <nav :class="{'block': open, 'hidden': !open}"
        class=" bg-gray-100 flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto d-flex">
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="{{ route('dashboard') }}">{{ __('translat.Dashboard') }}</a>


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('translat.Logout') }}</a>

        </form>
    </nav>
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            {{ __('translat.Creat Category') }}
                        </div>
                        <div class="card-body">
                            @if (Session::has('user_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('user_created') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('user.create') }}">
                                @csrf
                                <div class="form-group">


                                    <div>
                                        <x-label for="fullname" :value="__('fullname')" />

                                        <x-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus />
                                    </div>
                                    <div>
                                        <x-label for="username" :value="__('username')" />

                                        <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                                    </div>
                                    <div>
                                        <x-label for="fullname" :value="__('email')" />

                                        <x-input id="fullname" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
                                    </div>

                                    <div>
                                        <x-label for="phone" :value="__('phone')" />

                                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
                                    </div>


                                    <div class="mt-4">
                                        <x-label for="password" :value="__('Password')" />

                                        <x-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password_confirmation" required />
                                    </div>

                                    <div class="mt-4">
                                        <x-label for="role_id"value="{{ __('Register as:')}}"/>
                                        <select name="role_id" class="block mt-1 w-full border-gray-300
                                        focus:border-indigo-300 facous:ring focus:ring-indigo-200
                                        focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="user"> {{ __('User') }}</option>
                                        <option value="admin">{{ __('Admin') }} </option>
                                        
                                    </div>
                                    <br>
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <button aria-label="Close" class="close" data-dismiss="alert"
                                                type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Error</strong>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-success" style="margin-top: 18px;">
                                    {{ __('translat.Add') }}</button>
                                <a class="btn btn-primary" style="margin-top: 18px;" href="{{ route('dashboard') }}">
                                    {{ __('translat.cancel') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>
