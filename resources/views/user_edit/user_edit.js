// убирает красную рамку вокруг поля с ошибкой
$('.userEdit_content-inputs input').focus( (e)=>{
	$(e.target).removeClass('is-invalid');
});

// выбор аватарки пользователя
$('#userFace').change(function () {
  let preview = document.getElementById('userFace_img');
  let file    = this.files[0];
  let reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    preview.src = reader.readAsDataURL(file);
  } else {
    preview.src = "user.png";
  }
  debugger;
});
