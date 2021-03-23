@extends('admin.admin_layout')
@section('admin_content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ажурирај Содржина</h3>
                        <form class="form-horizontal" action="{{url('/update-author',['id'=>$authorInfo->id])}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <fieldset>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                    </div>
{{--                    <div class="control-group">--}}
{{--                        <div class="controls">--}}
{{--                            <input type="hidden" name="author_id" <?php--}}
{{--                            use Illuminate\Support\Facades\DB;$allAuthors=DB::table('authors')--}}
{{--                                ->get();--}}
{{--                            foreach ($allAuthors as $author){?>--}}
{{--                            <option  value="{{$author->id}}"></option>--}}
{{--                            <?php } ?>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Име на содржината</label>
                            <input type="text" name="name" value="{{$authorInfo->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputSurname">Опис за содржината</label>
                            <textarea name="surname" id="surname" class="form-control" rows="4">{{$authorInfo->surname}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="margin-left: 12px">Ажурирај Содржина</button>
            </div>
        </div>
    </section>
    </div>
    </fieldset>
    </form>

@endsection
