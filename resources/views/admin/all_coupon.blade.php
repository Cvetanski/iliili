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
                        <th>Купон</th>
                        <th>Тип на купонот</th>
                        <th>Вредност</th>
                        <th>Корисник</th>
                        <th style="text-align:center">Опции</th>
                    @foreach($coupons as $coupon)
                        @php
                            $coupons=DB::table('coupon_user')->select('is_used')->where('id',$coupon->is_used)->get();
                            $users=DB::table('users')->select('name','surname')->where('id',$coupon->user_id)->get();
                        @endphp
                        <tbody>
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td class="center">{{$coupon->code}}</td>
{{--                            <td class="center">{{$coupon->type}}</td>--}}
                            <td>
                                @if($coupon->type=='fixed')
                                    <span class="badge badge-primary">{{$coupon->type}}</span>
                                @else
                                    <span class="badge badge-warning">{{$coupon->type}}</span>
                                @endif
                            </td>
                            <td>
                                @if($coupon->type=='fixed')
                                    {{number_format($coupon->value,2)}}мкд
                                @else
                                    {{$coupon->value}}%
                                @endif
                            </td>
{{--                            <td>@foreach($coupons as $coupon) {{$coupon->is_used}} @endforeach</td>--}}
                            <td>@foreach($users as $user) {{$user->name}} {{$user->surname}} @endforeach</td>
                            <td>
                                <form class="d-inline" action="{{route('edit-coupon',['id'=>$coupon->id])}}">
                                    <button type="submit" class="btn btn-info">Измени</button>
                                </form>
                                <form class="d-inline" action="{{route('delete-coupon',['id'=>$coupon->id])}}" id="delete">
                                    {{--                                    <button type="submit" class="btn btn-danger">Избриши</button>--}}
                                    <a class="btn btn-danger" onclick="return confirm('Дали сте сигурни дека сакате да ја избришите оваа Книга?')" href="{{route('delete-coupon', $coupon->id)}}">Избриши</a>
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
