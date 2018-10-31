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

namespace Gs2\Key\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DecryptRequest extends Gs2BasicRequest {

    const FUNCTION = "Decrypt";

	/** @var string 暗号鍵の名前を指定します。 */
	private $keyName;

	/** @var string 暗号化されたデータ */
	private $data;


	/**
	 * 暗号鍵の名前を指定します。を取得
	 *
	 * @return string 暗号鍵の名前を指定します。
	 */
	public function getKeyName() {
		return $this->keyName;
	}

	/**
	 * 暗号鍵の名前を指定します。を設定
	 *
	 * @param string $keyName 暗号鍵の名前を指定します。
	 */
	public function setKeyName($keyName) {
		$this->keyName = $keyName;
	}

	/**
	 * 暗号鍵の名前を指定します。を設定
	 *
	 * @param string $keyName 暗号鍵の名前を指定します。
	 * @return DecryptRequest
	 */
	public function withKeyName($keyName): DecryptRequest {
		$this->setKeyName($keyName);
		return $this;
	}

	/**
	 * 暗号化されたデータを取得
	 *
	 * @return string 暗号化されたデータ
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * 暗号化されたデータを設定
	 *
	 * @param string $data 暗号化されたデータ
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * 暗号化されたデータを設定
	 *
	 * @param string $data 暗号化されたデータ
	 * @return DecryptRequest
	 */
	public function withData($data): DecryptRequest {
		$this->setData($data);
		return $this;
	}

}