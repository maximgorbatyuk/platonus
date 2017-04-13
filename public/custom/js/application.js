
var application = {
    /**
     * Переход на url
     * @param location
     */
    goTo : function(location) {
        window.location.href = location;
    },

    /**
     * Функция устанавливает хэндлеры нажатия на карточки документов
     */
    initCardClickHandlers : function() {
        var docCards = $('.document-card');
        for (var i = 0; i < docCards.length; i++) {
            var self = this;
            self.card = docCards[i];
            self.id = $(self.card).attr('data-document-id');

            var onClickHandler = function() {
                application.goTo('/documents/' + self.id);
            };
            $(self.card).on('click', onClickHandler);
        }
    },

    initScrollerToTop : function () {

        var btn = $('#back-to-top');
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                btn.fadeIn();
            } else {
                btn.fadeOut();
            }
        });

        //Click event to scroll to top
        btn.click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
    }
};



