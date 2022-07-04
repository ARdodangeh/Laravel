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
                <h2>فرم دریافت اطلاعات</h2>
            </div>
            <div class="row g-3">
                <div class="col">
                    <form action="{{route('informations.store')}}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">نام</label>
                                <input type="text" class="form-control" id="firstName" name="first_name">
                                @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">نام خانوادگی</label>
                                <input type="text" class="form-control" id="lastName" name="last_name">
                                @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-sm-3 my-3 pt-4">
                                <div class="form-check">
                                    <input id="male" name="gender" type="radio" class="form-check-input" value="male">
                                    <label class="form-check-label" for="male">آقا</label>
                                </div>
                                <div class="form-check">
                                    <input id="female" name="gender" type="radio" class="form-check-input" value="female">
                                    <label class="form-check-label" for="female">خانم</label>
                                </div>
                                @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label for="age" class="form-label">سن</label>
                                <input type="number" class="form-control" id="age" name="age" min="21" max="49" step="1" value="21">
                                @error('age')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label for="education" class="form-label">تحصیلات</label>
                                <select class="form-select" id="education" name="education">
                                    <option value="Bachelor">لیسانس</option>
                                    <option value="Master">فوق لیسانس</option>
                                </select>
                                @error('education')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label for="city" class="form-label">شهر</label>
                                <select class="form-select" id="city" name="city">
                                    <option value="tehran">تهران</option>
                                    <option value="mashhad">مشهد</option>
                                    <option value="esfahan">اصفهان</option>
                                </select>
                                @error('city')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <input class="w-100 btn btn-success btn-lg" type="submit" value="ارسال"></input>
                    </form>
                    <hr class="my-4">
                    <a class="w-100 btn btn-info btn-lg" href="{{route('informations.index')}}">اطلاعات دریافت شده</a>
                </div>
            </div>
        </main>
    </div>
</body>