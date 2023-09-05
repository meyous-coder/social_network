$(document).ready(function () {
    $('[data-confirm]').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        const message = $(this).data('confirm');

        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer !'
        }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire(
                //     'Supprimer !',
                //     'Votre micropost a été supprimé.',
                //     'success'
                // ),
                    window.location.href = href;
            }
        })
    });
});