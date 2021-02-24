$(function(){
	var glovalNav = $('.gloval__nav');　//　グローバルナビゲーションのセレクタ
	var navHeight = glovalNav.outerHeight(true); //　ナビゲーションのheight(marginやpadding,box-shadowも含む)
	var navOffset = glovalNav.offset().top; //　ブラウザの一番上からナビゲーションまでの位置

	// スクロールした時
	$(window).scroll(function () {
		// スクロールがナビゲーション位置に来たら
		if ($(this).scrollTop() > navOffset) {
			// ナビゲーションをfixedさせる
			glovalNav.css({
				'position':'fixed',
				'top':0,
				'width':'100%',
			});
			// ここは重要な部分で、fixedするとその分高さがなくなるので、margin-topを高さ分つけてあげます。
			$('.main__wrapper').css('margin-top',navHeight);
		} else {
			// ifのtrueでない場合、つまり、ナビゲーション位置に来ていない時はrelativeで元に戻す。staticでも可
			glovalNav.css('position','relative');
			$('.main__wrapper').css('margin-top','auto');
		}
	});
});

$(function(){
	$('a[href^="#"]').click(function(){
	  var speed = 500;
	  var href= $(this).attr("href");
	  var target = $(href == "#" || href == "" ? 'html' : href);
	  var position = target.offset().top;
	  $("html, body").animate({scrollTop:position}, speed, "swing");
	  return false;
	});
});