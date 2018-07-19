<div id='page' class="pagenation">
    <button type="button" data-page="1" class="pageBtn">first</button>
    <button type="button" data-page="1" class="pageBtn active">1</button>

    <?php 
    //принимает значение страниц
    $pages = 300;

    for ($i = 2; $i <= $pages; $i++)
        echo "<button type='button' data-page='".$i."' class='pageBtn'>".$i."</button>";
        
    ?>
    


    <!-- <button type="button" data-page="#" class="pageBtn">last</button> -->
    
</div>

