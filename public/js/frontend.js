function initImagesPicker(starterImages) {
    let imagesBag = starterImages;
    let currentId = null;
    let loadingNextPack = false;

    const $imageTag = $('#image-picker-image');
    const $acceptBtn = $('#image-picker-accept');
    const $rejectBtn = $('#image-picker-reject');

    const loadNextImagesPack = function () {
        if (loadingNextPack) {
            return;
        }
        loadingNextPack = true;
        $.ajax({
                url: '/api/images',
                dataType: 'json'
            })
            .done(function (json) {
                if (json.images && $.isArray(json.images)) {
                    imagesBag = json.images.concat(imagesBag);
                }
            })
            .always(function () {
                loadingNextPack = false;
            });
    };

    const nextImage = function () {
        if (imagesBag.length > 0) {
            let imageInfo = imagesBag.pop();
            currentId = imageInfo.id;
            $imageTag.attr('src', imageInfo.url);
            disableButtons(false);
            if (imagesBag.length < 4) {
                loadNextImagesPack();
            }
        } else {
            disableButtons(true);
            loadNextImagesPack();
        }
    };

    const disableButtons = function (disabled) {
        $acceptBtn.prop('disabled', disabled);
        $rejectBtn.prop('disabled', disabled);
    };

    const onAccept = function () {
        if (!currentId) {
            return false;
        }
        disableButtons(true);
        $.ajax({
                url: '/api/image/' + currentId + '/accept',
                method: 'POST',
            })
            .always(function () {
                nextImage();
            });
    };

    const onReject = function () {
        if (!currentId) {
            return false;
        }
        disableButtons(true);
        $.ajax({
                url: '/api/image/' + currentId + '/reject',
                method: 'POST',
            })
            .always(function () {
                nextImage();
            });
    };

    $acceptBtn.on('click', function (event) {
        event.stopPropagation();
        onAccept();
    });

    $rejectBtn.on('click', function (event) {
        event.stopPropagation();
        onReject();
    });

    nextImage();
}
