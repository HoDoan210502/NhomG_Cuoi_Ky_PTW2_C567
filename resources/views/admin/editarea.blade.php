@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit Area
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
            @foreach($edit_area as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/update_area/'.$edit_value->area_id)}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Area's Name</label>
                        <input type="text" value="{{($edit_value->area_name)}}" class="form-control" id="area_name" maxlength="200" placeholder="Area's Name" name="area_name" required>
                        <span id="area_name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Area's Description</label>
                        <textarea value="{{($edit_value->area_desc)}}" rows="8" class="form-control" maxlength="200" id="area_desc" name="area_desc"></textarea>
                    </div>
                    <button type="submit" name="update_area" class="btn btn-info">Save Area</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var area_name = document.getElementById("area_name").value;
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
