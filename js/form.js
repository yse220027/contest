// ページが読み込まれたときに実行
window.onload = function() {
// URLから会議IDを取得
const urlParams = new URLSearchParams(window.location.search);
const mtgId = urlParams.get("mtgid");

// 会議IDフィールドに値を設定
if (mtgId) {
  document.getElementById("mtgid").value = mtgId;
}
};

//-------ここまでの処理がQRから飛んできた場合に実行されてIDが入力された状態になる
 
$(function(){
  // ラジオボタン下のテキスト切り替え
  // （ラジオボタンが変更されたタイミングで実行）
  $('.lesson').on('change', function(){
    // チェックされている方のラジオボタンのvalue値を取得
    let lesson = $('input[name=your-lesson]:checked').val();

    // 「オンラインで受講」がチェックされている場合
    if (lesson == 'online') {
      // 「オンラインで受講」用のテキストを表示する
      $('.note-online').css('display', 'block');
      // 「会場で受講」用のテキストを非表示にする
      $('.note-venue').css('display', 'none');
    }
    // 「会場で受講」がチェックされている場合
    else if (lesson == 'venue') {
      // 「オンラインで受講」用のテキストを非表示にする
      $('.note-online').css('display', 'none');
      // 「会場で受講」用のテキストを表示する
      $('.note-venue').css('display', 'block');
    }
  });

  // 入力チェック（申し込みボタン押下時に実行）
  $('#submit-button').on('click', function(){
    // エラーメッセージを表示するためのエリアを初期化
    $('#name-error').text("");
    $('#mtgid-error').text("");
    $('#email-error').text("");
    $('#tel-error').text("");
    $('#reservation-error').text("");
    $('#lesson-error').text("");
    $("#question-error").text("");

    // 質問内容が未入力の場合
    if ($('textarea[name="question"]').val().trim() === "") {
      // エラーメッセージをセット
      $("#question-error").text("質問の記入がありません。");
    } else {
      // エラーメッセージをクリア
      $("#question-error").text("");
    }

    // 名前が未入力の場合
    if ($('input[name="your-name"]').val().trim() === "") {
      // エラーメッセージをセット
      $("#name-error").text("名前は必須項目です。");
    } else {
      // エラーメッセージをクリア
      $("#name-error").text("");
    }

    // 会議IDが未入力の場合
    if ($('input[name="mtg-id"]').val().trim() === "") {
      // エラーメッセージをセット
      $("#mtgid-error").text("会議IDは必須項目です。");
    } else {
    //   // 会議IDがマイナスの場合
    //   if (Math.abs($('input[name="mtg-id"]').val()) < 0) {
    //     // エラーメッセージをセット
    //     $("#mtgid-error").text("会議IDにはマイナスの値を使用できません。");
    //   } else {
    //   // エラーメッセージをクリア
    //   $("migid-error").text("");
    // }
    }

    // Emailに入力があり、形式が間違っている場合
    if ($('input[name="your-email"]').val() !== "") {
      // Emailのフォーマットチェックを行う正規表現パターン
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      // 入力されたEmailが正しいフォーマットでない場合
      if (!emailPattern.test($('input[name="your-email"]').val())) {
        // エラーメッセージをセット
        $("#email-error").text("正しいメールアドレスの形式で入力してください。");
      } else {
        // エラーメッセージをクリア
        $("#email-error").text("");
      }
    }

    // 電話番号の入力があり、形式が違う場合
    if ($('input[name="your-tel1"]').val() !== "" || $('input[name="your-tel2"]').val() !== "" || $('input[name="your-tel3"]').val() !== "") {
      // 電話番号の入力が不完全な場合
      if ($('input[name="your-tel1"]').val() === "" || $('input[name="your-tel2"]').val() === "" || $('input[name="your-tel3"]').val() === "") {
        // エラーメッセージをセット
        $("#tel-error").text("電話番号が不完全です。すべてのフォームに入力してください。");
      } else {
        // 電話番号の入力値を連結して文字列に変換
        let phoneNumber = $('input[name="your-tel1"]').val() + $('input[name="your-tel2"]').val() + $('input[name="your-tel3"]').val();
        // 電話番号が数字以外の文字を含む場合
        if (!/^\d+$/.test(phoneNumber)) {
          // エラーメッセージをセット
          $("#tel-error").text("電話番号は数字のみ入力してください。");
        } else {
          // エラーメッセージをクリア
          $("#tel-error").text("");
        }
      }
    }

    // エラーメッセージが一つも表示されていない場合はフォームを送信
    if ($("#name-error").text() === "" && $("#email-error").text() === "" && $("#tel-error").text() === "" && $("#question-error").text() === "") {
      // フォームデータを取得
      var questions = $('form').serialize();
    }
  });
});


