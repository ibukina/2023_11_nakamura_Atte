$(function () {
    // 勤務開始ボタンがクリックされたときの処理
    $("#button_clock_in").on("click", function () {
        var time = new Date();// 現在の日時を取得
        var timeString = time.toLocaleString();// 日時を文字列に変換
        $("#clock_in_time").val(timeString);// hidden属性のinput要素に値を代入
        // ボタンの切り替え
        $("#button_clock_in").prop("disabled", true);
        $("#button_clock_out").prop("disabled", false);
    });
    // 勤務終了ボタンがクリックされたときの処理
    $("#button_clock_out").on("click", function () {
        // 現在の日時を文字列に変換して、idがclock_out_timeの要素に値を設定する
        $("#clock_out_time").val(new Date().toLocaleString());
    });
    // 休憩開始ボタンがクリックされたときの処理
    $("#button_rest_start").on("click", function () {
        // 現在の日時を文字列に変換して、idがclock_out_timeの要素に値を設定する
        console.log(new Date());
        $("#rest_start_time").val(new Date().toLocaleString());
    });
    // 休憩終了ボタンがクリックされたときの処理
    $("#button_rest_stop").on("click", function () {
        // 現在の日時を文字列に変換して、idがclock_out_timeの要素に値を設定する
        $("#rest_stop_time").val(new Date().toLocaleString());
    })
});