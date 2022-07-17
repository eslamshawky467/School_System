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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    @include('layouts.head')
    <style>
    p {
    text-align: center;
    font-size: 60px;
    margin-top: 0px;
    }
    </style>
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
                    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{auth()->user()->name}}  :اسم الطالب  </h4>
                    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{$quizzes}}  :اسم الاختبار  </h4>
                    <p id="demo"></p>
                </div><br><br>





                <!-- Orders Status widgets-->


                    <div class="col-md-12">
                        <br>

                        @foreach($questions as $question)
                            <form class="pt-4 from-prevent-multiple-submits" id="my-form" action="{{route('answer.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label style="width:800px; font-size: x-large" for="title">{{ $loop->iteration}}-{{$question->title}}</label>
                                        <input type="hidden" value="{{$quizz_id}}" name="quizze_id[]">
                                        <input type="hidden" value="{{$question->id}}" name="question_id[]">
                                        <input type="hidden" value="{{auth()->user()->id}}" name="student_id[]">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label style="width:800px; font-size: large" for="exampleFormControlTextarea1">الاجابة الصحيحة
                                        :  </label>
                                    <select name="option[]"
                                      style="width:800px; font-size: large"      id="exampleFormControlTextarea1" class="form-select" aria-label="Default select example" required>
                                        <option style="width:800px; font-size: large"  value="1">A-{{$question->option1}}</option>
                                        <option  style="width:800px; font-size: large" value="2">B-{{$question->option2}}</option>
                                        <option  style="width:800px; font-size: large" value="3">C--{{$question->option3}}</option>
                                        <option  style="width:800px; font-size: large" value="4">D-{{$question->option4}}</option>
                                    </select>
                                </div>
                                <br>
                        @endforeach
                    </div>
                    <br>
                    <button style="width:820px; font-size: large" class="btn btn-success btn-sm nextBtn btn-lg pull-right from-prevent-multiple-submits" type="submit" id="btn-submit">حفظ البيانات</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</div>

</div>







<!--=================================
wrapper -->

<!--=================================
footer -->

@include('layouts.footer')
</div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('layouts.footer-scripts')

@stack('scripts')
<script type="text/javascript">

    $(document).ready(function () {

        $("#my-form").submit(function (e) {

            $("#btn-submit").attr("disabled", true);

            return true;

        });

    });

</script>
<script type="text/javascript">
    (function(){
        $('.from-prevent-multiple-submits').on('submit', function(){
            $('.from-prevent-multiple-submits').attr('disabled','true');
        })
    })();
</script>
</body>

</html>
