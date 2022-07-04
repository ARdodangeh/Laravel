<!doctype html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Back-end Project</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="logomain.png" alt="">
                <h2>اطلاعات دریافت شده</h2>
            </div>
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    فیلتر
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item" href="{{route('informations.male')}}">آقا</a></li>
                    <li><a class="dropdown-item" href="{{route('informations.female')}}">خانم</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('informations.bachelor')}}">لیسانس</a></li>
                    <li><a class="dropdown-item" href="{{route('informations.master')}}">فوق لیسانس</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('informations.tehran')}}">تهران</a></li>
                    <li><a class="dropdown-item" href="{{route('informations.mashhad')}}">مشهد</a></li>
                    <li><a class="dropdown-item" href="{{route('informations.esfahan')}}">اصفهان</a></li>
                </ul>
            </div>
            <br>
            <div class="row g-3">
                <div class="col">
                    @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">جنسیت</th>
                                <th scope="col">سن</th>
                                <th scope="col">تحصیلات</th>
                                <th scope="col">شهر</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mashhads as $mashhad)
                            <tr>
                                <th scope="row">{{$mashhad->id}}</th>
                                <td>{{$mashhad->first_name}}</td>
                                <td>{{$mashhad->last_name}}</td>
                                <td>
                                    @if($mashhad->gender == 'male')
                                    {{'آقا'}}
                                    @else
                                    {{'خانم'}}
                                    @endif
                                </td>
                                <td>{{$mashhad->age}}</td>
                                <td>
                                    @if($mashhad->education == 'Bachelor')
                                    {{'لیسانس'}}
                                    @else
                                    {{'فوق لیسانس'}}
                                    @endif
                                </td>
                                <td>
                                    @if($mashhad->city == 'tehran')
                                    {{'تهران'}}
                                    @elseif($mashhad->city == 'mashhad')
                                    {{'مشهد'}}
                                    @else
                                    {{'اصفهان'}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr class="my-4">
                    <a class="w-100 btn btn-success btn-lg" href="{{route('informations.create')}}">فرم دریافت اطلاعات</a>
                </div>
            </div>
        </main>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>