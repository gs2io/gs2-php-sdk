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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\CurrentStaminaMaster;

/**
 * 現在有効なスタミナマスターを取得します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCurrentStaminaMasterResult implements IResult {
	/** @var CurrentStaminaMaster 現在有効なスタミナマスター */
	private $item;

	/**
	 * 現在有効なスタミナマスターを取得
	 *
	 * @return CurrentStaminaMaster|null 現在有効なスタミナマスターを取得します
	 */
	public function getItem(): ?CurrentStaminaMaster {
		return $this->item;
	}

	/**
	 * 現在有効なスタミナマスターを設定
	 *
	 * @param CurrentStaminaMaster|null $item 現在有効なスタミナマスターを取得します
	 */
	public function setItem(?CurrentStaminaMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetCurrentStaminaMasterResult {
        $result = new GetCurrentStaminaMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentStaminaMaster::fromJson($data["item"]) : null);
        return $result;
    }
}