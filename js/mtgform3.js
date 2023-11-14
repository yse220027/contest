$(function(){
  /*=================================================
  // カレンダー用 jQueryプラグイン「Datepicker」
  ===================================================*/
  $(document).ready(function() {
    $('#reservation').datepicker();
  });

  /*=================================================
  // ラジオボタン下のテキスト切り替え
  //（ラジオボタンが変更されたタイミングで実行）
  ===================================================*/
  $('.lesson').on('change', function(){
    // チェックされている方のラジオボタンのvalue値を取得
    let lesson = $('input[name=your-lesson]:checked').val();

    // 「オンラインで受講」がチェックされている場合
    if (lesson == 'online') {
      // 「オンラインで受講」用のテキストを表示する
      $('.note-online').css('display', 'block');
      // 「会場で受講」用のテキストを非表示にする
      $('.note-venue').css('display', 'none');

    // 「会場で受講」がチェックされている場合
    } else if (lesson == 'venue') {
      // 「オンラインで受講」用のテキストを非表示にする
      $('.note-online').css('display', 'none');
      // 「会場で受講」用のテキストを表示する
      $('.note-venue').css('display', 'block');
    }
  });

  /*=================================================
  // 入力チェック（申し込みボタン押下時に実行）
  ===================================================*/
  $('#submit-button').on('click', function(event){
    // エラーメッセージを表示するためのエリアを初期化
    $('#name-error').text("");
    $('#mtgname-error').text("");
    $('#venue-error').text("");
    $('#reservation-error').text("");
    $('#start-time-error').text("");
    $('#end-time-error').text("");
    $('#lesson-error').text("");

    // 名前が未入力の場合
    if($('input[name="your-name"]').val() == "") {
      // エラーメッセージをセット
      $("#name-error").text("名前は必須項目です。");
      event.preventDefault(); // リダイレクトを防止
    }

    // 会議名が未入力の場合
    if($('input[name="mtg-name"]').val() == "") {
      // エラーメッセージをセット
      $("#mtgname-error").text("会議名は必須項目です。");
      event.preventDefault(); // リダイレクトを防止
    }

    // 会議会場が未入力の場合
    if($('input[name="venue-name"]').val() == "") {
      // エラーメッセージをセット
      $("#venue-error").text("会議会場は必須項目です。");
      event.preventDefault(); // リダイレクトを防止
    }

    // 予約日が未入力の場合
    if($('input[name="your-reservation"]').val() == "") {
      // エラーメッセージをセット
      $("#reservation-error").text("予約日は必須項目です。");
      event.preventDefault(); // リダイレクトを防止
    }

    // 開始時間が未入力の場合
    if($('input[name="start-time"]').val() == "") {
      // エラーメッセージをセット
      $("#start-time-error").text("開始時間は必須項目です。");
      event.preventDefault(); // リダイレクトを防止
    }

    // 終了時間が未入力の場合
    if($('input[name="end-time"]').val() == "") {
      // エラーメッセージをセット
      $("#end-time-error").text("終了時間は必須項目です。");
      event.preventDefault(); // リダイレクトを防止
    }

    // エラーメッセージが一つも表示されていない場合はフォームを送信
    if ($('#name-error').text() === "" && $('#mtgname-error').text() === "" && $('#venue-error').text() === "" && $('#reservation-error').text() === "" && $('#start-time-error').text() === "" && $('#end-time-error').text() === "" && $('#lesson-error').text() === "") {
      // フォームデータを取得
      var meetings = $('form').serialize();
  
      // Ajaxを使って非同期でサーバーにデータを送信
      $.post('mtgform.php', meetings, function(response){
        // サーバーからのレスポンスを処理必要なのを追加
      });
    }
  });
});
