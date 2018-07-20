<aside class="sidebar">
  <div class="sidebar-item">
    <div class="sidebar-item__title">
      <div class="title">Автор публикации</div>
      <div class="delimiter"></div>
      <div class="icon">
        <img src="/assets/img/svg/users.svg" alt="">
      </div>
    </div>
    <div id="authors_list" class="sidebar-item__content select">
      <form action="" id="author-form">

        <select id="author_select" name="author_select">
          //2
          <option selected value> -- выберите автора -- </option>
          <?php
          $authors = get_all_authors();
          foreach ($authors as $author):?>

          <option value="<?php echo $author["id"]?>"><?php echo $author["name"] ?></option>
        
          <?php endforeach
          ?>

        </select>
      </form>
    </div>
  </div>
  <div class="sidebar-item">
    <div class="sidebar-item__title">
      <div class="title">Год публикации</div>
      <div class="delimiter"></div>
      <div class="icon">
        <img src="/assets/img/svg/calendar.svg" alt="">
      </div>
    </div>
    <div id="year" class="sidebar-item__content">
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2005</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2006</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2007</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2008</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2009</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2010</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2011</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2012</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2013</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2014</button>
      <button type="button" data-year="2015" class="sidebar-item__label yearBtn">2015</button>
      <button type="button" data-year="2016" class="sidebar-item__label yearBtn">2016</button>
      <button type="button" data-year="2017" class="sidebar-item__label yearBtn">2017</button>
      <button type="button" data-year="2018" class="sidebar-item__label yearBtn">2018</button>
    </div>
  </div>
  <div class="sidebar-item">
    <div class="sidebar-item__title">
      <div class="title">Месяц публикации</div>
      <div class="delimiter"></div>
      <div class="icon">
        <img src="/assets/img/svg/calendar (2).svg" alt="">
      </div>
    </div>
      <div id="month" class="sidebar-item__content">
        <button type="button" data-month="1" class="sidebar-item__label monthBtn">Январь</button>
        <button type="button" data-month="2" class="sidebar-item__label monthBtn">Февраль</button>
        <button type="button" data-month="3" class="sidebar-item__label monthBtn">Март</button>
        <button type="button" data-month="4" class="sidebar-item__label monthBtn">Апрель</button>
        <button type="button" data-month="5" class="sidebar-item__label monthBtn">Май</button>
        <button type="button" data-month="6" class="sidebar-item__label monthBtn">Июнь</button>
        <button type="button" data-month="7" class="sidebar-item__label monthBtn">Июль</button>
        <button type="button" data-month="8" class="sidebar-item__label monthBtn">Август</button>
        <button type="button" data-month="9" class="sidebar-item__label monthBtn">Сентябрь</button>
        <button type="button" data-month="10" class="sidebar-item__label monthBtn">Октябрь</button>
        <button type="button" data-month="11" class="sidebar-item__label monthBtn">Ноябрь</button>
        <button type="button" data-month="12" class="sidebar-item__label monthBtn">Декабрь</button>
      </div>
  </div>
</aside>