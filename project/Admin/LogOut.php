<script>
            let userResponse = confirm("Do you want to Log Out?");
            if (userResponse) {
              window.location='../Logout.php';
            } else {
                window.location='../Admin/Homepage.php';
            }
</script>