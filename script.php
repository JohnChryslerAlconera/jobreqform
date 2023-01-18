<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php 
    if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
        ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']?>",
                button: "Confirm",
            });
        </script>
        <?php
        unset($_SESSION['status']);
    }

?>

<script src="sweetalert.min.js"></script>