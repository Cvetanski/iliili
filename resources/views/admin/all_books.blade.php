@extends('admin.admin_layout')
@section('admin_content')
    <p class="alert-success">
        <?php
        use Illuminate\Support\Facades\Session;$message=Session::get('message');
        if('message')
        {
            echo $message;
            Session::put('message', NULL);
        }
        ?>
    </p>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Реден број</th>
                        <th>Име на книга</th>
                        <th>Опис на книга</th>
                        <th>Преведена од</th>
                        <th>Категорија</th>
                        <th>Потекло</th>
                        <th>Автор</th>
                        <th>Година на издавање</th>
                        <th>Цена</th>
                        <th>Количина</th>
                        <th>Статус</th>
                        <th style="text-align: center">Опции</th>
                    @foreach($allBookInfo as $book)
                        <tbody>
                        <tr>
                            <td>{{$book->id}}</td>
                            <td class="center">{{$book->title}}</td>
                            <td class="center">{{$book->short_description}}</td>
                            <td class="center">{{$book->translator}}</td>
                            <td class="center">{{$book->category_id}}</td>
                            <td class="center">{{$book->origin_id}}</td>
                            <td class="center">{{$book->author_id}}</td>
                            <td class="center">{{$book->year}}</td>
                            <td class="center">{{$book->price}}</td>
                            <td class="center">{{$book->quantity}}</td>

                            <td class="center">
                                @if($book->publication_status==1)
                                    <span class="label label-success">Активен</span>
                                @else
                                    <span class="label label-danger">Неактивен</span>
                                @endif
                            </td>
                            <td class="center" style="text-align: center">
                                @if($book->publication_status==1)
                                    <form class="d-inline" action="{{route('unactive-book',['id'=>$book->id])}}">
                                        <button type="submit" class="btn btn-warning">Деактивирај</button>
                                    </form>
                                @else
                                    <form class="d-inline" action="{{route('active-book',['id'=>$book->id])}}">
                                        <button type="submit" class="btn btn-success">Активирај</button>
                                    </form>
                                @endif
                                <form class="d-inline" action="{{route('edit-book',['id'=>$book->id])}}">
                                   <button type="submit" class="btn btn-info">Измени</button>
                                </form>
                                <form class="d-inline" action="{{route('delete-book',['id'=>$book->id])}}" id="delete">
                                    <button type="submit" class="btn btn-danger">Избриши</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
