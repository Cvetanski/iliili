@extends('admin.admin_layout')
@section('admin_content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ажурирај Содржина</h3>
                        <form class="form-horizontal" action="{{route('update-coupon',['id'=>$coupon->id])}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <fieldset>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCode">Код на купонот</label>
                            <input type="text" name="code" value="{{$coupon->code}}" class="form-control">
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="type" class="col-form-label">Тип на купонот <span class="text-danger"></span></label>
                        <select name="type" class="form-control">
                            <option value="fixed" {{(($coupon->type=='fixed') ? 'selected' : '')}}>Денарска вредност</option>
                            <option value="percent" {{(($coupon->type=='percent') ? 'selected' : '')}}>Проценти</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputValue">Вредност на купонот</label>
                                <input type="text" name="value" id="value" class="form-control" value="{{$coupon->value}}">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputCategory">Одберете Корисник</label>
                                <select class="form-control custom-select"  id="user_id" name="user_id">
                                    <?php
                                    use Illuminate\Support\Facades\DB;$allUsers=DB::table('users')
                                        ->get();
                                    foreach ($allUsers as $user){?>
                                    <option  value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" style="margin-left: 12px">Ажурирај Содржина</button>
                        </div>
                    </div>
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>
{{--    </div>--}}
{{--    </fieldset>--}}
{{--    </form>--}}

@endsection
