<?php if(isset($_SESSION['toast'])): ?>

    <div class="toast-sucesso" id="toast">
        <i class="fa-solid fa-circle-check"></i>
        <?= $_SESSION['toast']; ?>
    </div>

    <script>

        const toast = document.getElementById('toast');

        setTimeout(() => {

            toast.classList.add('fechando');

        }, 3500);

        setTimeout(() => {

            toast.remove();

        }, 4000);

    </script>

    <?php unset($_SESSION['toast']); ?>

<?php endif; ?>