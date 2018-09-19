<html>
    <style>
        * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=file]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}


input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
    </style>
   <body>
        @include('flash-message')

        {{-- method="POST" gives session error --}}
        <form action="/certiCreate" enctype="multipart/form-data">
                <div class="container">
                  <h1>E-CERTIFICATE</h1>
                  <p>Please fill in this form to create E-Certificates</p>
                  <hr>
              
                  <label><b>Event Name</b></label>
                  <input type="text" placeholder="Praxis" id="event_name" name="event_name" required>
              
                  {{-- <label ><b>Event Description</b></label>
                  <input type="text" placeholder="Tech Event" id="event_description" name="event_description" required>
                    
                  <label ><b>Created For</b></label>
                  <input type="text" placeholder="VCR or ISTE" id="created_for" name="created_for" required>
                  
                  <label ><b>Created By id</b></label>
                  <input type="text" placeholder="307" id="created_by_id" name="created_by_id" required>

                  <hr>
                  <label ><b>E-CERTIFICATE DETAILS</b></label><br><br><br>

                  <label ><b>Background Image</b></label>
                  <input type="file" accept="image/*" id="background" name="background"/>

                  <label ><b>Winner CSV</b></label>
                  <input type="file" accept=".csv" id="winner" name="winner"/>

                  <label ><b>Committe CSV</b></label>
                  <input type="file" accept=".csv" id="committe" name="committe" required/> --}}

                  <hr>
                  <button type="submit" class="registerbtn">Generate CERTIS</button>
                </div>
              
                
              </form>
   </body>
</html>