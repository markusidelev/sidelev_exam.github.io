<div id='page' style="display: inline-block; padding: 20px" class="pagenation">
  


    <script id="page-template" type="text/template">
        
        <button id="pageBtn" type="button" data-page="1" class="pageBtn">
            <i class="fas fa-angle-double-left"></i>
        </button>

        
       
        <%
         var last = Math.floor(count/10)
         for (var i = 1; i <= 10 && i < count/10 ; i++) { %> 
            

        <button id="pageBtn"  type='button' data-page=<%= i %> class='pageBtn'><%= i %></button>

        <% }; %>

    <button id="pageBtn" type="button" data-page=<%= last %> class="pageBtn">
                <i class="fas fa-angle-double-right"></i>
    </button>

    </script>

    
</div>


    <!-- // php
    // //принимает значение страниц
    // $pages = 10;

    // for ($i = 2; $i <= $pages; $i++)
    //     echo "<button style='margin:5px; background-color:#262626; color: white; font-family: \"Roboto\", sans-serif; font-size:16px; height: 30px; width: 30px; ' type='button' data-page='".$i."' class='pageBtn'>".$i."</button>";
        
    // -->
    

