
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
                        <th>Име</th>
                        <th>Презиме</th>
                        <th style="text-align: center">Опции</th>
                    @foreach($authors as $author)
                        <tbody>
                        <tr>
                            <td>{{$author->id}}</td>
                            <td class="center">{{$author->name}}</td>
                            <td class="center">{{$author->surname}}</td>
{{--                            <td class="center">--}}
{{--                                @if($content->publication_status==1)--}}
{{--                                    <span class="label label-success">Активен</span>--}}
{{--                                @else--}}
{{--                                    <span class="label label-danger">Неактивен</span>--}}
{{--                                @endif--}}
{{--                            </td>--}}
                            <td class="center" style="text-align: center">
{{--                                @if($content->publication_status==1)--}}
{{--                                    <form class="d-inline" action="{{route('unactive-about',['id'=>$content->id])}}">--}}
{{--                                        <button type="submit" class="btn btn-warning">Деактивирај</button>--}}
{{--                                    </form>--}}
{{--                                @else--}}
{{--                                    <form class="d-inline" action="{{route('active-about',['id'=>$content->id])}}">--}}
{{--                                        <button type="submit" class="btn btn-success">Активирај</button>--}}
{{--                                    </form>--}}
{{--                                @endif--}}
                                <form class="d-inline" action="{{route('edit-author',['id'=>$author->id])}}">
                                    <button type="submit" class="btn btn-info">Измени</button>
                                </form>
                                <form class="d-inline" action="{{route('delete-author',['id'=>$author->id])}}">
                                    <button type="submit" class="btn btn-danger">Избриши</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->
{{--        --}}
{{--                <form class="d-inline" action="{{route('delete-about',['id'=>$content->id])}}" method="POST">--}}
{{--                    @method('delete')--}}
{{--                    @csrf--}}
{{--                    <button type="submit" class="btn btn-danger">Избриши</button>--}}
{{--                </form>--}}
{{--                <form class="d-inline" action="{{route('edit-about',['id'=>$content->id])}}" method="GET">--}}
{{--                    @csrf--}}
{{--                    <button type="submit" class="btn btn-warning">Измени</button>--}}
{{--                </form>--}}
{{--                @if($content->publication_status == 1)--}}
{{--                    <form class="d-inline" action="{{route('unactive-about',['id'=>$content->id])}}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-info">Деактивирај</button>--}}
{{--                        @elseif($content->publication_status == 0)--}}
{{--                            <form class="d-inline" action="{{route('activate-about',['id'=>$content->id])}}">--}}
{{--                                <button type="submit" class="btn btn-info">Активирај</button>--}}
{{--                                @endif--}}
{{--                            </form>--}}
{{--                    </form>--}}
{{--    </div><!--/row-->--}}

@endsection
