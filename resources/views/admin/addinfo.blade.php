@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add User Information
        </header>
        <div class="panel-body">
            @if(Session::has('message'))
            <span class="text_message">{{ Session::get('message') }}</span>
            @endif

            <div class="position-center">
                <form role="form" action="{{URL::to('/save_info')}}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputPassword1">User's Name</label>
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
                        <input type="number" class="form-control" id="info_number" placeholder="Info Number" name="info_number" required>
                        <span id="info_number-error" class="text-danger"></span>
                    </div>
                    <button type="submit" name="add_info" class="btn btn-info">Add Product</button>
                </form>
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