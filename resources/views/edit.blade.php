<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Edit title
                        </div>
                        <div class="card-body">
                            @if (Session::has('user-updated'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('user-updated')}}
                            </div>
                            @endif
                                <form method="POST" action="{{route('user.update')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}"/>
                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" name="fullname" class="form-control" placeholder="Add fullname"  value="{{$user->fullname}}"/>

                                        <label for="username">username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Add username"  value="{{$user->username}}"/>

                                        <label for="email">email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Add email"  value="{{$user->email}}"/>

                                        <label for="phone">phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Add phone"  value="{{$user->phone}}"/>

                                     

                                    </div>
                                    <button type="submit" class="btn btn-success" style="margin-top: 18px;" >Update
                                        User</button>
                                        <a class="btn btn-primary"  style="margin-top: 18px;"href="{{route('dashboard')}}"> Show Dachboard</a>
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
