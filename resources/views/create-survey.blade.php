@extends('layout.layout')

@section('css')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
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
            background-color: #04AA6D;
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
            background-color: #04AA6D;
        }
    </style>
    <style>
        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 25px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="row">

        <div class="col-xl-12 col-lg-11">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Survey</h6>
                </div>
                <div class="card-body">
                    <form id="regForm" action="{{ route('store') }}" method="POST">
                      @csrf
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <p><h1>Question 1 ?</h1>
                            <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_1" min="1" max="5" required>
                        </p><p><h1>Question 2 ?</h1>
                            <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_2" min="1" max="5" required>
                        </p><p><h1>Question 3 ?</h1>
                            <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_3" min="1" max="5" required>
                            <h1>Question 4 ?</h1>
                        </p><p><input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_4" min="1" max="5" required>
                            <h1>Question 5 ?</h1>
                        </p><p> <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_5" min="1" max="5" required>
                        </p>
                        </div>
                        <div class="tab">
                            <p><h1>Question 6 ?</h1>
                            <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_6" min="1" max="5" required>
                            </p><p><h1>Question 7 ?</h1>
                            <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_7" min="1" max="5" required>
                        </p><p><h1>Question 8 ?</h1>
                            <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_8" min="1" max="5" required>
                        </p><p><h1>Question 9 ?</h1>
                            <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_9" min="1" max="5" required>
                        </p><p><h1>Question 10 ?</h1>
                            <input type="number" id="quantity" placeholder="Input between 1 to 5. where 5 is the highest Value"  oninput="this.className = ''" name="q_10" min="1" max="5" required>
                        </p>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>

                        </div>
                    </form>

                </div>
            </div>

            <!-- Bar Chart -->


        </div>


    </div>
@endsection
@section('js')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
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
                if (y[i].value > 5) {
                    // add an "invalid" class to the field:
                    alert("Input between 1 to 5. where 5 is the highest Value");
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
                if (y[i].value < 1) {
                    // add an "invalid" class to the field:
                    alert("Input between 1 to 5. where 5 is the highest Value");
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

        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
@endsection
