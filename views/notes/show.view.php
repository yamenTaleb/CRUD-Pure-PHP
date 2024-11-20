<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/navbar.php') ?>
<?php require base_path('views/partials/header.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <button class="mb-7">
            <a href="/notes" class="text-blue-500 hover:text-blue-600 hover:underline text-md">
                go back...
            </a>
        </button>
        <h3 class="text-blue-500 text-lg mb-3">
            <?= $note['body'] ?>
        </h3>

        <div class="flex items-center space-x-2">
            <a href="note/edit?id=<?= $note['id']?>" class="text-white bg-gray-400 px-2.5 py-2 rounded hover:bg-gray-500">Edit</a>

            <form method="post" action="/note">
                <input type="hidden" name="_method" value="DELETE"></input6>
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit" class="text-white bg-red-500 px-2.5 py-2 rounded hover:bg-red-600">Delete</button>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
