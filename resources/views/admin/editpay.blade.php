@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit Payment Method
        </header>
        <?php
            use Illuminate\Support\Facades\Session;
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text_message">', $message, '</span>';
                Session::put('message', null);
            }
        ?>
        <div class="panel-body">
            @foreach($edit_pay as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/update_pay/'.$edit_value->pay_id)}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Method's Name</label>
                        <input type="text" value="{{($edit_value->pay_name)}}" class="form-control" id="pay_name" maxlength="200" placeholder="Payment Method's Name" name="pay_name" required>
                        <span id="pay_name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Payment Method's Description</label>
                        <textarea value="{{($edit_value->pay_desc)}}" rows="8" class="form-control" maxlength="200" id="pay_desc" name="pay_desc"></textarea>
                    </div>
                    <button type="submit" name="update_pay" class="btn btn-info">Save Payment Method</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var pay_name = document.getElementById("pay_name").value;
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
