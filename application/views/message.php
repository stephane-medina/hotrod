<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href="assets/css/CSS_responsive1.css" rel="stylesheet" type="text/css">
<div class="container">
  <div class="row">
    <?= heading( $title); ?>
  </div>
  <div class="row alert <?= $result_class; ?>" role="alert">
    <?= $result_message; ?>.
  </div>
  <div class="row text-center">
  <?= anchor("", "Fermer", ['class' => "btn bg-dark link"]); ?>
  </div>
</div>

        								  			
        								  			
                									