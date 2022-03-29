


<?php foreach ($files as $file):?>
    <a href="/doc/<?=$file?>"><?=$file?></a><br>
<?php endforeach;?>
<br>

<form   method="POST" ENCTYPE="multipart/form-data">
    Выберите файл для загрузки:
    <input type="file" name="myfile">
    <input type="submit"  value="Upload image" name="loaddoc">
</form>












