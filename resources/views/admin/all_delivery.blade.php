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
                        <th>Град на достава</th>
                        <th>Цена на достава</th>
                        <th style="text-align: center">Опции</th>
                    @foreach($deliveries as $delivery)
                        <tbody>
                        <tr>
                            <td>{{$delivery->id}}</td>
                            <td class="center">{{$delivery->type}}</td>
                            <td class="center">{{$delivery->price}} мкд</td>
                            <td class="center" style="text-align: center">

                                <form class="d-inline" action="{{route('edit-delivery',['id'=>$delivery->id])}}">
                                    <button type="submit" class="btn btn-info">Измени</button>
                                </form>
                                <form class="d-inline" action="{{route('delete-delivery',['id'=>$delivery->id])}}" id="delete">
                                    {{--                                    <button type="submit" class="btn btn-danger">Избриши</button>--}}
                                    <a class="btn btn-danger" onclick="return confirm('Дали сте сигурни дека сакате да го избришите овај град од вашата достава!?')" href="{{route('delete-delivery', $delivery->id)}}">Избриши</a>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->
@endsection
