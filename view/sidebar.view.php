<aside class="sidebar">
  <div class="sidebar-item">
    <div class="sidebar-item__title">
      <div class="title">Автор публикации</div>
      <div class="delimiter"></div>
      <div class="icon">
        <img src="/assets/img/svg/users.svg" alt="">
      </div>
    </div>
    <div id="authors_list" class="sidebar-item__content">
      <select name="author_select" id="">
        <!-- //2 -->
        <?php
          $authors = get_all_authors();
          foreach ($authors as $author):?>
            <option value="<?php echo $author["id"]?>"><?php echo $author["name"] ?></option>

        <?php endforeach
       ?>

      </select>
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
      <a href="#" id="2015" class="sidebar-item__label">2015</a>
      <a href="#" id="2016" class="sidebar-item__label">2016</a>
      <a href="#" id="2017" class="sidebar-item__label">2017</a>
      <a href="#" id="2018" class="sidebar-item__label">2018</a>
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
        <a href="#" id="m1" class="sidebar-item__label">Январь</a>
        <a href="#" id="m2" class="sidebar-item__label">Февраль</a>
        <a href="#" id="m3" class="sidebar-item__label">Март</a>
        <a href="#" id="m4" class="sidebar-item__label">Апрель</a>
        <a href="#" id="m5" class="sidebar-item__label">Май</a>
        <a href="#" id="m6" class="sidebar-item__label">Июнь</a>
        <a href="#" id="m7" class="sidebar-item__label">Июль</a>
        <a href="#" id="m8" class="sidebar-item__label">Август</a>
        <a href="#" id="m9" class="sidebar-item__label">Сентябрь</a>
        <a href="#" id="m10" class="sidebar-item__label">Октябрь</a>
        <a href="#" id="m11" class="sidebar-item__label">Ноябрь</a>
        <a href="#" id="m12" class="sidebar-item__label">Декабрь</a>
      </div>
  </div>
</aside>