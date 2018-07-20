var blogDB = (function($) {
    
    // Инициализация модуля
    function init() {
        console.log('BlogDB');
        console.info('init blogDB');
        _getData();
        _bindHandlers();
    };
 
   

    var ui = {
        $form: $('#author-form'),
        $author: $('#author_select'),
        $year: $('#year'),
        $yearBtn: $('.yearBtn'),
        $month: $('#month'),
        $monthBtn: $('.monthBtn'),
        $list: $('#list'),
        $template: $('#template'),
        $page: $('#page'),
        $pageBtn: $('.pageBtn')
    };

    var selectedYear = 0,
    selectedMonth = 0,
    selectedPage = 1,
    template = _.template( $("#template").html() );	


    
    function _bindHandlers() {
        ui.$yearBtn.on('click', _changeYear);
        ui.$monthBtn.on('click', _changeMonth);
        ui.$pageBtn.on('click', _changePage);
        ui.$author.on('change', _getData);
    } 
    
    function _changeYear(){
        var $this = $(this);
        if($this.hasClass("active")){
            $("#year .active").removeClass("active");
            selectedYear = 0;
        }
        else {
            $("#year .active").removeClass("active");
            $this.addClass('active');
            selectedYear = $this.attr('data-year');

        };
        _getData();
    }
    
    function _changeMonth(){
        var $this = $(this);
       if($this.hasClass("active")){
           $("#month .active").removeClass("active");
            selectedMonth = 0;   
        }
        else {
            $("#month .active").removeClass("active");
            $this.addClass('active');
            selectedMonth = $this.attr('data-month');
        }
        
        _getData();

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
    }


    function _changePage(){
        var $this = $(this);
            // $("#page .active").removeAttr("style");
            
            $("#page .active").removeClass("active");
            $this.addClass('active');
            $this.css('background-color', "#8c8d8e" )
            selectedPage = $this.attr('data-page');
            _getData();
    }

     

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
    }

    function _dataError(responce) {
        console.error('responce', responce);
        // Далее обработка ошибки, зависит от фантазии
    }
     
    // Успешное получение данных
    function _dataSuccess(responce) {
        console.log(responce);
        ui.$list.html(template({data: responce.data}));
        
    }

    return {
        init: init
    }
     
})(jQuery);

jQuery(document).ready(blogDB.init());
