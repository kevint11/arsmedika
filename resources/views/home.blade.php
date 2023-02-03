<html>
    <head>
        <title> Default </title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Home') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                    {{ session('status') }}
                            @endif

                            {{ __('Force Logout !') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <br><br>
                            <button type="submit"> Logout </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
