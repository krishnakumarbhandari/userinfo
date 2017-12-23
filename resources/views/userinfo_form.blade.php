<?php
$name = "";
$address = "";
$gender = "";
$phone = "";
$email = "";
$nationality = "";
$dob = "";
$education_background = "";
$mode_of_contact = "";
$btn_value = 0;
$action = route('store_user_info');
if (isset($edit_data) && sizeof($edit_data)) {
    $id = $edit_data[0];
    $name = $edit_data[1];
    $address = $edit_data[2];
    $gender = $edit_data[3];
    $phone = $edit_data[4];
    $email = $edit_data[5];
    $nationality = $edit_data[6];
    $dob = $edit_data[7];
    $education_background = $edit_data[8];
    $mode_of_contact = $edit_data[9];
    $btn_value = 1;
    $action = route('update_user_info', $id); //edit ko url
}
if (isset($errors) && sizeof($errors)) {
    $name = old('name');
    $address = old('address');
    $gender = old('gender');
    $phone = old('phone');
    $email = old('emal');
    $nationality = old('nationality');
    $dob = old('dob');
    $education_background = old('education_background');
    $mode_of_contact = old('mode_of_contact');

}
?>
<html>
<head>
    <title>User Info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3 col-sm-8">
    <h3>UserInfo Record Form:</h3>
    <a href="{{route('show_user_info')}}" class="btn btn-primary btn-sm mt-2 mb-3">View User Record</a>
    <div class="col-sm-12  mt-3">
        <form id="userinfo_form" action="{{$action}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name"
                           value="{{$name}}" required>
                    @if(!empty($errors->first('name')))
                        <div id="name-error" class="errorClass">This field is required</div>@endif
                </div>

                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Address</label>
                    <input type="text" class="form-control" placeholder="Enter Address" name="address"
                           value="{{ $address}}" required>
                    @if(!empty($errors->first('address')))
                        <div id="name-error" class="errorClass">This field is required</div>@endif

                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Phone</label>
                    <input type="text" class="form-control" placeholder="Enter Phone" name="phone"
                           value="{{ $phone }}" required>
                    @if(!empty($errors->first('phone')))
                        <div id="name-error" class="errorClass">{{ $errors->first('phone') }}</div>@endif

                </div>
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Gender</label><br>
                    <label class="form-check-label">
                        <input class="form-check-input radio" type="radio" name="gender" value="male"
                               @if($gender !='female')checked @endif>
                        <span class="ml-1 activate">Male</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input radio" type="radio" name="gender" value="female"
                               @if($gender=='female')checked @endif>
                        <span class="ml-1 activate">Female</span>
                    </label>
                    @if(!empty($errors->first('gender')))
                        <div id="name-error" class="errorClass">This field is required</div>@endif

                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Email"
                           name="email" value="{{ $email }}" required>
                    @if(!empty($errors->first('email')))
                        <div id="name-error" class="errorClass">{{ $errors->first('email') }}</div>@endif

                </div>
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Nationality</label>
                    <input type="text" class="form-control" placeholder="Enter Nationality" name="nationality"
                           value="{{ $nationality }}" required>
                    @if(!empty($errors->first('nationality')))
                        <div id="name-error" class="errorClass">This field is required</div>@endif

                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Date of birth</label>
                    <input type="date" class="form-control" name="dob"
                           placeholder="Enter Date of birth" data-inputmask="'alias': 'mm/dd/yyyy'"
                           data-mask value="{{ $dob}}" required>
                    @if(!empty($errors->first('dob')))
                        <div id="name-error" class="errorClass">This field is required</div>@endif

                </div>
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Mode of Contact</label><br>
                    <label class="form-check-label">
                        <input class="form-check-input radio" type="radio" name="mode_of_contact" value="email"
                               @if($mode_of_contact !='phone' & $mode_of_contact !='none')checked @endif required>
                        <span class="ml-1">Email</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input radio" type="radio" name="mode_of_contact" value="phone"
                               @if($mode_of_contact=='phone')checked @endif>
                        <span class="ml-1">Phone</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input radio" type="radio" name="mode_of_contact" value="none"
                               @if($mode_of_contact=='none')checked @endif>
                        <span class="ml-1">None</span>
                    </label>
                    @if(!empty($errors->first('mode_of_contact')))
                        <div id="name-error" class="errorClass">This field is required</div>@endif

                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Education Background</label>
                    <textarea rows="4" class="form-control" cols="60" name="education_background"
                              placeholder="Enter education background" required>{{ $education_background }}</textarea>
                    @if(!empty($errors->first('education_background')))
                        <div id="name-error" class="errorClass">This field is required</div>@endif

                </div>
            </div>
            @if($btn_value==0)
                <input type="submit" class="btn btn-primary" value="Add">
            @else
                <input type="submit" class="btn btn-primary" value="Update">

            @endif
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script>
    //form validation
    var formValid = $('#userinfo_form');
    formValid.validate({
        debug: false,
        errorClass: "errorClass",
        errorElement: "div",
        rules: {
            name: {
                required: true
            },
            phone: {
                required: true
            }
        },
        errorPlacement: function (error, element) {
            $(error).insertAfter(element);
        }
    });
</script>
<style>
    .errorClass {
        color: #FF0000; /* red */
    }
</style>
</body>
</html>