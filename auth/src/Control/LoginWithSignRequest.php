<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Auth\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class LoginWithSignRequest extends Gs2BasicRequest {

    const FUNCTION = "LoginWithSign";

	/** @var string ログインするサービスID */
	private $serviceId;

	/** @var string ログインするユーザのIDを指定してください */
	private $userId;

	/** @var string GS2-Accountの認証署名の作成に使用した GS2-Key の暗号鍵名 */
	private $keyName;

	/** @var string GS2-Accountの認証署名 */
	private $sign;


	/**
	 * ログインするサービスIDを取得
	 *
	 * @return string ログインするサービスID
	 */
	public function getServiceId() {
		return $this->serviceId;
	}

	/**
	 * ログインするサービスIDを設定
	 *
	 * @param string $serviceId ログインするサービスID
	 */
	public function setServiceId($serviceId) {
		$this->serviceId = $serviceId;
	}

	/**
	 * ログインするサービスIDを設定
	 *
	 * @param string $serviceId ログインするサービスID
	 * @return LoginWithSignRequest
	 */
	public function withServiceId($serviceId): LoginWithSignRequest {
		$this->setServiceId($serviceId);
		return $this;
	}

	/**
	 * ログインするユーザのIDを指定してくださいを取得
	 *
	 * @return string ログインするユーザのIDを指定してください
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ログインするユーザのIDを指定してくださいを設定
	 *
	 * @param string $userId ログインするユーザのIDを指定してください
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ログインするユーザのIDを指定してくださいを設定
	 *
	 * @param string $userId ログインするユーザのIDを指定してください
	 * @return LoginWithSignRequest
	 */
	public function withUserId($userId): LoginWithSignRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * GS2-Accountの認証署名の作成に使用した GS2-Key の暗号鍵名を取得
	 *
	 * @return string GS2-Accountの認証署名の作成に使用した GS2-Key の暗号鍵名
	 */
	public function getKeyName() {
		return $this->keyName;
	}

	/**
	 * GS2-Accountの認証署名の作成に使用した GS2-Key の暗号鍵名を設定
	 *
	 * @param string $keyName GS2-Accountの認証署名の作成に使用した GS2-Key の暗号鍵名
	 */
	public function setKeyName($keyName) {
		$this->keyName = $keyName;
	}

	/**
	 * GS2-Accountの認証署名の作成に使用した GS2-Key の暗号鍵名を設定
	 *
	 * @param string $keyName GS2-Accountの認証署名の作成に使用した GS2-Key の暗号鍵名
	 * @return LoginWithSignRequest
	 */
	public function withKeyName($keyName): LoginWithSignRequest {
		$this->setKeyName($keyName);
		return $this;
	}

	/**
	 * GS2-Accountの認証署名を取得
	 *
	 * @return string GS2-Accountの認証署名
	 */
	public function getSign() {
		return $this->sign;
	}

	/**
	 * GS2-Accountの認証署名を設定
	 *
	 * @param string $sign GS2-Accountの認証署名
	 */
	public function setSign($sign) {
		$this->sign = $sign;
	}

	/**
	 * GS2-Accountの認証署名を設定
	 *
	 * @param string $sign GS2-Accountの認証署名
	 * @return LoginWithSignRequest
	 */
	public function withSign($sign): LoginWithSignRequest {
		$this->setSign($sign);
		return $this;
	}

}