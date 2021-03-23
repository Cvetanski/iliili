@extends('admin.admin_layout')
@section('admin_content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додади Содржина</h3>
                        <form class="form-horizontal" action="{{asset('/save-delivery')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"></button>
                                    <i class="fas fa-minus"></i>
                                </div>
                    </div>
                    <div class="card-body">
                        <label for="inputType">Град на достава</label>
                        <input type="text" name="type" id="type" class="form-control">
                    </div>
{{--                    <div class="card-body">--}}
{{--                        <label for="inputUser">Одберетe корисник</label>--}}
{{--                        <select class="form-control custom-select" name="user_id">--}}
{{--                            <option></option>--}}
{{--                            <?php--}}
{{--                            use Illuminate\Support\Facades\DB;$allUsers=DB::table('users')--}}
{{--                                ->get();--}}
{{--                            foreach ($allUsers as $user){?>--}}
{{--                            <option  value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>--}}
{{--                            <?php } ?>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="card-body">
                        <label for="inputPrice">Цена на достава</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                </div>
            </div>
{{--        </div>--}}
{{--        </div>--}}
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
@endsection

