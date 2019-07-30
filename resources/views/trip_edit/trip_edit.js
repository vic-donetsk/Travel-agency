// убирает плейсхолдер с незаполненных полей типа select
$(".dataBlock_item-select").click( function(e) {
	$(this).children('.psevdoPH').attr('hidden', true);
});

// выбор изображений тура пользователя
$('.inputImage').change(function () {

  let preview = $(this).next().children('.img'); //document.getElementById('mainImg');
  let file    = this.files[0];
  let reader  = new FileReader();

  reader.onloadend = function () {
    preview.attr('src', reader.result);
  }

  if (file) {
    preview.attr('src', reader.readAsDataURL(file));
  } else {
    preview.attr('src', "/img/user.png");
  }
});

