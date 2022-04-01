
<?php foreach ($gallery as $item): ?>
    <a rel="gallery" class="photo" href="/image/?id=<?= $item['id'] ?>"><img src="gallery_img/small/<?= $item['filename'] ?>" width="150"/></a>
<?= $item['likes']?>
<? endforeach; ?>
<br>

<form   method="POST" ENCTYPE="multipart/form-data">
    Выберите файл для загрузки:
    <input type="file" name="image">
    <input type="submit"  value="Upload image" name="load">
</form>


<!--<a  class="photo" href="image.php?id=--><?//=$item['id']  ?><!--">-->
<!--    <img src="gallery_img/small/--><?//= $item['filename'] ?><!--" width="150"/></a>-->
<?//= $item['likes']?>