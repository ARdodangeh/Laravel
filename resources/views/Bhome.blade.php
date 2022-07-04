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
            <div class="row g-3">
                <div class="col mt-5">
                    <a class="w-100 btn btn-primary btn-lg" href="{{route('informations.create')}}">فرم دریافت اطلاعات</a>
                    <hr class="my-4">
                    <a class="w-100 btn btn-primary btn-lg" href="{{route('informations.index')}}">اطلاعات دریافت شده</a>
                </div>
            </div>
        </main>
    </div>
</body>