<!DOCTYPE html>
<html lang="en">
@section('title')
    {{trans('main_trans.Main_title')}}
@stop
<head>
    <meta charset="utf-8">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')

</head>

<body style="font-family: 'Cairo', sans-serif">

<div class="wrapper" style="font-family: 'Cairo', sans-serif">

    <!--=================================
preloader -->



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
                </div><br><br>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                       data-page-length="50"
                       style="text-align: center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الاختبار</th>
                        <th>المرحلة الدراسية</th>
                        <th>الصف الدراسي</th>
                        <th>القسم</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->grade->Name}}</td>
                            <td>{{$d->classroom->Name_Class}}</td>
                            <td>{{$d->section->Name_Section}}</td>
                            <td>

                              <a href="{{route('ansu',$d->id)}}"
                                   class="btn btn-success btn-sm" title="عرض النتيجة" role="button" aria-pressed="true">عرض النتيجة </a>
                                <a href="{{route('Registerindex',$d->id)}}"
                                   class="btn btn-warning btn-sm"  role="button" aria-pressed="true">الدخول الي صفحة التسجيل </a>
                            </td>
                    @endforeach
        <!-- Orders Status widgets-->



    </div>

</div>







<!--=================================
wrapper -->

<!--=================================
footer -->


</div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('layouts.footer-scripts')

@stack('scripts')

</body>

</html>
