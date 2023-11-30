@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit Voucher
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
            @foreach($edit_vou as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/update_vou/'.$edit_value->vou_id)}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Voucher's Name</label>
                        <input type="text" value="{{($edit_value->vou_name)}}" class="form-control" id="vou_name" maxlength="200" placeholder="Voucher's Name" name="vou_name" required>
                        <span id="vou_name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Voucher's Description</label>
                        <textarea value="{{($edit_value->vou_desc)}}" rows="8" class="form-control" maxlength="200" id="vou_desc" name="vou_desc"></textarea>
                    </div>
                    <button type="submit" name="update_vou" class="btn btn-info">Save Voucher</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var vou_name = document.getElementById("pay_name").value;
        if (vou_name.trim() === "") {
            document.getElementById("vou_name-error").textContent = "Voucher's Name is required.";
            return false; // Prevent form submission
        } else {
            document.getElementById("vou_name-error").textContent = ""; // Clear any previous error messages
            return true; // Allow form submission
        }
    }
</script>
@endsection
