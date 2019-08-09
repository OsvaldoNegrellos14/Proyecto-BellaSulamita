<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/css_1.css" />
        <link rel="stylesheet" href="style/font-awesome.min.css">
    </head>
    <body>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.2/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.2/dist/sweetalert2.css">
<!--        <script>
Swal.fire({
  title: '¿Estás seguro?',
  text: "¡No podrás revertir esto!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí, bórralo!',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.value) {
        Swal.fire({
      title: 'Eliminado',
      text: "Su archivo ha sido eliminado!",
      type: 'success',
    })
  }
});
        </script>-->
<!--        <script>
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: '¿Estás seguro?',
  text: "¡No podrás revertir esto!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Sí, bórralo!',
  cancelButtonText: 'Cancelar',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    swalWithBootstrapButtons.fire({
      title: 'Eliminado',
      text: "Su archivo ha sido eliminado!",
      type: 'success',
  })
  } else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire({
      title: 'Cancelado',
      text: "Su archivo esta seguro!",
      type: 'error',
  })
  }
});
        </script>-->
        
        
        <script>
            Swal.fire({
  title: 'Custom width, padding, background.',
  width: 600,
  padding: '3em',
  background: '#fff url(/images/trees.png)',
  backdrop: `
    rgba(0,0,123,0.4)
    url("https://66.media.tumblr.com/0ded4a330f6a340fbfc79911c1eb8e48/tumblr_oypcrqNNIg1u4h4xjo1_400.gif")
    center left
    no-repeat
  `
})
        </script>
        
    </body>
</html>