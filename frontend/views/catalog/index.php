<div>
    <form action="../catalog/sound">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Search</button>
    </form>
</div>
<br>
<?php
    foreach($sounds as $sound){
?>
    <div>
        <p><b>Name sound:</b> <?= $sound["name"] ?></p>
    </div>
    <hr>
<?php
    }
?>