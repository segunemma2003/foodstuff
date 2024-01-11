@extends('shared.layout')
@section('Title', "Open Restaurant")
@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: auto;
        border-radius: 10px;
        font-family: Raleway;
        padding: 40px;
        width: 100%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }


    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #E10C2C;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

        button:hover {
            opacity: 0.8;
        }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #E10C2C;
        }
</style>
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title" style="text-align:left;">Open A Restaurant!</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            {{-- <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li> --}}
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->
<!-- ============================ Download App ================================== -->
<section class="pb-0" style="background-image: url('{{ asset('assets/img/Bg1.png') }}');">
    <div class="container">
        <div class="row align-items-center justify-content-between rounded m-0">
            <div class="col-lg-12 col-md-12 pb-5">
                {{-- <form method="post" action="{{ route('home.createStore') }}" id="regForm" enctype="multipart/form-data"> --}}
                <form method="post" action="" id="regForm" enctype="multipart/form-data">
                    @csrf
                    <h3 id="formHeader">Basic Info</h3>
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="form-group smalls">
                            <label>Store Banner Image (optional store banner image):</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="storebannerimagepath" id="fileupload00" accept="image/png, image/gif, image/jpeg" onchange="onFileUpload0Change()">
                                <label class="custom-file-label" for="fileupload00" id="fileupload00Label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Your First Name</label>
                            <div class="custom-file">
                                <input type="text" class="form-control" name="firstname" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Your Last Name</label>
                            <div class= "custom-file">
                                <input type="text" class="form-control" name="lastname" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Email</label>
                            <div class="custom-file">
                                <input type="email" class="form-control" inputmode="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Phone Number</label>
                            <div class="custom-file">
                                <input type="number" class="form-control" name="phonenumber" required>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="form-group smalls">
                            <label>Verify Your ID (Upload valid id):</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="valididfilepath" id="fileupload01" onchange="onFileUpload1Change()" accept="image/png, image/gif, image/jpeg" required>
                                <label class="custom-file-label" for="fileupload01" id="fileupload01Label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Address (Upload utility bill):</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="utilitybillfilepath" id="fileupload02" accept="image/png, image/gif, image/jpeg" onchange="onFileUpload2Change()" required>
                                <label class="custom-file-label" for="fileupload02" id="fileupload02Label">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="form-group smalls">
                            <label>Restaurant | Business Name</label>
                            <div class="custom-file">
                                <input type="text" name="businessname" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Store Hours</label>
                            <div class="custom-file">
                                <input type="text" class="form-control" name="storehours" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Delivery Fee (₦)</label>
                            <div class="custom-file">
                                <input type="number" step=".01" class="form-control" inputmode="numeric" name="deliveryfee" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Store Address</label>
                            <div class="custom-file">
                                <input type="text" class="form-control" name="storeaddress" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Floor / Suite</label>
                            <div class="custom-file">
                                <input type="text" class="form-control" name="floorsuite" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Number Of Locations</label>
                            <div class="custom-file">
                                <select name="numberoflocations" class="form-control">
                                    <option>1</option>
                                    <option>2-5</option>
                                    <option>6-10</option>
                                    <option>11-25</option>
                                    <option>25+</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="form-group smalls">
                            <label>Store Username</label>
                            <div class="custom-file">
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group smalls">
                            <label>Store Password</label>
                            <div class="custom-file">
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn text-white">Next</button>
                        </div>
                    </div>
                    <!-- Circles which indicate the steps of the form: -->
                    <div style="text-align:center; margin-top: 40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </form>
            </div>
        </div>
        <br />
    </div>
</section>

@push('scripts')
<script>

    function onFileUpload0Change() {
        var fullPath = document.getElementById("fileupload00").value;
        document.getElementById("fileupload00Label").innerHTML = fullPath.replace(/^.*[\\\/]/, '');
    }

    function onFileUpload1Change() {
        var fullPath = document.getElementById("fileupload01").value;
        document.getElementById("fileupload01Label").innerHTML = fullPath.replace(/^.*[\\\/]/, '');
    }

    function onFileUpload2Change() {
        var fullPath = document.getElementById("fileupload02").value;
        document.getElementById("fileupload02Label").innerHTML = fullPath.replace(/^.*[\\\/]/, '');
    }

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {

        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
            document.getElementById("formHeader").innerHTML = "Basic Info";
        }
        else if (n == 1) {
            document.getElementById("formHeader").innerHTML = "Documents";
        }
        else if (n == 2) {
            document.getElementById("formHeader").innerHTML = "About Store";
        }
        else if (n == 3) {
            document.getElementById("formHeader").innerHTML = "Security";
            document.getElementById("prevBtn").style.display = "inline";
        }

        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }

        if (n != 3) {
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }
    }

    function nextPrev(n) {
        if (n != 3) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>
@endpush

@endsection