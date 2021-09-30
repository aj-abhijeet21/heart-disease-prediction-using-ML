<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application - Input Form by Tooplate</title>
	<!--
    Template 2105 Input
	http://www.tooplate.com/view/2105-input
	-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body style="background-image: url(C:\xampp\htdocs\heart\img\b1.jpg);  background-size: cover;
  background-repeat: no-repeat;
  background-position: center top;">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8  mx-auto">
                <header class="mt-5 mb-5 text-center">
                    <h3>Heart Disease Prediction System</h3>
                    <p class="tm-form-description">Answer these simple questions to know your heart disease type!!!</p>
                </header>
                <form action="http://localhost:12345/predicttype"  method="post" enctype="multipart/form-data" class="tm-form-white tm-font-big">
                    <div class="tm-bg-white tm-form-pad-big">
                        
                        <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                            <label for="q1" class="black-text mb-4 big">1. Do you have pain in your arms/ shoulders?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q1" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q1" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q2" class="black-text mb-4 big">2. Do you sweat often?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q2" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q2" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q3" class="black-text mb-4 big">3. Do you vomitt often?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q3" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q3" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q4" class="black-text mb-4 big">4. Do you have any back pain?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q4" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q4" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q5" class="black-text mb-4 big">5. Excessive alcohol consumption?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q5" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q5" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q6" class="black-text mb-4 big">6. Does anyone in your family has a heart disease?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q6" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q6" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q7" class="black-text mb-4 big">7. Is your heart beat pattern irregular?(From your ecg test)</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q7" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q7" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q8" class="black-text mb-4 big">8. Do you faint often?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q8" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q8" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q9" class="black-text mb-4 big">9. Did your legs swell often?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q9" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q9" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                            <label for="q10" class="black-text mb-4 big">10. Do you have any congenital disease?</label>
                            <div>
                                <label class="mr-4">
                                    <input class="with-gap" name="q10" type="radio" value="1" />
                                    <span>Yes</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="q10" type="radio" value="0" />
                                    <span>No</span>
                                </label><hr>
                            </div>
                        </div>
                        
                        

                        

                        

                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="waves-effect btn-large btn-large-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <footer class="row tm-mt-big mb-3">
            <div class="col-xl-12 text-center font-weight-light">
                <p class="d-inline-block tm-bg-black white-text py-2 tm-px-5">
                    Made with <span style="color: #e25555;">&#9829;</span> at VIT 
                    <!-- Made with <i class="icon ion-heart"></i> at VIT -->
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>