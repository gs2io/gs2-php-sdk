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
class CreateKeyRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateKey";

	/** @var string 暗号鍵の名前 */
	private $name;


	/**
	 * 暗号鍵の名前を取得
	 *
	 * @return string 暗号鍵の名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 暗号鍵の名前を設定
	 *
	 * @param string $name 暗号鍵の名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 暗号鍵の名前を設定
	 *
	 * @param string $name 暗号鍵の名前
	 * @return CreateKeyRequest
	 */
	public function withName($name): CreateKeyRequest {
		$this->setName($name);
		return $this;
	}

}