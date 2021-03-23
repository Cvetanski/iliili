@extends('admin.admin_layout')
@section('admin_content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додади Содржина</h3>
                        <form class="form-horizontal" action="{{asset('/save-coupon')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"></button>
                                    <i class="fas fa-minus"></i>
                                </div>
                    </div>
{{--                    <div class="card-body">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="inputCode">Код</label>--}}
{{--                            <input type="text" name="code" id="code" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputType">Тип на купон</label>--}}
{{--                                <select class="form-control custom-select" name="type">--}}
{{--                                    <option>fixed</option>--}}
{{--                                    <option>percent</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                    <div class="card-body">
                        <label for="type" class="col-form-label">Тип на купонот <span class="text-danger"></span></label>
                        <select name="type" class="form-control">
                            <option value="fixed">Денарска вредност</option>
                            <option value="percent">Проценти</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                            <div class="card-body">
                                <label for="inputUser">Одберетe корисник</label>
                                <select class="form-control custom-select" name="user_id">
                                    <option></option>
                                    <?php
                                    use Illuminate\Support\Facades\DB;$allUsers=DB::table('users')
                                        ->get();
                                    foreach ($allUsers as $user){?>
                                    <option  value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="card-body">
                                <label for="inputValue">Вредност на купонот</label>
                                <input type="text" name="value" id="value" class="form-control">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="inputPercent">Проценти</label>--}}
{{--                                <input type="text" name="percent_of" id="percent_if" class="form-control">--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
{{--            </div>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="margin-left: 33px">Додади</button>
            </div>
        </div>
    </section>
    </div>
    </fieldset>
    </form>





{{--<div class="card">--}}
{{--    <h5 class="card-header">Add Coupon</h5>--}}
{{--    <div class="card-body">--}}
{{--        <form method="post" action="{{route('save-coupon')}}">--}}
{{--            {{csrf_field()}}--}}
{{--            <div class="form-group">--}}
{{--                <label for="inputCode" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>--}}
{{--                <input id="code" type="text" name="code" placeholder="Enter Coupon Code"  value="{{old('code')}}" class="form-control">--}}
{{--                @error('code')--}}
{{--                <span class="text-danger">{{$message}}</span>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="type" class="col-form-label">Type <span class="text-danger">*</span></label>--}}
{{--                <select name="type" class="form-control">--}}
{{--                    <option value="fixed">Fixed</option>--}}
{{--                    <option value="percent">Percent</option>--}}
{{--                </select>--}}
{{--                @error('type')--}}
{{--                <span class="text-danger">{{$message}}</span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="inputUser">Одберетe корисник</label>--}}
{{--                <select class="form-control custom-select" name="user_id">--}}
{{--                    <option></option>--}}
{{--                    <?php--}}
{{--                    use Illuminate\Support\Facades\DB;$allUsers=DB::table('users')--}}
{{--                        ->get();--}}
{{--                    foreach ($allUsers as $user){?>--}}
{{--                    <option  value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>--}}
{{--                    <?php } ?>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="inputTitle" class="col-form-label">Value <span class="text-danger">*</span></label>--}}
{{--                <input id="inputTitle" type="number" name="value" placeholder="Enter Coupon value"  value="{{old('value')}}" class="form-control">--}}
{{--                @error('value')--}}
{{--                <span class="text-danger">{{$message}}</span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            <div class="form-group mb-3">--}}
{{--                <button class="btn btn-success" type="submit">Submit</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

{{--@push('styles')--}}
{{--    <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">--}}
{{--@endpush--}}
{{--@push('scripts')--}}
{{--    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>--}}
{{--    <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>--}}
{{--    <script>--}}
{{--        $('#lfm').filemanager('image');--}}

{{--        $(document).ready(function() {--}}
{{--            $('#description').summernote({--}}
{{--                placeholder: "Write short description.....",--}}
{{--                tabsize: 2,--}}
{{--                height: 150--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}

