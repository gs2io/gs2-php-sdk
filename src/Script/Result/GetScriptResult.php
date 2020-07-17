<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Script\Result;

use Gs2\Core\Model\IResult;
use Gs2\Script\Model\Script;

/**
 * スクリプトを取得します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetScriptResult implements IResult {
	/** @var Script スクリプト */
	private $item;

	/**
	 * スクリプトを取得
	 *
	 * @return Script|null スクリプトを取得します
	 */
	public function getItem(): ?Script {
		return $this->item;
	}

	/**
	 * スクリプトを設定
	 *
	 * @param Script|null $item スクリプトを取得します
	 */
	public function setItem(?Script $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetScriptResult {
        $result = new GetScriptResult();
        $result->setItem(isset($data["item"]) ? Script::fromJson($data["item"]) : null);
        return $result;
    }
}