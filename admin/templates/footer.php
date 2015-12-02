
<!-- jQuery -->
<script src="<?=$admin_url?>js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=$admin_url?>js/bootstrap.min.js"></script>

<?php if(strpos($_SERVER['REQUEST_URI'],'categorias') ): ?>
    <script>
        $(document).ready(function() {
        <?php foreach($categorias as $categoria): ?>
        $('#updatebutton-<?=$categoria['id']?>').click(function () {
            $('#updateok-<?=$categoria['id']?>').removeClass('hidden');
            $('#updatenook-<?=$categoria['id']?>').removeClass('hidden');
            $('#deletebutton-<?=$categoria['id']?>').addClass('hidden');
            $('#categoria-<?=$categoria['id']?>').removeAttr('disabled');
            $(this).addClass('hidden');
        });

        $('#updateok-<?=$categoria['id']?>').click(function () {
            $(this).addClass('hidden');
        });

        $('#updatenook-<?=$categoria['id']?>').click(function() {
            $('#categoria-<?=$categoria['id']?>').attr('disabled');
            $('#updateok-<?=$categoria['id']?>').addClass('hidden');
            $('#updatebutton-<?=$categoria['id']?>').removeClass('hidden');
            $('#deletebutton-<?=$categoria['id']?>').removeClass('hidden');
            $(this).addClass('hidden');
        });
        <?php endforeach; ?>
        });
    </script>
<?php endif; ?>

</body>

</html>
