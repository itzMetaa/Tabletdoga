(function($){
        // törlés
        $(document).on('click', '.delete', function(){
            var id = $(this).data('id');
            $clicked_btn = $(this);
            $.ajax({
              url: 'server.php',
              type: 'GET',
              data: {
              'delete': 1,
              'id': id,
            },
            success: function(response){
              $clicked_btn.parent().remove();
            }
            });
        });
        // Oprendszer váltás
        $(document).on('click', '.edit', function(){
            edit_id = $(this).data('id');
            $edit_comment = $(this).parent();
            var oprendszer = $('#oprendszer').val();
            if(oprendszer == "Android")
            {
              $('#oprendszer').val('IOS');
            } else{
              $('#oprendszer').val('Android');
            }
            $.ajax({
              url: 'server.php',
              type : 'POST',
              data: {
                'update' : 1,
                'id' : id,
                'oprendszer' : oprendszer,
              },
              success: function(response){
                //nem értem
                //utálom az ajaxot
                //a sima php közelebb áll hozzám
                //nem akarom
                //maradok a c# nál mert azt értem is
                //másfél órát szenvedtem az insertel mire realizáltam,
                //hogy az nem is kell, így elpazaroltam az időmet
                //az utolsó fél órában meg már nem sikerült megoldani
                //a többit
              }
            })
        });

} ) ( jQuery );