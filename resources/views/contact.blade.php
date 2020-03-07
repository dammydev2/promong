@extends('layouts.front-layout')

@section('content')
<!-- the call to action and all its family -->
<div class="sectiion-before-contact" >
  <div class="sectiion-before-contact-cover" >
   <div class="col-md-12 section-two-contact" >
    <div class="col-sm-12" >
     <div class="col-xs-6 contact-header" >
      <h3>
       Contact Us
     </h3>
   </div>
 </div>
 <div class="container-form">  
  <form id="contact" action="" method="post">
    <h3>Colorlib Contact Form</h3>
    <h4>Contact us for custom quote</h4>
    <fieldset>
      <input placeholder="Contact Person" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <select>
        <option> Select Gender</option>
        <option> Select tour Types</option>
        <option> Select tour Types</option>
        <option> Select tour Types</option>
      </select>
    </fieldset>
    
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number " type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Office Phone Number " type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Company Name" type="url" tabindex="4" required>
    </fieldset> 
    <fieldset>
      <input placeholder="Company Address" type="url" tabindex="4" required>
    </fieldset> 


    <fieldset>
      <input placeholder=" City / County" type="text" tabindex="1" required autofocus>
    </fieldset>
    
    <fieldset>
      <input placeholder=" State" type="text" tabindex="1" required autofocus>
    </fieldset>
    
    <!--<fieldset>-->
      <!--  <select>-->
        <!--      <option> Select Country</option>-->
        <!--      <option> Select tour Types</option>-->
        <!--      <option> Select tour Types</option>-->
        <!--      <option> Select tour Types</option>-->
        <!--  </select>-->
        <!--</fieldset>-->

        <fieldset>
          <select id="types" >
            <option selected disabled> Select Tour Types</option>
            <option> Beach Picnic</option>
            <option> Community Adventure</option>
            <option value="Educational Excursion"> Educational Excursion </option>
            <option value="KidsTour"> KidsTour </option>
            <option value="CelebTour"> CelebTour</option>
            <option value="Creme-de-la-Creme"> Creme-de-la-Creme</option>
            <option value="TheChronicleNG Reality">TheChronicleNG Reality</option>
          </select>
        </fieldset>

        <script>
         var select = document.getElementById("types");
         select.onchange=function(){
          if(select.value=="TheChronicleNG Reality"){
            document.getElementById("other").style.display="none";
          }else{

           document.getElementById("other").style.display="inline";
         }

       }

     </script>

     <fieldset id="other" style="display: none;">
      <select>
        <option> Select Promo Types</option>
        <option> Coded Tour</option>
        <option> TV Game Show</option>
      </select>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
</div>
</div>
</div>
@endsection