<html>
  <head>
    <title>Ajax Notes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/assets/notes.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script>

      //*** Method 1 ***//

        // $(document).on('submit', '.deleteForm, .updateForm', function(){
        //   $.post($(this).attr('action'), $(this).serialize(), function(res){
        //     $('#notes').html(res);
        //   })
        //   return false;
        // })

        // $(document).ready(function(){
        //   $('form').on('submit',function(e){
        //     $.post($(this).attr('action'), $(this).serialize(), function(res){
        //       $('#notes').html(res);
        //     })
        //     return false;
        //   });

        //   $('form.updateForm *').on('change', function(){
        //     $(this).parent().submit();
        //   })
        // })


      //*** Method 2 ***//
        function addListeners(){
          $('.deleteForm, .updateForm').submit(function(){
            $.post($(this).attr('action'), $(this).serialize(), function(res){
              $('#notes').html(res);
              addListeners();
            })
            return false;
          });
        }

        $(document).ready(function(){
          $('form').on('submit',function(e){
            $.post($(this).attr('action'), $(this).serialize(), function(res){
              $('#notes').html(res);
              addListeners();
            })
            return false;
          });

          $('form.updateForm *').on('change', function(){
            $(this).parent().submit();
          })
        })
    </script>
    <style>
      h4 {
        display: inline-block;
      }

      h3 {
        display: block;
        border-bottom: 1px solid silver;
      }

      .note {
        border-bottom: 1px solid silver;
        margin-bottom: 5px;
        width: 300px;
      }

      form {
        display: inline-block;
        vertical-align: top;
      }

      form input {
        margin-bottom: 8px;
      }

      .deleteForm {
        width: 50px;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>Notes</h>
        </div>
      </div>
      <div class="row">
        <div id='notes' class="col-md-4">
          <? require('partial.php'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <form id='newNoteForm' action="/notes/create" method='post'>
            <input type="text" name='title' placeholder='insert note title here...'>
            <input class='btn btn-primary' type="submit" value='create'>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>