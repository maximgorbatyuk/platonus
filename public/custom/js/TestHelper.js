

function TestHelper(config) {
    this._correctAnswer = config.correctAnswer;
    this._variantClassName = config.variantClassName;

    this._submitBtnId = config.submitBtnId;
    this._confirmStartId = config.confirmStartId;
    this._displayCorrectBtnId = config.displayCorrectBtnId;

    this._formId = config.formId;
    this._earlyFinInputId = config.earlyFinInputId;

    this._correctBgClass = "bg-success-answer";
    this._incorrectBgClass = "bg-danger-answer";
}

TestHelper.prototype.DisplayCorrectAnswer = function(){

    var variants = $('.'+this._variantClassName);
    for(var i = 0; i <  variants.length; i++ ) {
        var variant = variants[i];
        var input = $(variant).find('input:radio')[0];

        $(variant)
            .removeClass(this._correctBgClass)
            .removeClass(this._incorrectBgClass);

        if (input.checked)
        {
            if (input.value == this._correctAnswer) {
                $(variant)
                    .addClass(this._correctBgClass)
                    .removeClass(this._incorrectBgClass);
            } else {
                $(variant)
                    .addClass(this._incorrectBgClass)
                    .removeClass(this._correctBgClass);
            }
        }
        else
        {
            if (input.value == this._correctAnswer) {
                $(variant)
                    .addClass(this._correctBgClass)
                    .removeClass(this._incorrectBgClass);
            }
        }
    }
    //this.SubmitForm();
};

TestHelper.prototype.EarlyFinish = function(){

    var input = $('#'+this._earlyFinInputId);
    input.val(true);
    this.SubmitForm(true);
};

TestHelper.prototype.SubmitForm = function(withoutDelay) {

    var interval = 1500;
    if (withoutDelay) {
        interval = 50;
    }

    $('#' + this._submitBtnId).attr('disabled', true);
    $('#' + this._confirmStartId).attr('disabled', true);
    $('#' + this._displayCorrectBtnId).attr('disabled', true);

    var self = this;
    var callBack = function() {
        var form = $('#'+self._formId);
        form.submit();
    };
    setTimeout(callBack, interval);

};

