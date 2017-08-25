<html>
<head>
    <title>PHP Form Validation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4" style="margin-top:50px;">
            <?php
            require_once ('./form_validation.php');
            $formValidation = new formValidation();
            $formValidation->addRule('name','required|validEmail');
            if($formValidation->isFailed()):
                foreach($formValidation->errors as $errorMsg):
                    echo '<div class="alert alert-danger">'.$errorMsg[0].'</div>';
                endforeach;
            else:
                echo '<div class="alert alert-success">Form submitted Successfully</div>';
            endif;

            ?>
            <h4 class="heading"><strong>Quick </strong> Contact <span></span></h4>
            <div class="form">
                <form action="" method="post" id="contactFrm" name="contactFrm">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Please input your Name" value="" name="name" class="txt">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Please input your mobile No" value="" name="mob" class="txt">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Please input your Email" value="" name="email" class="txt">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Your Message" name="mess" type="text" class="txt_3"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
