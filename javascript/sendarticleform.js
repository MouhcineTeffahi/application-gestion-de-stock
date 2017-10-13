$(document).ready(function() {
    var $form = $('#articleform');
    
    $form.on('submit', function() {

      
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'text',
                success: function(html) {
                    if(html == 'ok') {
                        alert('Tout est bon');
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                }
            });
        
        return false;
    });
});
