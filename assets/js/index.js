var a = 2;
console.log("abaslkf");


var blogDB = (function($) {
 
    // Инициализация модуля
    function init() {
        console.log('BlogDB');
        console.info('init blogDB');

        _bindHandlers();
    };
 
    
    var ui = {
        $form: $('#author-form'),
        $author: $('#author_select'),
        $year: $('#year'),
        $yearBtn: $('.yearBtn'),
        $month: $('#month'),
        $monthBtn: $('.monthBtn')
    };

    var selectedYear = 0;
    var selectedMonth = 0;

    
    function _bindHandlers() {
        ui.$yearBtn.on('click', _changeYear);
        ui.$monthBtn.on('click', _changeMonth);
        // ui.$author.on('change', getAuthor);
        ui.$author.on('change', _getData);
    } 
    
    function _changeYear(){
        var $this = $(this);
        // if ($("#year .yearBtn").is(".active")){
            $("#year .active").removeClass("active")
        // }
        $this.addClass('active');
        selectedYear = $this.attr('data-year');
        _getData();
    }
    
    function _changeMonth(){
        var $this = $(this);
        // if ($("#month .monthBtn").is(".active")){
            $("#month .active").removeClass("active")
        // }
        $this.addClass('active');
        selectedMonth = $this.attr('data-month');
        _getData();
    }

    function _getData() {
        var allData = 'year=' + selectedYear + '&' + 'month=' + selectedMonth + '&' + ui.$form.serialize();
        $.ajax({
            url: 'core/DB.php',
            data: allData,
            type: 'GET',
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
    }

    return {
        init: init
    }
     
})(jQuery);

jQuery(document).ready(blogDB.init());