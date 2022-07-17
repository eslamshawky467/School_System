<!DOCTYPE html>
<html lang="en">
@section('title')
    {{trans('main_trans.Main_title')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')

</head>

<body style="font-family: 'Cairo', sans-serif">

<div class="wrapper" style="font-family: 'Cairo', sans-serif">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
preloader -->

    @include('layouts.main-header')

    @include('layouts.main-sidebar')

    <!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title" >
            <div class="row">
                <div class="col-sm-6" >
                    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">مرحبا بك : {{auth()->user()->name}}</h4>
                </div>
                <br><br>
                <br>
                <div class="card-body">
                    <a style="height: 50px; width: 300px; font-size:larger;" href="{{route('answer.show',$quizz->id)}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">بدء الامتحان  </a><br><br>
                </div>
            </div>
        </div>











    <!--=================================
    wrapper -->

    <!--=================================
    footer -->

    @include('layouts.footer')
    </div>
</div>

<!--=================================
footer -->

@include('layouts.footer-scripts')

@stack('scripts')

</body>

</html>
