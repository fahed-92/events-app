@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.7/dist/sweetalert2.all.min.js"></script>
<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-start',
  iconColor: 'white',
  customClass: {
    popup: 'colored-toast'
  },
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }

});
</script>
@endpush
@if(session('success'))
@push('scripts')
<script>
    Toast.fire({
    icon: 'success',
    title: '{{session('success')}}'
    });
</script>
@endpush

@elseif(session('error'))

@push('scripts')
<script>
    Toast.fire({
    icon: 'error',
    title: '{{session('error')}}'
    });
</script>
@endpush

@endif
