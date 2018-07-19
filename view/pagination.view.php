<div id='page' style="display: inline-block; padding: 20px" class="pagenation">
    <button style='margin:5px; background-color:#262626; color: white; font-family: \"Roboto\", sans-serif; font-size:16px; height: 30px; width: 30px; ' type="button" data-page="1" class="pageBtn"><i class="fas fa-angle-double-left"></i></button>
    <button style='margin:5px; background-color:#262626; color: white; font-family: \"Roboto\", sans-serif; font-size:16px; height: 30px; width: 30px; ' type="button" data-page="1" class="pageBtn active">1</button>

    <?php 
    //принимает значение страниц
    $pages = 10;

    for ($i = 2; $i <= $pages; $i++)
        echo "<button style='margin:5px; background-color:#262626; color: white; font-family: \"Roboto\", sans-serif; font-size:16px; height: 30px; width: 30px; ' type='button' data-page='".$i."' class='pageBtn'>".$i."</button>";
        
    ?>
    
<!-- <button type="button" data-page="#" class="pageBtn">last</button> -->
    
</div>

