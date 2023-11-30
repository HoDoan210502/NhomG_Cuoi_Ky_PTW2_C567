@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit Transportation
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
            @foreach($edit_trans as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/update_trans/'.$edit_value->trans_id)}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Transportation's Name</label>
                        <input type="text" value="{{($edit_value->trans_name)}}" class="form-control" id="trans_name" maxlength="200" placeholder="Transportation's Name" name="trans_name" required>
                        <span id="trans_name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Transportation's Description</label>
                        <textarea value="{{($edit_value->trans_desc)}}" rows="8" class="form-control" maxlength="200" id="trans_desc" name="trans_desc"></textarea>
                    </div>
                    <button type="submit" name="update_trans" class="btn btn-info">Save Transportation</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var trans_name = document.getElementById("trans_name").value;
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
