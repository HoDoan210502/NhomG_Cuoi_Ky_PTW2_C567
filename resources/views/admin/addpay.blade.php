@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add Payment Method
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
                <form role="form" action="{{URL::to('/save_pay')}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Method's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Payment Method's Name" name="pay_name" maxlength="200" pattern=".{1,}" required>

                        <span id="pay_name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="pay_status" class="form-control m-bot15">
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Payment Method's Description</label>
                        <textarea type="password" rows="8" class="form-control" id="exampleInputPassword1" maxlength="200" placeholder="Description" name="pay_desc"></textarea>
                    </div>

                    <button type="submit" name="add_pay" class="btn btn-info">Add Payment Method</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var pay_name = document.getElementById("exampleInputEmail1").value;
        if (pay_name.trim() === "") {
            document.getElementById("pay_name-error").textContent = "Payment Method's Name is required.";
            return false; // Prevent form submission
        } else {
            document.getElementById("pay_name-error").textContent = ""; // Clear any previous error messages
            return true; // Allow form submission
        }
    }
</script>
@endsection