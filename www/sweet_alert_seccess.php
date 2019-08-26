onClick="onDelete(' . '\''. $res['declaration_id'] .'\'' . ')"


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">
        onDelete = (id) => {
            swal({
                    title: "คุณแน่ใจหรือไม่ ?",
                    text: "หากตกลงแล้วจะไม่สามารถกู้คืนกลับมาได้",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "http://localhost/bobo_project/updatestatus.php?status=3&id=" + id
                    }
                });
        }
    </script>     