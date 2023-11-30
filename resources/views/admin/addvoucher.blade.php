@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add Voucher
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
                <form role="form" action="{{URL::to('/save_vou')}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Voucher's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Voucher's Name" name="vou_name" maxlength="200" pattern=".{1,}" required>

                        <span id="vou_name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="vou_status" class="form-control m-bot15">
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Voucher's Description</label>
                        <textarea type="password" rows="8" class="form-control" id="exampleInputPassword1" maxlength="200" placeholder="Description" name="vou_desc"></textarea>
                    </div>

                    <button type="submit" name="add_vou" class="btn btn-info">Add Voucher</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var vou_name = document.getElementById("exampleInputEmail1").value;
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