<?php
	/*
	** file_cget_contents(fcc.php)
	** by blazechariot(http://blazechariot.wp.xdomain.jp/)
	*/
	
	// 関数定義
	function file_cget_contents($address) {
		
		// cURLを利用する
		// 初期化
		$ch = curl_init();
		
		// URLの設定
		curl_setopt($ch, CURLOPT_URL, $address);
		
		// データを受け取るか
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		// cURLの実行
		$result = curl_exec($ch);
		
		// cURLのクローズ
		curl_close($ch);
		
		// 取得したデータを返す
		return $result;
	}
?>