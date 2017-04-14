

(function(){

    if (window.application)
    {
        return;
    }
    window.application = {};

}());

application = {
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
            this.card = docCards[i];
            this.id = $(self.card).attr('data-document-id');

            var onClickHandler = function() {
                var id = $(this).attr('data-document-id');
                application.goTo('/documents/' + id);
            };
            $(self.card).on('click', onClickHandler);
        }
    },

    initScrollerToTop : function () {

        var btn = $('#back-to-top');
        $(window).scroll(function(){

            var scrollTop = $(this).scrollTop();

            if(scrollTop > 100 && (scrollTop+ $(window).height() < $(document).height() - 100)) {
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



