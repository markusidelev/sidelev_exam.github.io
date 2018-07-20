<div id='page' style="display: inline-block; padding: 20px" class="pagenation">
  


    <script id="page-template" type="text/template">
        
        <button id="pageBtn" type="button" data-page="1" class="pageBtn">
            <i class="fas fa-angle-double-left"></i>
        </button>
 
        <% 
        var prev = (page - 1);
        if (prev < 1) { %>            
            <button id="pageBtn" type="button" data-page=<%= prev + 1 %> class="pageBtn">
                <i class="fas fa-angle-left"></i>
            </button>
        <% 
        } else { %>
            
            <button id="pageBtn" type="button" data-page=<%= prev %> class="pageBtn">
                <i class="fas fa-angle-left"></i>
            </button>
        <%
            };    
        %>

        <%
         var last = Math.floor(count/10)
         for (var i = 1; i <= 7 && i < count/10 ; i++) { %> 

        <button id="pageBtn"  type='button' data-page=<%= i %> class='pageBtn'><%= i %></button>

        <% }; 
            if (page > 7) { %>

            <div class="dots"><i class="fas fa-ellipsis-h"></i></div>

            <button id="pageBtn"  type='button' data-page=<%= page %> class='pageBtn'><%= page %></button>

            

           <% };

        %>
            <% if(last < 1) { %>
                <button id="pageBtn" type="button" data-page="1" class="pageBtn">1</button>


           <% } else { %>

                <div class="dots"><i class="fas fa-ellipsis-h"></i></div>
                <button id="pageBtn" type="button" data-page=<%= last %> class="pageBtn">        
                <%= last %>
                </button>
        <% }; %>
        <% 
        var next = (page + 1);
        if (next > last ) { %>

            
            <button id="pageBtn" type="button" data-page=<%= next - 1 %> class="pageBtn">
                <i class="fas fa-angle-right"></i>
            </button>
            <% 

        } else { %>
            
            <button id="pageBtn" type="button" data-page=<%= next %> class="pageBtn">
                <i class="fas fa-angle-right"></i>
            </button>
            <%
        };
    
        %>

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
    

