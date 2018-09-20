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

.dropdown{
  background-color: #ddd;
  outline: none;
  padding: 5px 10px;
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
.redirectbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
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
        <form action="/createParentEvent" enctype="multipart/form-data" method="POST" >
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="container">
                  <h1>E-CERTIFICATE</h1>
                  <p>Please fill in this form to create Parent Event</p>
                  <hr>
              
                  <label><b>Parent Event Name</b></label>
                  <input type="text" placeholder="Praxis" id="parent_event_name" name="parent_event_name" required>
              
                  <label ><b>Parent Event Description</b></label>
                  <input type="text" placeholder="Tech Event" id="parent_event_description" name="parent_event_description" required>
                    


                  <hr>
                  <label ><b>E-CERTIFICATE DETAILS</b></label><br><br><br>

                  <label ><b>Background Image</b></label>
                  <input type="file" accept="image/*" id="parent_background" name="parent_background"/>

                  <label ><b>LOGO Image</b></label>
                  <input type="file" accept="image/*" id="parent_logo" name="parent_logo"/>

                  <hr>
                  <button type="submit" class="registerbtn">Create New Parent Event</button>
                </div>
              
                
              </form>
   </body>
</html>