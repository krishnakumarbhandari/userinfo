<html>
<head>
    <title>User Info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3 col-sm-8">
    <h3>UserInfo Record Form:</h3>
    <div class="col-sm-12  mt-3">
        <form id="userinfo_form">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Name</label>
                    <input type="text" class="form-control" placeholder="Krishna Kumar bhandari" name="name" required>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Address</label>
                    <input type="text" class="form-control" placeholder="Kathmandu" name="address" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Phone</label>
                    <input type="number" class="form-control" placeholder="9841584969" name="phone" required>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Gender</label><br>
                    <label class="form-check-label">
                        <input class="form-check-input radio" type="radio" name="gender" value="male" checked>
                        <span class="ml-1 activate">Male</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input radio" type="radio" name="gender" value="female">
                        <span class="ml-1 activate">Female</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Email</label>
                    <input type="email" class="form-control" placeholder="bhandarikrishnakumar2048@gmail.com"
                           name="email" required>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Nationality</label>
                    <input type="text" class="form-control" placeholder="Nepali" name="nationality" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Date of birth</label>
                    <input type="date" class="form-control" name="dob"
                           placeholder="Enter Date of birth" data-inputmask="'alias': 'mm/dd/yyyy'"
                           data-mask required></div>
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Mode of Contact</label><br>
                    <label class="form-check-label">
                        <input class="form-check-input radio" type="radio" name="mode_of_contact" value="email" checked>
                        <span class="ml-1">Email</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input radio" type="radio" name="mode_of_contact" value="phone">
                        <span class="ml-1">Phone</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input radio" type="radio" name="mode_of_contact" value="none">
                        <span class="ml-1">None</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="label font-weight-bold">Education Background</label>
                    <textarea rows="4" class="form-control" cols="60" name="education_background"
                              placeholder="Enter education background" required></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Add">
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
               required:true
            }
        },
        errorPlacement: function (error, element) {
            $(error).insertAfter(element);
        },

    });
</script>
<style>
    .errorClass {
        color: #FF0000; /* red */
    }
</style>
</body>
</html>