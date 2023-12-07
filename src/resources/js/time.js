$(function () {
    // 勤務開始ボタンがクリックされたときの処理
    $("#button_clock_in").on("click", function () {
        var time = new Date();// 現在の日時を取得
        var timeString = time.toLocaleString();// 日時を文字列に変換
        $("#clock_in_time").val(timeString);// hidden属性のinput要素に値を代入
        console.log("pushed_button");
    });
    // 勤務終了ボタンがクリックされたときの処理
    $("#button_clock_out").on("click", function () {
        var time = new Date();// 現在の日時を取得
        var timeString = time.toLocaleString();// 日時を文字列に変換
        $("#clock_out_time").val(timeString);// hidden属性のinput要素に値を代入
    });
    // 休憩開始ボタンがクリックされたときの処理
    $("#button_rest_start").on("click", function () {
        var time = new Date();// 日時を文字列に変換
        var timeString = time.toLocaleString();// 日時を文字列に変換
        $("#rest_start_time").val(timeString);// hidden属性のinput要素に値を代入
    });
    // 休憩終了ボタンがクリックされたときの処理
    $("#button_rest_stop").on("click", function () {
        var time = new Date();
        var timeString = time.toLocaleString();// 日時を文字列に変換
        $("#rest_stop_time").val(timeString);// hidden属性のinput要素に値を代入
    })
});