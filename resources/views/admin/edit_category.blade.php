@extends('admin.admin_layout')
@section('admin_content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ажурирај Содржина</h3>
                        <form class="form-horizontal" action="{{route('update-category',['id'=>$category->id])}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <fieldset>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCategory">Име на содржината</label>
                            <input type="text" name="category" value="{{$category->category}}" class="form-control">
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
