<h1>Write your question</h1>

<form method="post">
    Title: <input type="text" name="title"> |

    Category: <select name="category">
        <?php foreach ($categories as $category): ?>

        <option <?= $category['id'] == $category_id ? 'selected' : ''?> value="<?= $category['id'];?>"><?= $category['name'] ?>(<?= $category['question_count']?>)</option>

        <?php endforeach; ;?>
    </select><br><br>

    Description: <br> <textarea name="body" cols="30" rows="10"></textarea>

    <br/><br>
    Tags: <br> <select multiple="multiple" name="existing_tags[]" >
        <?php foreach($tags as $tag): ?>
        <option value="<?= $tag['id'] ?>"><?= $tag['name'] ?>(<?= $tag['question_count']?>)</option>
        <?php endforeach;?>
    </select><br>


    Add tags: <input type="text" name="new_tags" placeholder="Add new tags separated by comma...">
    <br><br>
    <input type="submit" value="Ask">

</form>