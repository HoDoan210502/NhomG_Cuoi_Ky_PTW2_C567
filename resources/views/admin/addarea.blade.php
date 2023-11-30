@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add Area
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
                <form role="form" action="{{URL::to('/save_area')}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Area's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Area's Name" name="area_name" maxlength="200" pattern=".{1,}" required>

                        <span id="area_name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="area_status" class="form-control m-bot15">
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Area's Description</label>
                        <textarea type="password" rows="8" class="form-control" id="exampleInputPassword1" maxlength="200" placeholder="Description" name="area_desc"></textarea>
                    </div>

                    <button type="submit" name="add_area" class="btn btn-info">Add Area</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var area_name = document.getElementById("exampleInputEmail1").value;
        if (area_name.trim() === "") {
            document.getElementById("area_name-error").textContent = "Area's Name is required.";
            return false; // Prevent form submission
        } else {
            document.getElementById("area_name-error").textContent = ""; // Clear any previous error messages
            return true; // Allow form submission
        }
    }
</script>
@endsection