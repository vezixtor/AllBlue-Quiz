var base_url = 'http://localhost/app/AllBlue-Quiz/';
$(document).ready(function(){
  //indexOfResult é valor de todas as "section" manos a capa e o resultado
  var questionSteps = ($( ".section" ).length) - 2;

  $("#start-quiz").click(function() {
    var button = $(this);
    var currentSection = button.parents(".section");
    var currentSectionIndex = currentSection.index();
    var headerSection = $('.steps li').eq(currentSectionIndex);
    currentSection.removeClass("is-active").next().addClass("is-active");
    headerSection.removeClass("is-active").next().addClass("is-active");
  });

  $(".answer-click").click(function() {
    $(this).parents(".col").find('input[type="radio"]').prop("checked",true);
    var button = $(this);
    var currentSection = button.parents(".section");
    var currentSectionIndex = currentSection.index();
    var headerSection = $('.steps li').eq(currentSectionIndex);
    currentSection.removeClass("is-active").next().addClass("is-active");
    headerSection.removeClass("is-active").next().addClass("is-active");

    if(currentSectionIndex === questionSteps) {
      var quizAnswers = $( "#form-quiz" ).serializeArray();
      resultRequest(quizAnswers);
    }
  });

  $('.back').click(function() {
    var button = $(this);
    var currentSection = button.parents(".section");
    var currentSectionIndex = currentSection.index();
    var headerSection = $('.steps li').eq(currentSectionIndex);
    currentSection.removeClass("is-active").prev().addClass("is-active");
    headerSection.removeClass("is-active").prev().addClass("is-active");
  });
});
function resultRequest(quizAnswers) {
  $.post(base_url + "Quiz/Result", quizAnswers )
    .always(function(data) {
      var objData = JSON.parse(data);
      $('#titulo').text(objData.titulo);
      $('#descricao').text(objData.descricao);
  }).always(function() {
      $('.uil-ring-css').hide();
  });
}
