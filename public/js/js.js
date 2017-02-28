$(document).ready(function() {
    $("#employer").click(function() {
        $("#for_employer").show();
    });

    $("#applicant").click(function() {
        $("#for_employer").hide();
    });

    $(".add-button").click(function() {
        $("#imgUpload").click();
    });
    
    $('#text').change(function() {
      var str = $('#text').val();
      $('#text_written').text(str);
    }).change;

    $('#email').change(function() {
      var em = $(this).val();
      $('#writte_email').text(em);
    }).change;

    $('#main_name').change(function() {
      var main_name = $(this).val();
      $('#writte_main-name').text(main_name);
    }).change;

    $('#tel').change(function() {
      var tel = $(this).val();
      $('#writte_tel').text(tel);
    }).change;

    $('#pip').change(function() {
      var pip = $(this).val();
      $('#writte_pip').text(pip);
    }).change;

    $('#new_input').click(function() {
      $('#will_click-js').click();
    });

    $('#go_to-letter1').click(function() {
      $('#hide-show-vac').show();
      $('#hide-show-letter').hide();
    });

    $('#go_to-letter5').click(function() {
      $('#hide-show-vac').hide();
      $('#hide-show-letter').show();
    });

    $("#select_region").click(function() {
        $("#wanna_search__in-this-country").toggle();
    });

    $(".toggle-for-text").click(function() {
        $(".toggled_text").toggle(800);
        $(".toggle-for-text").toggleClass("closed");
    });
  });
