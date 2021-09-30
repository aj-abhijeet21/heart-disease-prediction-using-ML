<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
<?php
session_start();
include("connection.php");
$email = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Doctor Search Form a Flat Responsive Widget Template </title>
      <!-- Meta tags -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

      <!-- Meta tags -->
      <!-- Calendar -->
      <link rel="stylesheet" href="css/jquery-ui.css" />
      <!-- //Calendar -->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Cuprum:400,700" rel="stylesheet">
   </head>
   <body style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
      <h1 class="header-w3ls">
         Doctor Search Form
      </h1>
      <div class="doctor-form" style="background: rgba(102,102,102,0.5);">
         <h2 class="doctor-list-w3l" style="font-size:23px;"><center><b>Answer these simple questions to determine the type of heart disease you have</b></center></h2>
         <form action="http://localhost:12345/predicttype" method="post">
            <hr>   
            <div class="input-field" style="display:none;">
                            <input placeholder="Age" id="sessionvar" name="sessionvar" type="text" value=" <?php echo $email;?> ">
                        </div>
            <div class="clear"></div>
            <div class="main">
               <div class="form-left-to-w3l">
                  <div class="grid-outs1">

                        
                        <div class="w3-agile1">
                              <label class="rating">1. Do you have pain in your arms/ shoulders?</label>
                              <ul>
                                 <li>
                                    <input type="radio" value="1" id="a-option" name="q1" required>
                                    <label for="a-option">Yes</label>
                                    <div class="check"></div>
                                 </li>
                                 <li>
                                    <input type="radio" value="0" id="b-option" name="q1" required>
                                    <label for="b-option">No</label>
                                    <div class="check">
                                       <div class="inside"></div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
<br>

<div class="w3-agile1">
      <label class="rating">2. Do you sweat often?</label>
      <ul>
         <li>
            <input type="radio" value="1" id="c-option" name="q2" required>
            <label for="c-option">Yes</label>
            <div class="check"></div>
         </li>
         <li>
            <input type="radio"  value="0"id="d-option"  name="q2"required>
            <label for="d-option">No</label>
            <div class="check">
               <div class="inside"></div>
            </div>
         </li>
      </ul>
   </div><br>
          <div class="w3-agile1">
            <label class="rating">3. Do you vomitt often?</label>
            <ul>
               <li>
                  <input type="radio"value="1" id="e-option" name="q3" required>
                  <label for="e-option">Yes</label>
                  <div class="check"></div>
               </li>
               <li>
                  <input type="radio" value="0" id="f-option" name="q3"required>
                  <label for="f-option">No</label>
                  <div class="check">
                     <div class="inside"></div>
                  </div>
               </li>
            </ul>
         </div><br>
         <div class="w3-agile1">
               <label class="rating">4. Do you have any back pain?</label>
               <ul>
                  <li>
                     <input type="radio"value="1" id="g-option" name="q4" required>
                     <label for="g-option">Yes</label>
                     <div class="check"></div>
                  </li>
                  <li>
                     <input type="radio" value="0" id="h-option" name="q4"required>
                     <label for="h-option">No</label>
                     <div class="check">
                        <div class="inside"></div>
                     </div>
                  </li>
               </ul>
            </div><br>
            <div class="w3-agile1">
                  <label class="rating">5. Excessive alcohol consumption?</label>
                  <ul>
                     <li>
                        <input type="radio"value="1" id="i-option" name="q5" required>
                        <label for="i-option">Yes</label>
                        <div class="check"></div>
                     </li>
                     <li>
                        <input type="radio" value="0" id="j-option" name="q5"required>
                        <label for="j-option">No</label>
                        <div class="check">
                           <div class="inside"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br></div>
                  <div class="clear"></div>
               </div>
               
               <div class="form-right-to-w3l gap-top">
                  <div class="grid-outs1">
                     
                     <div class="w3-agile1">
                           <label class="rating">6. Does anyone in your family has a heart disease?</label>
                           <ul>
                              <li>
                                 <input type="radio"value="1" id="k-option" name="q6" required>
                                 <label for="k-option">Yes</label>
                                 <div class="check"></div>
                              </li>
                              <li>
                                 <input type="radio" value="0" id="l-option" name="q6"required>
                                 <label for="l-option">No</label>
                                 <div class="check">
                                    <div class="inside"></div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <br>
                        <div class="w3-agile1">
                              <label class="rating">7. Is your heart beat pattern irregular?</label>
                              <ul>
                                 <li>
                                    <input type="radio"value="1" id="m-option" name="q7" required>
                                    <label for="m-option">Yes</label>
                                    <div class="check"></div>
                                 </li>
                                 <li>
                                    <input type="radio" value="0" id="n-option" name="q7"required>
                                    <label for="n-option">No</label>
                                    <div class="check">
                                       <div class="inside"></div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                           <br>
                     <div class="w3-agile1">
                           <label class="rating">8. Do you faint often?</label>
                           <ul>
                              <li>
                                 <input type="radio"value="1" id="o-option" name="q8" required>
                                 <label for="o-option">Yes</label>
                                 <div class="check"></div>
                              </li>
                              <li>
                                 <input type="radio" value="0" id="p-option" name="q8"required>
                                 <label for="p-option">No</label>
                                 <div class="check">
                                    <div class="inside"></div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <br>
                     <div class="w3-agile1">
                           <label class="rating">9. Did your legs swell often?</label>
                           <ul>
                              <li>
                                 <input type="radio" value="1"id="q-option" name="q9" required>
                                 <label for="q-option">Yes</label>
                                 <div class="check"></div>
                              </li>
                              <li>
                                 <input type="radio" value="0" id="r-option" name="q9"required>
                                 <label for="r-option">No</label>
                                 <div class="check">
                                    <div class="inside"></div>
                                 </div>
                              </li>
                           </ul>
                        </div><br>
                        <div class="w3-agile1">
                              <label class="rating">10. Do you have any congenital disease?</label>
                              <ul>
                                 <li>
                                    <input type="radio" value="1" id="z-option" name="q10" required>
                                    <label for="z-option">Yes </label>
                                    <div class="check"></div>
                                 </li>
                                 <li>
                                    <input type="radio" value="0" id="y-option" name="q10"required>
                                    <label for="y-option">No</label>
                                    <div class="check">
                                       <div class="inside"></div>
                                    </div>
                                 </li>
                       
                              </ul>
                              </div>
                        
                        
                        <br> 
                     <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
               </div>

               
            </div>
            <div class="btnn">
               <button type="submit" name="submit" value="submit">Submit</button><br>
            </div>
         </form>
      </div>
      
      <!--scripts-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//scripts-->
      <!-- //js -->
      <!-- Calendar -->
      <script src="js/jquery-ui.js"></script>
            <!-- //Calendar -->
   </body>
</html>