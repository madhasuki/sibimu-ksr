<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#tambahPrestasi").click(function() {
            $("#prestasiField").append($("#templatePrestasi").html());
        });

        $("#formEdit").on("click", ".remove", function() {
            $(this).parent().remove();
        });
    });
    
    $(document).ready(function() {
        $("#tambahPengurus").click(function() {
            $("#pengurusField").append($("#templatePengurus").html());
        });

        $("#formEdit").on("click", ".remove", function() {
            $(this).parent().remove();
        });
    });

    const prestasi = document.getElementsByClassName("addPrestasi")
    for (let index = 0; index < prestasi.length; index++) {
        const pres = prestasi[index]
        if (index!=0) {
            pres.className = "remove btn btn-danger btn-sm btn-icon-split addPrestasi"
            pres.children[0].children[0].className = "fas fa-trash"
            pres.children[1].innerHTML = "Hapus"
            pres.removeAttribute('id')
        }
    }
    

    const status_pengurus = document.getElementsByClassName("addPengurus")
    for (let index = 0; index < status_pengurus.length; index++) {
        const pengurus = status_pengurus[index]
        if (index!=0) {
            pengurus.className = "remove btn btn-danger btn-sm btn-icon-split addPrestasi"
            pengurus.children[0].children[0].className = "fas fa-trash"
            pengurus.children[1].innerHTML = "Hapus"
            pengurus.removeAttribute('id')
        }
    }
</script>
