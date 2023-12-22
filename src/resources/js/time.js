$(function () {
  	// 勤務開始ボタンがクリックされたときの処理
	$(".stamp-form_item-button").eq(0).on("click", function () {
    	var time = new Date(); // 現在の日時を取得
    	var timeString = time.toLocaleString(); // 日時を文字列に変換
		$("#clock_in_time").val(timeString); // hidden属性のinput要素に値を代入
		// ボタンの切り替え
        $("#button_clock_in").prop("disabled", true);
		$("#button_clock_out").prop("disabled", false);
		$("#button_rest_start").prop("disabled", false);
		$("#button_rest_stop").prop("disabled", true);
		// Ajaxでコントローラーに値を渡す
		$.ajax({
			url: '/work-start', // コントローラーのURL
			type: 'POST', // HTTPメソッド
			data: { // 送信するデータ
				clock_in: timeString, // 日時
				_token: $('meta[name="csrf-token"]').attr('content') // CSRFトークン
			},
			// 通信成功時の処理
			success: function (response) { // responseにはコントローラーから返されたデータが入る
				alert(response.message); // alertで表示する
			},
			// 通信失敗時の処理
			error: function (xhr, status, error) { // xhrにはXMLHttpRequestオブジェクトが入る・statusにはエラーの種類が入る・errorにはエラーのメッセージが入る
				console.error(error); // consoleに出力する
			}
		});
	});
  	// 勤務終了ボタンがクリックされたときの処理
	$(".stamp-form_item-button").eq(1).on("click", function () {
    	var time = new Date(); // 現在の日時を取得
    	var timeString = time.toLocaleString(); // 日時を文字列に変換
		$("#clock_out_time").val(timeString); // hidden属性のinput要素に値を代入
		// ボタンの切り替え
        $("#button_clock_in").prop("disabled", false);
		$("#button_clock_out").prop("disabled", true);
		$("#button_rest_start").prop("disabled", true);
		$("#button_rest_stop").prop("disabled", true);
		// $.post()でAjax通信をする
		$.post('/work-stop', { // urlとdataを指定する
			clock_out: timeString, // 日時
			_token: $('meta[name="csrf-token"]').attr('content') // CSRFトークン
		}, function (response) { // successのコールバック関数を指定する
			alert(response.message); // alertで表示する
		}).fail(function (xhr, status, error) { // errorのコールバック関数を指定する
			console.error(error); // consoleに出力する
		});
	});
	// 休憩開始ボタンがクリックされたときの処理
    $(".stamp-form_item-button").eq(2).on("click", function () {
		var time = new Date();
		var timeString = time.toLocaleString();
		$("#rest_start_time").val(new Date().toLocaleString());
        $("#button_clock_in").prop("disabled", true);
		$("#button_clock_out").prop("disabled", true);
		$("#button_rest_start").prop("disabled", true);
		$("#button_rest_stop").prop("disabled", false);
		$.post('/rest-start', {
			rest_start: timeString,
			_token: $('meta[name="csrf-token"]').attr('content')
		}, function (response) {
			alert(response.message);
		}).fail(function (xhr, status, error) {
			console.error(error);
		});
    });
    // 休憩終了ボタンがクリックされたときの処理
	$(".stamp-form_item-button").eq(3).on("click", function () {
		var time = new Date();
		var timeString = time.toLocaleString();
		$("#rest_stop_time").val(new Date().toLocaleString());
        $("#button_clock_in").prop("disabled", true);
		$("#button_clock_out").prop("disabled", false);
		$("#button_rest_start").prop("disabled", false);
		$("#button_rest_stop").prop("disabled", true);
		$.post('/rest-stop', {
			rest_stop: timeString,
			_token: $('meta[name="csrf-token"]').attr('content')
		}, function (response) {
			alert(response.message);
		}).fail(function (xhr, status, error) {
			console.error(error);
		});
	});
});