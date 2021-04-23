@extends('admin.admin_layout')
@section('admin_content')
    <p class="alert-success">
        <?php
        use Illuminate\Support\Facades\DB;use Illuminate\Support\Facades\Session;$message=Session::get('message');
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
                        <th>URL</th>
                        <th>Опис на книга</th>
                        <th>Преведена од</th>
                        <th>Категорија</th>
                        <th>Потекло</th>
                        <th>Автор</th>
                        <th>Година на издавање</th>
                        <th>Слика</th>
                        <th>Цена</th>
                        <th>Количина</th>
                        <th>Статус</th>
                        <th style="text-align: center">Опции</th>
                    @foreach($allBookInfo as $book)
                        @php
                            $categories=DB::table('categories')->select('category')->where('id',$book->category_id)->get();
                            $authors=DB::table('authors')->select('name','surname')->where('id',$book->author_id)->get();
                            $origins=DB::table('origin')->select('origin')->where('id',$book->origin_id)->get();
                        @endphp
                            <tbody>
                        <tr>
                            <td>{{$book->id}}</td>
                            <td class="center">{{$book->title}}</td>
                            <td class="center">{{$book->slug}}</td>
                            <td class="center">{{strip_tags($book->short_description)}}</td>
                            <td class="center">{{$book->translator}}</td>
                            <td>@foreach($categories as $category) {{$category->category}} @endforeach</td>
                            <td>@foreach($origins as $origin) {{$origin->origin}} @endforeach</td>
                            <td>@foreach($authors as $author) {{$author->name}} {{$author->surname}} @endforeach</td>
                            <td class="center">{{$book->year}}</td>
                            <td style="text-align: center;"><img src="{{url('images/',$book->photo)}}"  class="img-fluid zoomIn" alt="{{$book->photo}}" width="50"></td>
{{--                            <td class="center">{{$book->photo}}</td>--}}
{{--                            <td>--}}
{{--                                @if($book->photo)--}}
{{--                                    @php--}}
{{--                                        $photo=explode(',',$book->photo);--}}
{{--                                    @endphp--}}
{{--                                    <img src="{{url('images/')}}" class="img-fluid zoom" style="max-width:80px" alt="{{$book->photo}}">--}}
{{--                                @else--}}
{{--                                    <img src="{{url('images/')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">--}}
{{--                                @endif--}}
{{--                            </td>--}}
                            <td class="center">{{$book->price}}</td>
                            <td class="center">{{$book->quantity}}</td>

                            <td class="center">
                                @if($book->publication_status==1)
                                    <span class="label label-success">Активен</span>
                                @else
                                    <span class="label label-danger">Неактивен</span>
                                @endif
                            </td>
                            <td class="center" style="text-align:center">
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
{{--                                    <button type="submit" class="btn btn-danger">Избриши</button>--}}
                                    <a class="btn btn-danger" onclick="return confirm('Дали сте сигурни дека сакате да ја избришите оваа Книга?')" href="{{route('delete-book', $book->id)}}">Избриши</a>
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
