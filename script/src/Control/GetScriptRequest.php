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

namespace Gs2\Script\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetScriptRequest extends Gs2BasicRequest {

    const FUNCTION = "GetScript";

	/** @var string スクリプトの名前を指定します。 */
	private $scriptName;


	/**
	 * スクリプトの名前を指定します。を取得
	 *
	 * @return string スクリプトの名前を指定します。
	 */
	public function getScriptName() {
		return $this->scriptName;
	}

	/**
	 * スクリプトの名前を指定します。を設定
	 *
	 * @param string $scriptName スクリプトの名前を指定します。
	 */
	public function setScriptName($scriptName) {
		$this->scriptName = $scriptName;
	}

	/**
	 * スクリプトの名前を指定します。を設定
	 *
	 * @param string $scriptName スクリプトの名前を指定します。
	 * @return GetScriptRequest
	 */
	public function withScriptName($scriptName): GetScriptRequest {
		$this->setScriptName($scriptName);
		return $this;
	}

}