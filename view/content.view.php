<div id="list" class="articles-list">
  <!-- <p>
    lorem 2000
  </p> -->
  <script id="template" type="text/template"> 
    <% _.each(data, function(item) { %>
    <div class="article">
      <div class="img">
        <img src="<%= item.photo %>" alt="">
      </div>

      <h2><%= item.title %></h2>

      <p class="info"><%= item.name %> /
        <span> <%= item.date %>
         
        </span>
      </p>

      
      
      <p class="annotation"><%= item.text %></p>
       
      
      
    </div>
      <% }); %>
  </script>
  </div>
<?php include __DIR__ . "/pagination.view.php" ?>