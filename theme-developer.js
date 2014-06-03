(function ( $ ) {
    $( document ).ready( function () {
        $( '[data-template]' ).click( function ( e ) {
            if ( e.shiftKey ) {
                e.preventDefault();
                e.stopPropagation();
                var data = $( this ).data( 'template' );
                var r = new XMLHttpRequest;
                r.open( "get", "http://localhost:8091?message=" + data );
                r.send();
            }
        } );
    } );
})( jQuery );