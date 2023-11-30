@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add Transportation
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
                <form role="form" action="{{URL::to('/save_trans')}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Transportation's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Transportation's Name" name="trans_name" maxlength="200" pattern=".{1,}" required>

                        <span id="trans_name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="trans_status" class="form-control m-bot15">
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Transportation's Description</label>
                        <textarea type="password" rows="8" class="form-control" id="exampleInputPassword1" maxlength="200" placeholder="Description" name="trans_desc"></textarea>
                    </div>

                    <button type="submit" name="add_trans" class="btn btn-info">Add Transportation</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var trans_name = document.getElementById("exampleInputEmail1").value;
        if (trans_name.trim() === "") {
            document.getElementById("trans_name-error").textContent = "Transportation's Name is required.";
            return false; // Prevent form submission
        } else {
            document.getElementById("trans_name-error").textContent = ""; // Clear any previous error messages
            return true; // Allow form submission
        }
    }
</script>
@endsection