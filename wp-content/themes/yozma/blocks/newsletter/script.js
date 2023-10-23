(function( $ ) {
    $(document).on('submit', '.newsletter form', function (e){
        e.preventDefault()

        let form = $(this),
            block = form.parents( '.newsletter' )

        if( newsletterFormValidation(form) ){
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                data: form.serializeArray(),
                success: function (response) {
                    if (response.success === true) {
                        block.addClass( 'subscribed' )
                    } else {
                        console.log('Error')
                    }
                },
                error: function () {
                    console.log('Error')
                }
            })
        }
    } )
})(jQuery);

function newsletterFormValidation(form){
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
    let email = form.find( '[name=email]' ),
        agree = form.find( '[name=agree]' ),
        validation = true

    if ( !emailPattern.test( email.val() ) ){
        validation = false
        email.parents('.form__element').addClass('error')
    }else{
        email.parents('.form__element').removeClass('error')
    }

    if ( !agree.prop('checked') ){
        validation = false
        agree.parents('.form__element').addClass('error')
    }else{
        agree.parents('.form__element').removeClass('error')
    }

    return validation
}