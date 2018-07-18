/* В этом файле вы пишете js код вашего приложения */

//2

var blogDB = (function($) {
 
    // Инициализация модуля
    function init() {
        console.info('BlogDB');
    }
 
    // Экспортируем наружу
    return {
        init: init
    }

    
     
})(jQuery);