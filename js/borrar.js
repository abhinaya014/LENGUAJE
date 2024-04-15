$(document).ready(function() {
    $('.delete-button').click(function() {
        var confirmationDialog = $(this).closest('tr').find('.diol');
        confirmationDialog.show();
        if (confirmationDialog) {
            $('.diol').fadeIn();
            var $form = $(this).closest('.delete-form');
            $('.diol button.confirm').click(function() {
                // Enviar el formulario
                $form.submit();
            });
            
            

            $('.diol button.cancel').click(function() {
                $('.diol').fadeOut();

            });

    }
    });
});


$(document).ready(function(){
    $('#buscar-titulo').on('input',function(){
        var searchText = $(this).val().toLowerCase();
        $('#noticias-table tbody tr').each(function(){
            var titleText = $(this).find('td:nth-child(2)').text().toLowerCase();
            if(titleText.includes(searchText)) {
                $(this).show();
            }else {
                $(this).hide();
            }

        });

    });

});
