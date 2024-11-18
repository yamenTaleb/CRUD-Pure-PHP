<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/navbar.php') ?>
<?php require base_path('views/partials/header.php') ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note): ?>
                <li class="text-blue-500 hover:underline hover:text-blue-600 mb-5 text-lg"><a href="note?id=<?= $note['id'] ?>"><?= $note['body'] ?></a></li>
            <?php endforeach; ?>
        </ul>
        <a href="note/create" class="text-white bg-blue-500 px-2.5 py-2 rounded hover:bg-blue-600">Add Note</a>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
