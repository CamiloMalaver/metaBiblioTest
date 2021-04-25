<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       <title>MetaBiblio</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
       
    </head>
    <body>
        <div class="container">
            <main class="form-signin">
                <form method="POST" action="" id="form1">
                @csrf
                
                <h1 class="h3 mb-3 fw-normal">Metabiblioteca</h1>
                
                <div class="form-floating">
                    <input type="number" class="form-control" name="isbn" placeholder="isbn" id="isbn" required>
                    <label for="floatingInput">ISBN</label>
                </div>
                <br>
                    <div class="row">
                        <div class="col"><button class="w-100 btn btn-lg btn-success" type="submit">Crear</button></div>
                        <div class="col"><button class="w-100 btn btn-lg btn-primary" type="button">Listar</button></div>
                    </div>
                </form>
            </main>
            
        </div>
        
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $( document ).ready(function() {
            $('#isbn').keyup(function(){
                $('#form1').attr("action", 'books/create/'+ $(this).val());
            });
        });
    </script>
    </body>
</html>
