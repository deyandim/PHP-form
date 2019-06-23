



<table border="2">
    <tr>
        <th>Name</th>
        <th>Question Count</th>

    </tr>

    <?php foreach ($categories as $category): ?>
    <tr>
        <td>
            <a href="<?= url("category.php?id={$category['id']}");?>"><?= $category['name'] ?></a>
        </td>
        <td>
            <?= $category['question_count'] ?>
        </td>
    </tr>
    <?php endforeach ;?>
</table>
