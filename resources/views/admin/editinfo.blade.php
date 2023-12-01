@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit User Information
        </header>
        <div class="panel-body">
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ($message) {
                echo '<span class="text_message">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="position-center">
                @foreach($editinfo as $key => $pro)
                <form role="form" action="{{URL::to('/update_info/'.$pro->info_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">User's ID</label>
                        <select name="info_user" class="form-control m-bot15">
                            @foreach($user_info as $key => $cate)
                            <option selected value="{{($cate->user_id)}}">{{($cate->user_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Payment Method</label>
                        <select name="info_pay" class="form-control m-bot15">
                            @foreach($pay_info as $key => $manu)
                            <option selected value="{{($manu->pay_id)}}">{{($manu->pay_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Number</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" maxlength="200" value="{{$pro->info_number}}" name="info_number">
                    </div>

                    <button type="submit" name="update_info" class="btn btn-info">Save Info</button>
                </form>
                @endforeach
            </div>

        </div>
    </section>
</div>
<script>
    
    function validateForm() {
        var info_number = document.getElementById("info_number").value;
        var isValid = true;

        if (info_number.trim() === "") {
            document.getElementById("info_number-error").textContent = "Can't be null";
            isValid = false;
        } else {
            document.getElementById("info_number-error").textContent = "";
        }

        return isValid;
    }
</script>
@endsection