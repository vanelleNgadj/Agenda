<?php if(count($errors) > 0): ?>
    <!-- recencer tous les erreurs dans chaque formulaire -->
    <div class="msg error">
    <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?>