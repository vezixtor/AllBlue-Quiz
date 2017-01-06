console.log('Thats Ok');
var resultIndex = 2, questionIndex = 2;
$(document).ready(function(){
  $("#more-result").click(function() {
    var resultClone = $('#element-result-0').clone().attr('id','element-result-'+ resultIndex);

    resultClone.find("input[type=text]").each(function() {
        $(this).attr("name", 'resultado['+ resultIndex +'][title]');
    });
    resultClone.find("textarea").attr("name", 'resultado['+ resultIndex +'][description]');
    resultClone.insertBefore(this);

    var alternativePointsClone = $('.alternativa-points:first').clone();
    alternativePointsClone.appendTo($('.spot-alternative-points'));

    //*'pontuacao['pergunta']['alternativa']['resultado']'
    $('.spot-alternative-points').each(function(index) {
      var nameGroup = $(this).find('select:first').attr("name");
      $(this).find('select:last').attr("name", nameGroup.substring(0, 16) + resultIndex +']');
    });

    resultIndex++;
  });

  $(".more-alternative").click(function() {
    var alternativeClone = $(this).parent().find('.spot-alternative:last').clone();
    //alternativa[question][alternative]
    var textareaName = alternativeClone.find("textarea").attr("name");
    alternativeClone.find("textarea").attr("name", alternativeNewName(textareaName));
    alternativeClone.find('select').each(function(index) {
      var newName = alternativePointsNewName($(this).attr("name"));
      $(this).attr("name", newName);
    });
    alternativeClone.insertBefore(this);
  });

  $("#more-question").click(function() {
    var questionClone = $('#element-question-0').clone(true);
    questionClone.find("textarea").attr("name", 'pergunta['+ questionIndex +']').val('');

    var alternativeClone = questionClone.find('.spot-alternative').eq( 0 );
    var alternativeClone2 =  questionClone.find('.spot-alternative').eq( 1 );
    questionClone.find('.spot-alternative').remove();

    //alternativa[question][alternative]
    var targetSpot = questionClone.find('.more-alternative');
    alternativeClone.find("textarea").attr("name", 'alternativa['+ questionIndex +'][0]').val('');
    alternativeClone.insertBefore(targetSpot);
    alternativeClone2.find("textarea").attr("name", 'alternativa['+ questionIndex +'][1]').val('');
    alternativeClone2.insertBefore(targetSpot);

    questionClone.find('select').each(function(index) {
      var nameGroup = $(this).attr("name");
      $(this).attr("name", nameGroup.substring(0, 10) + questionIndex + nameGroup.substring(11, 18));
    });

    questionClone.insertBefore(this);
    questionIndex++;
  });
});

function alternativePointsNewName(name) {
  return name.substring(0, 13) + (parseInt(name.substring(13, 14)) + 1) + name.substring(14, 18);
}

function alternativeNewName(name) {
  return name.substring(0, 15) + (parseInt(name.substring(15, 16)) + 1) + name.substring(16, 17);
}
