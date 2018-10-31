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
class CreateTimeOnetimeTokenRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateTimeOnetimeToken";

	/** @var string 認可スクリプトを指定します */
	private $scriptName;


	/**
	 * 認可スクリプトを指定しますを取得
	 *
	 * @return string 認可スクリプトを指定します
	 */
	public function getScriptName() {
		return $this->scriptName;
	}

	/**
	 * 認可スクリプトを指定しますを設定
	 *
	 * @param string $scriptName 認可スクリプトを指定します
	 */
	public function setScriptName($scriptName) {
		$this->scriptName = $scriptName;
	}

	/**
	 * 認可スクリプトを指定しますを設定
	 *
	 * @param string $scriptName 認可スクリプトを指定します
	 * @return CreateTimeOnetimeTokenRequest
	 */
	public function withScriptName($scriptName): CreateTimeOnetimeTokenRequest {
		$this->setScriptName($scriptName);
		return $this;
	}

}