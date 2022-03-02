<!DOCTYPE html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <link rel="icon" type="image/png" href="<?php echo $asset_url; ?>images/logo.png"/>
                                <title>e-Client Form</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <style>body {
    background-color: #FFEBEE
}

.card {
    width: 400px;
    background-color: #fff;
    border: none;
    border-radius: 12px
}

label.radio {
    cursor: pointer;
    width: 100%
}

label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio span {
    padding: 7px 14px;
    border: 2px solid #eee;
    display: inline-block;
    color: #039be5;
    border-radius: 10px;
    width: 100%;
    height: 48px;
    line-height: 27px
}

label.radio input:checked+span {
    border-color: #039BE5;
    background-color: #81D4FA;
    color: #fff;
    border-radius: 9px;
    height: 48px;
    line-height: 27px
}

.form-control {
    margin-top: 10px;
    height: 48px;
    border: 2px solid #eee;
    border-radius: 10px
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid #039BE5
}

.agree-text {
    font-size: 12px
}

.terms {
    font-size: 12px;
    text-decoration: none;
    color: #039BE5
}

.confirm-button {
    height: 50px;
    border-radius: 10px
}</style>
                                </head>
                                <body oncontextmenu='return false' class='snippet-body'>
                                <div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card px-1 py-4">
        <div class="card-body">
        <form action="saveclientform" method="POST" onsubmit="checkConfirmed(event)">
            <center><img src="<?php echo $asset_url; ?>images/logo.png" alt="PSC Logo" width="40px"></center>
            <h6 class="information mt-4">Please provide following information</h6>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="firstname" placeholder="First Name"> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="lastname" placeholder="Last Name" required> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="middlename" placeholder="Middle Name"> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="mobile" placeholder="Mobile" required> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="email" placeholder="Email Address" required> </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">

                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Birth date</label>
                              <input type="date" name="birthdate" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <select class="form-control" name="nationality" required>
                            <option>Select Nationality</option>
                            <?php
                                foreach ($nationality as $row1) {
                                  echo "<option>".$row1->nationality."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <select class="form-control" name="qualifications" required>
                            <option>Select Qualifications</option>
                            <?php
                                foreach ($qualifications as $row2) {
                                  echo "<option>".$row2->value."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <select class="form-control" name="civilstatus" required>
                            <option>Select Civil Status</option>
                            <?php
                                foreach ($civilstatus as $row3) {
                                  echo "<option>".$row3->value."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="noofchildren" placeholder="No. of Children"> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> --> <input class="form-control" type="password" name="password"  placeholder="Password" required> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> --> <input class="form-control" type="password" name="password2" placeholder="Re-type Password" required> </div>
                </div>
            </div>
            <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"><small><input type="checkbox" id="confirm1"> I have read, understood and content to the Privacy Policy (clickable)</small></div>
<div class=" d-flex flex-column text-center px-5 mt-3 mb-3"><small><input type="checkbox" id="confirm2"> I consent to receiving information and updates</small></div> <button class="btn btn-primary btn-block confirm-button" type="submit">Submit</button>
        </form>
        </div>
    </div>
</div>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src=''></script>
<script type='text/Javascript'>
    function checkConfirmed(e) {
        if (document.getElementById('confirm1').checked != true) {
                alert("Please confirm on policy checks!");
                e.preventDefault();
        } 

        if (document.getElementById('confirm2').checked != true) {
                alert("Please confirm on consent checks!");
                e.preventDefault();
        }
    }
</script>
</body>
</html>