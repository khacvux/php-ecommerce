$('#button1').click(function () {
  $(".js-file1").trigger('click');
})

$(".js-file1").change(function () {
  $('#val1').text(this.value.replace(/C:\\fakepath\\/i, ''))
})


$('#button2').click(function () {
  $(".js-file2").trigger('click');
})

$(".js-file2").change(function () {
  $('#val2').text(this.value.replace(/C:\\fakepath\\/i, ''))
})