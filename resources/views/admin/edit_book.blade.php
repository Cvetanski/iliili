@extends('admin.admin_layout')
@section('admin_content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ажурирај Содржина</h3>
                        <form class="form-horizontal" action="{{route('update-book',['id'=>$bookInfo->id])}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <fieldset>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Име на содржината</label>
                            <input type="text" name="title" value="{{$bookInfo->title}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Опис за книгата</label>
                            <textarea  name="short_description" id="short_description" class="ckeditor" rows="4">{{$bookInfo->short_description}}</textarea>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputTranslator">Преведена од:</label>
                                <input type="text" name="translator" id="translator" class="form-control" value="{{$bookInfo->translator}}">
                            </div>
                            <div class="form-group">
                                <label for="inputCategory">Одберете категорија</label>
                                <select class="form-control custom-select"  id="categories" name="category_id">
                                    <option</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{(($product->brand_id==$brand->id)? 'selected':'')}}>{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputOrigin">Одбери потекло</label>
                                <select class="form-control custom-select" id="origin" name="origin_id">
                                    <?php
                                    $allOrigins=DB::table('origin')
                                        ->get();
                                    foreach ($allOrigins as $origin){?>
                                    <option  value="{{$origin->id}}">{{$origin->origin}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAuthors">Одбери Автор</label>
                                <select class="form-control custom-select" name="author_id">
                                    <?php
                                    $allAuthors=DB::table('authors')
                                        ->get();
                                    foreach ($allAuthors as $author){?>
                                    <option  value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputYear">Година на издавање</label>
                                <input type="text" name="year" id="year" class="form-control" value="{{$bookInfo->year}}">
                            </div>
                            <div class="form-group">
                                <label for="inputPrice">Цена на книгата</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{$bookInfo->price}}">
                            </div>
                            <div class="form-group">
                                <label for="inputQuantity">Количина</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" value="{{$bookInfo->quantity}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="fileInput">Прикачи документ</label>
                                <div class="controls">
                                    <input class="input-file uniform_on" name="file" id="file" type="file" value="{{$bookInfo->file}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="fileInput">Прикачи документ</label>
                                <div class="controls">
                                    <input class="input-file uniform_on" name="photo" id="photo" type="photo" value="{{$bookInfo->photo}}">
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
                <button type="submit" class="btn btn-primary" style="margin-left: 12px">Ажурирај Содржина</button>
            </div>
        </div>
    </section>
    </div>
    </fieldset>
    </form>

@endsection
