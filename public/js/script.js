// アコーディオンメニュー
$('.menu-trigger').click(function () {
  $(this).toggleClass('is-open');
  $(this).siblings('.menu').toggleClass('is-open');
});

// 投稿編集モーダル
$(function () {
  $('.modal_open').on('click', function () {
    $('.modal_main').fadeIn();
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');

    $('.modal_text').text(post);
    $('.modal_id').val(post_id);
    return false;
  });

  $('.modal_main').on('click', function () {
    $('.modal_main').fadeOut();
    return false;
  });

  $('.modal_inner').on('click', function (e) {
    e.stopPropagation();
  })
});

// 画像切り替え
$(function () {
  $('.btn_update').hover(function () {
    $(this).attr('src', 'images/edit_h.png');
  },
    function () {
      $(this).attr('src', 'images/edit.png');
    });
});

$(function () {
  $('.btn_delete').hover(function () {
    $(this).attr('src', 'images/trash-h.png');
  },
    function () {
      $(this).attr('src', 'images/trash.png');
    });
});
