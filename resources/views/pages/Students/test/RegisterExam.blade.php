@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ trans('Grades_trans.title_page') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        تسجيل الدخول للامتحان
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        @if ($errors->any())
            <div class="error">{{ $errors->first('Name') }}</div>
        @endif



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        تسجيل الدخول للامتحان
                    </button>
                    <br><br>

        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            تسجيل الدخول للامتحان
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach($questions as $q)
                        <!-- add_form -->
                        <form action="{{ route('RegisterExam',$q->quizze_id) }}" method="POST">
                            @csrf
                            @endforeach
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">برجاء ادخال الرقم السري
                                        :</label>
                                    <input id="Name" type="password" name="numberlog" class="form-control">
                                </div>
                                <div class="col">
                                    <input type="hidden" class="form-control" name="student_id" value={{auth()->user()->id}}>
                                </div>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-success">تأكيد</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
