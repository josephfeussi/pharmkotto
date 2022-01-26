require('./bootstrap');
import 'alpinejs';
import Swal from 'sweetalert2'
import Splide from '@splidejs/splide'


window.Splide = Splide
window.Swal = Swal.mixin({
    confirmButtonColor: "#DB2777",
    //denyButtonColor: "",
    confirmButtonText: "Ok",
    denyButtonText: "Non",
    cancelButtonText: "Annuler"
})
window.Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: true,
    timer: 30000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
