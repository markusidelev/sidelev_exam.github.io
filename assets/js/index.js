var blogDB = (function($) {
    
    // Инициализация
    function init() {
        console.log('BlogDB');
        console.info('init blogDB');
        _getData();
        _bindHandlers();
    };
   
    // сокращения
    var ui = {
        $form: $('#author-form'),
        $author: $('#author_select'),
        $year: $('#year'),
        $yearBtn: $('.yearBtn'),
        $month: $('#month'),
        $monthBtn: $('.monthBtn'),
        $list: $('#list'),
        $template: $('#template'),
        $pageTemplate: $("#page-template"),
        $page: $('#page'),
        $pageBtn: $('#pageBtn')
    };

    // по-умолчанию
    var selectedYear = 0,
    selectedMonth = 0,
    selectedPage = 1,
    selectedAutor = 0,
    template = _.template( $("#template").html() ) ;
    pageTemplate = _.template( $("#page-template").html() );


    // события
    function _bindHandlers() {
        ui.$yearBtn.on('click', _changeYear);
        ui.$monthBtn.on('click', _changeMonth);
        ui.$page.on('click', '#pageBtn', _changePage);
        ui.$author.on('change', _changeAuthor);
    } 
    
        // сброс страницы при смене автора
    function _changeAuthor() {
        /// только для лога//////
        selectedAutor = ui.$form.serialize();
        ///////////////
        selectedPage = 1;
        _getData();
    };

        //смена года
    function _changeYear(){

        var $this = $(this);
        // отмена выбранного года при клике на активную кнопку
        if($this.hasClass("active")){
            $("#year .active").removeClass("active");
            selectedYear = 0;
        }
        // выбор года
        else {
            $("#year .active").removeClass("active");
            $this.addClass('active');
            selectedYear = $this.attr('data-year');
            selectedPage = 1;
            
        };
        _getData();
    }
    
    // смена месяца
    function _changeMonth(){
        var $this = $(this);
        // отмена выбранного месяца при клике на активную кнопку
       if($this.hasClass("active")){
           $("#month .active").removeClass("active");
            selectedMonth = 0;   
        }
        // выбор месяца
        else {
            $("#month .active").removeClass("active");
            $this.addClass('active');
            selectedMonth = $this.attr('data-month');
        }
        selectedPage = 1;
        _getData();
    };
        // var $this = $(this);
        // if ($this.hasClass( "active" )){
        //     $("#month .active").removeClass("active")
        //     selectedMonth = 0;
        //     return selectedMonth;
        // }
        // else{            
        //     $("#month .active").removeClass("active")
        //     // }
        //     $this.addClass('active');
        //     selectedMonth = $this.attr('data-month');
        //     return selectedMonth;
        // }
        // _getData();
    

        //смена страницы
    function _changePage(){
        var $this = $(this);
            // $("#page .active").removeAttr("style");
            
            // $("#page .active").removeClass("active");
            
            selectedPage = $this.attr('data-page');
            _getData();
    };

     //получение данных
    function _getData() {
        var allData = 'year=' + selectedYear + '&' + 'month=' + selectedMonth + '&' + ui.$form.serialize() + '&' + 'page=' + selectedPage;
        $.ajax({
            url: 'core/DB.php',
            data: allData,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: _dataError,
            success: function(responce) {
                if (responce.code === 'success') {
                    _dataSuccess(responce);
                } else {
                    _dataError(responce);
                }
            }
        });
    };
    
    // ошибка получения данных
    function _dataError(responce) {
        console.error('responce', responce);
        
    };

    //логи
    function logs () {
        console.log("------------");
        console.log("количество страниц со статьями (с или без выбранных фильтров)", $pageCount);
        console.log("выбранная страница", (selectedPage));
        console.log("выбранный автор", selectedAutor);
        console.log("выбранный год", selectedYear);
        console.log("выбранный месяц", selectedMonth);
        
    };
    
    // Успешное получение данных
    function _dataSuccess(responce) {
                
        //создание блока с кнопками страниц по темплейту
        $pageCount = responce.count[0].count;
        $pageActive = responce.page;
        ui.$page.html(pageTemplate({count: $pageCount, page: $pageActive}));
        // создание блока со статьями по темплейту
        ui.$list.html(template({data: responce.data}));
        
        // смена стилей активной кнопки страницы
        
        $('button[data-page="' + $pageActive +'"]').addClass('active');

        // вывод логов 
        logs();

        
    }

    return {
        init: init
    }
     
})(jQuery);

jQuery(document).ready(blogDB.init());
