


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Your information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table table-bordered">
                        <tr>

                        </tr>

                    </table>
                    <div>Name: {{auth::user()->name}}</div>
                    <div>Email: {{auth::user()->email}}</div>
                    <a href="{{ route('users.show', auth()->id()) }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Edit account</a>


                    <div class="card-body">
                        @if (session('status'))

                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
