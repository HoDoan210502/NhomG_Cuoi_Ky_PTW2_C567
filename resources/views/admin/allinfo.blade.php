@extends('adminlayout')
@section('admincontent')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            All User Information
        </div>
        <div class="table-responsive">
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ($message) {
                echo '<span class="text_message">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>User</th>
                        <th>Payment method</th>
                        <th>Number</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_info as $key => $pro)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{($pro->user_name)}}</td>
                        <td>{{($pro->pay_name)}}</td>
                        <td>{{($pro->info_number)}}</td>
                        <td>
                            <a href="{{URL::to('/edit_info/'.$pro->info_id)}}" class="active" ui-toggle-class="">
                                <button><i class="fa fa-pencil text-success text-active">
                                    </i></button></a>
                            <a onclick="return confirm('Are u sure about that????')" href="{{URL::to('/delete_info/'.$pro->info_id)}}" class="active" ui-toggle-class="">
                                <button><i class="fa fa-times text-danger text">
                                    </i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <footer class="panel-footer">
            {{ $all_info->links('pagination::bootstrap-4', ['prev_text' => '', 'next_text' => '']) }}
        </footer>
    </div>
</div>
@endsection