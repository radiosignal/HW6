<h2>News</h2>


<?php foreach ($news as $item):?>
    <div>
        <b><a href="/onenews/?id=<?=$item['id']?>"><?=$item['title']?></a></b>
    </div>

<?php endforeach;?>
