console.log('Thats Ok');
var resultIndex = 2;
$(document).ready(function(){
  $("#more-result").click(function() {
    var myClone = $('#element-result-0').clone().attr('id','element-result-x');

    myClone.find("input[type=text]").each(function() {
        var myName = $(this).attr("name");
        $(this).attr("name", 'resultado['+ resultIndex +'][title]');
    });
    myClone.find("textarea").attr("name", 'resultado['+ resultIndex +'][description]');

    myClone.insertBefore(this);

    var alternativeClone = $('.alternativa-points').first().clone();

    //'pontuacao['pergunta']['alternativa']['resultado']'
    $('.spot-alternative-points').each(function(index, element) {
      console.log(alternativeClone);
      alternativeClone.attr("name", 'pontuacao['+ 0 +']['+ index +']['+ resultIndex +']');
      //alternativeClone.appendTo(element);
      element.append(alternativeClone);
    });

    resultIndex++;
  });
});
