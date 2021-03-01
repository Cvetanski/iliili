@extends('admin.admin_layout')
@section('admin_content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додади Содржина</h3>
                        <form class="form-horizontal" action="{{asset('/save-author')}}" method="post" enctype="multipart/form-data">
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
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Име на Авторот</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                            <div class="form-group">
                                <label for="inputName">Презиме на авторот</label>
                                <input type="text" name="surname" id="surname" class="form-control">
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

