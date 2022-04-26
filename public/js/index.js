//ユーザ画像アップ
function previewImage(obj)
{
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('preview').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
}

//いいね機能
$(function ()
{
    //「toggle_wish」というクラスを持つタグがクリックされたときに以下の処理が走る
    $('.toggle_wish').on('click', function ()
    {
        //表示しているプロダクトのIDと状態、押下し他ボタンの情報を取得
        item_id = $(this).attr("item_id");
        like_item = $(this).attr("like_item");
        click_button = $(this);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  //基本的にはデフォルトでOK
            },
            url: '/like_item',  //route.phpで指定したコントローラーのメソッドURLを指定
            type: 'POST',   //GETかPOSTメソットを選択
            data: { 'item_id': item_id, 'like_item': like_item, }, //コントローラーに送るに名称をつけてデータを指定
                })
            //正常にコントローラーの処理が完了した場合
            .done(function (data) //コントローラーからのリターンされた値(like_item)をdataとして指定
            {
							likealready = data.like_item;
							likes_count = data.item_likes_count;
								//いいねをした
                if ( likealready == 0 )
                {
                    //クリックしたタグのステータスを変更
                    click_button.attr("like_item", "1");
                    //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                    click_button.children().attr("class", "fas fa-heart");
										$('#like_counter').text(likes_count);
										$('.fa-heart').toggleClass("liked");
								}
								//いいねを取り消し
                if ( likealready == 1 )
                { //クリックしたタグのステータスを変更
                    click_button.attr("like_item", "0");
                    //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                    click_button.children().attr("class", "far fa-heart");
										$('#like_counter').text(likes_count);
                }
            })
            ////正常に処理が完了しなかった場合
            .fail(function (data)
            {
                alert('いいね処理失敗');
                alert(JSON.stringify(data));
            });
    });
});


function submitCheck(){
    if(window.confirm('削除してよろしいですか？')) {
        return true;
    } else {
        return false;
    }
};

function mypageCheck(){
    if(window.confirm('更新してよろしいですか？')) {
        return true;
    } else {
        return false;
    }
};

$(function() {
  $('.top_img').fadeIn(1500);
});

$(function() {
    $('.item_area .item')
        .css({opacity: 0})
        .each(function(i){
            $(this).delay(300 * i).animate({opacity:1}, 1000);
        });
});
