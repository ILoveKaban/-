<?php
	/*
	** file_cget_contents(fcc.php)
	** by blazechariot(http://blazechariot.wp.xdomain.jp/)
	*/
	
	// �֐���`
	function file_cget_contents($address) {
		
		// cURL�𗘗p����
		// ������
		$ch = curl_init();
		
		// URL�̐ݒ�
		curl_setopt($ch, CURLOPT_URL, $address);
		
		// �f�[�^���󂯎�邩
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		// cURL�̎��s
		$result = curl_exec($ch);
		
		// cURL�̃N���[�Y
		curl_close($ch);
		
		// �擾�����f�[�^��Ԃ�
		return $result;
	}
?>