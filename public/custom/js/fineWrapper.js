/**
 * Класс-обертка для Файн-аплодера
 * @constructor
 */
function FineWrapper() {
    this.templateId = "qq-template";
    this.fineUploaderDivId = "fine-uploader";
    this.serverHandlerUrl = "/file-uploads";
    this.allowExtensionArray = ['doc', 'docx', 'txt'];
    this.uploadLimit = 1;

    this.fineUploader = this._initFineUploader();
}

FineWrapper.prototype._onCompleteHandler = function (id, fileName, responseJSON) {
    var uuid            = responseJSON["uuid"];
    var uuidInput       = $("#uuidInputId");
    uuidInput.val(uuid);
};

FineWrapper.prototype._onDeleteCompleteHandler = function (id, xhr, isError) {
    console.log(id);
    var filenameInput   = $('#filenameInputId');
    var uuidInput       = $("#uuidInputId");
    var storedInput     = $("#storedInputId");
    var fileIdInput     = $("#fileIdInputId");

    filenameInput.val("");
    uuidInput.val("");
    storedInput.val("");
    fileIdInput.val("");

};

FineWrapper.prototype._initFineUploader = function () {
    // Настройки файн-аплодера
    var options = {
        template: this.templateId,
        //debug: true,
        element: document.getElementById(this.fineUploaderDivId),
        /*thumbnails: {
         placeholders: {
         waitingPath: "{{ asset('thirdparty/fineuploader/placeholders/waiting-generic.png') }}",
         notAvailablePath: "{{ asset('thirdparty/fineuploader/placeholders/not_available-generic.png') }}"
         }
         },*/
        request: {
            endpoint: this.serverHandlerUrl
        },
        deleteFile: {
            enabled: true,
            endpoint: this.serverHandlerUrl
        },
        retry: {
            enableAuto: false
        },
        validation: {
            itemLimit: this.uploadLimit,
            allowedExtensions: this.allowExtensionArray
        },
        callbacks: {
            onComplete: this._onCompleteHandler,
            onDeleteComplete : this._onDeleteCompleteHandler
        },
        messages: {
            typeError: "Файл {file} имеет недопустимое расширение. Валидные расширения: {extensions}.",
            sizeError: "Файл {file} имеет слишком большой размер, сервер принимает максимум {sizeLimit}.",
            minSizeError: "Файл {file} слишком маленький, сервер принимает минимум {minSizeLimit}.",
            emptyError: "{file} пуст, удалите его, пожалуйста",
            noFilesError: "Нет файлов для загрузки",
            tooManyItemsError: "Слишком много файлов ({netItems}) для загрузки. Установлен лимит в {itemLimit}.",
            unsupportedBrowserIos8Safari: "Вот это да! Ваш браузер не поддерживает загрузку файлов или другие операции, связанные с загрузкой.  ПОжалуйста, используйте браузер Chrome"
        }
    };
    return new qq.FineUploader(options);
};



