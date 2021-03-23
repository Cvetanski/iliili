
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
                        <th>Наслов</th>
                        <th style="text-align: center">Опции</th>
                    @foreach($categories as $category)
                        <tbody>
                        <tr>
                            <td>{{$category->id}}</td>
                            <td class="center">{{$category->category}}</td>
                            <td class="center" style="text-align: center">
                                <form class="d-inline" action="{{route('edit-category',['id'=>$category->id])}}">
                                    <button type="submit" class="btn btn-info">Измени</button>
                                </form>
                                <form class="d-inline" action="{{route('delete-category',['id'=>$category->id])}}" id="delete">
                                    <button type="submit" class="btn btn-danger">Избриши</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->
    </div>
@endsection
