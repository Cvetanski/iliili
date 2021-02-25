@extends('admin.admin_layout')
@section('admin_content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додади Содржина</h3>
                        <form class="form-horizontal" action="{{asset('/save-about')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <fieldset>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="section_id" value="1">
                        </div>
                    </div>
{{--                    <div class="control-group">--}}
{{--                        <div class="controls">--}}
{{--                            <input type="hidden" name="user_id" <?php--}}
{{--                            $allUsers=DB::table('users')--}}
{{--                                ->where('id',1)--}}
{{--                                ->orWhere('id',3)--}}
{{--                                ->get();--}}
{{--                            foreach ($allUsers as $user){?>--}}
{{--                            <option  value="{{$user->id}}"></option>--}}
{{--                            <?php } ?>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Име на книгата</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Опис за книгата</label>
                            <textarea  name="description" id="description" class="ckeditor" rows="4"></textarea>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="inputStatus"></label>--}}
{{--                            <select class="form-control custom-select" name="language_id">--}}
{{--                                <option></option>--}}
{{--                                <?php--}}
{{--                                use Illuminate\Support\Facades\DB;$allCategory=DB::table('categories')--}}
{{--                                    ->where('id',1)--}}
{{--                                    ->orWhere('id',2)--}}
{{--                                    ->get();--}}
{{--                                foreach ($allCategory as $category){?>--}}
{{--                                <option  value="{{$category->category}}">{{$category->category}}</option>--}}
{{--                                <?php } ?>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label class="control-label" for="fileInput">Прикачи документ</label>
                            <div class="controls">
                                <input class="input-file uniform_on" name="" id="fileInput" type="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea2">Објави ја содржината</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="margin-left: 12px">Додади содржина</button>
            </div>
        </div>
    </section>
    </div>
    </fieldset>
    </form>
@endsection

