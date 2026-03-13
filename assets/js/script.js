(function ($) {
  //-----------------------
  //ハンバーガーメニュー
  //-----------------------
  $('.menu-button').on('click', function () {
    $('.header-menu').toggleClass('active');
    $(this).toggleClass('active');
  });
  //-----------------------
  //services用スライダー
  //-----------------------
  $services = $('.services');
  $.each($services, function (index, value) {
    count = $(value).children('.service').length;
    if (count > 4) {
      $(value).addClass('slick4');
    }
  });

  $('.services.slick4').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: true,
    centerMode: true,
    centerPadding: '0px',
    variableWidth: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          variableWidth: false,
        }
      }
    ],
  });

  //-----------------------
  //ヘッダー表示
  //-----------------------
  $(document).on('load scroll', function (e) {
    $scrollT = $(document).scrollTop();
    $header = $('header.home');
    if ($scrollT > 700) {
      $header.fadeIn(800);
    } else {
      $header.fadeOut();
    }
  })
  //-----------------------
  //背景パララックス
  //-----------------------
  $(document).on('scroll', function () {
    $scrollT = $(document).scrollTop();
    $('main:not(.portfolio)').css({
      backgroundPosition: 'center ' + Math.floor(-$scrollT / 2 + 700) + 'px'
    });
  })
  //-----------------------
  //ポートフォリオ絞り込み
  //-----------------------

  //クリックイベントで発火
  $('.works-nav .nav-item>a').on('click', function () {
    //現在アクティブなカテゴリが再度クリックされたらAjaxしない
    if (!$(this).parent().hasClass('active')) {
      //activeクラスをつけなおす
      $('.works-nav .nav-item.active').removeClass('active');
      $(this).parent().addClass('active');
      //valueをWorksDataオブジェクトに加える
      WorksData.value = $(this).attr('value');
      startAjax(WorksData);
    }
  })

  //ajax通信
  function startAjax(data) {
    console.log('start');
    //くるくるスタート
    $('.loading').addClass('active');
    $('.work-item').addClass('fadeOut')
    var jqHXR = $.ajax({
      type: "POST",
      url: ThemeData.url + '/assets/ajax/ajax-works.php',
      data: JSON.stringify(data)
    }).done(function (res) {
      getWorks(res); //成功時
    }).always(function () {
      endWorksAjax(); //完了時
    }).fail(function () {
      console.log('failed'); //失敗時
      endWorksAjax(); //完了時
    });

    return jqHXR;
  }

  //成功時
  function getWorks(works) {
    let html = '';
    //workのループ
    $.each(works, (index, work) => {
      let html_tags = '';
      //tagのループ
      $.each(work.tags, (index, tag) => {
        html_tags = html_tags + `<li>
        <p>${tag.name}</p>
        </li>`
      });

      html = html +
        `<li class="work-item col3 fadeIn">
        <a href="${work.url}">
          ${work.image_src}
          <div class="description">
            <p class="work-title">${work.title}</p>
            <p>${work.genre}</p>
            <ul class="tag_list">
              ${html_tags}
            </ul>
          </div>
        </a>
      </li>`;
    });
    //記事がない場合
    if (!works) {
      html = '<p>Coming Soon!</p>';
    }

    $works_list = $('.works-list');
    $works_list.html(html);
  }

  //完了時
  function endWorksAjax() {
    console.log('finished');
    //くるくる終わり
    $loading = $('.loading.active');
    $loading.removeClass('active');
  }

})(jQuery);

