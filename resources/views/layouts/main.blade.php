<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/select2/dist/css/select2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- Navbar Include --}}
            <div class="navbar-bg"></div>
            @include('partials.navbar')

            {{-- Sidebar Include --}}
            @include('partials.sidebar')

            {{-- Main Content --}}
            <div class="main-content">
                @yield('container')
            </div>

            {{-- Footer --}}
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/modules/jquery.min.js"></script>
    <script src="/assets/modules/popper.js"></script>
    <script src="/assets/modules/tooltip.js"></script>
    <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/modules/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraries -->
    <script src="/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="/assets/modules/datatables/datatables.min.js"></script>
    <script src="/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="/assets/modules/sweetalert/sweetalert.min.js"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>


    <!-- Page Specific JS File -->
    <script src="/assets/js/page/modules-datatables.js"></script>
    <script src="/assets/js/page/modules-sweetalert.js"></script>
    <script src="/assets/js/page/forms-advanced-forms.js"></script>
    <script src="/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/js/page/forms-advanced-forms.js"></script>

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>

    <script>

        //Delete button 
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let loop = $(this).data('loop');
            let name = $(this).data('name');
            swal({
                    title: 'Hapus ' + name + '?',
                    text: 'Sekali dihapus, kamu tidak akan bisa mengembalikan data ini kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Berhasil menghapus Data', {
                            icon: 'success',
                        }).then((showNotif) => {
                            $(`#deleteForm_${loop}`).submit();
                        });
                    } else {
                        swal('Data tidak jadi dihapus!');
                    }
                });
        });

        //Delete button Arsip
        $(document).on('click', '.btn-arsip', function(e) {
            e.preventDefault();
            let loop = $(this).data('loop');
            let nama_file = $(this).data('nama_file');
            swal({
                    title: 'Hapus ' + nama_file + '?',
                    text: 'Sekali dihapus, kamu tidak akan bisa mengembalikan file ini kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Berhasil menghapus file', {
                            icon: 'success',
                        }).then((showNotif) => {
                            $(`#deleteForm_${loop}`).submit();
                        });
                    } else {
                        swal('File tidak jadi dihapus!');
                    }
                    
                });
        });

        //Delete button Ruangan
        $(document).on('click', '.btn-ruangan', function(e) {
            e.preventDefault();
            let loop = $(this).data('loop');
            let nama_ruangan = $(this).data('nama_ruangan');
            swal({
                    title: 'Hapus ' + nama_ruangan + '?',
                    text: 'Sekali dihapus, kamu tidak akan bisa mengembalikan Ruangan ini kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Berhasil menghapus Ruangan', {
                            icon: 'success',
                        }).then((showNotif) => {
                            $(`#deleteForm_${loop}`).submit();
                        });
                    } else {
                        swal('Ruangan tidak jadi dihapus!');
                    }
                });
        });

        //Delete button Rak
        $(document).on('click', '.btn-rak', function(e) {
            e.preventDefault();
            let loop = $(this).data('loop');
            let nama_rak = $(this).data('nama_rak');
            swal({
                    title: 'Hapus ' + nama_rak + '?',
                    text: 'Sekali dihapus, kamu tidak akan bisa mengembalikan Rak ini kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Berhasil menghapus Rak', {
                            icon: 'success',
                        }).then((showNotif) => {
                            $(`#deleteForm_${loop}`).submit();
                        });
                    } else {
                        swal('Rak tidak jadi dihapus!');
                    }
                });
        });

        //Delete button User
        $(document).on('click', '.btn-user', function(e) {
            e.preventDefault();
            let loop = $(this).data('loop');
            let nama = $(this).data('nama');
            swal({
                    title: 'Hapus ' + nama + '?',
                    text: 'Sekali dihapus, kamu tidak akan bisa mengembalikan User ini kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Berhasil menghapus User', {
                            icon: 'success',
                        }).then((showNotif) => {
                            $(`#deleteForm_${loop}`).submit();
                        });
                    } else {
                        swal('User tidak jadi dihapus!');
                    }
                });
        });

        // Ruangan Change
        $('#select_ruangan').change(function() {
            var id = $(this).val();

            // Hapus dropdown rak
            $('#select_rak').find('option').not(':first').remove();

            //AJAX
            $.ajax({
                url: '/getRak/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        // Read data and create <option >
                        for (var i = 0; i < len; i++) {

                            var id = response['data'][i].id;
                            var name = response['data'][i].name;

                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#select_rak").append(option);
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
