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
use Gs2\Stamina\Model\StaminaModel;

/**
 * スタミナモデルを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetStaminaModelResult implements IResult {
	/** @var StaminaModel スタミナモデル */
	private $item;

	/**
	 * スタミナモデルを取得
	 *
	 * @return StaminaModel|null スタミナモデルを取得
	 */
	public function getItem(): ?StaminaModel {
		return $this->item;
	}

	/**
	 * スタミナモデルを設定
	 *
	 * @param StaminaModel|null $item スタミナモデルを取得
	 */
	public function setItem(?StaminaModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetStaminaModelResult {
        $result = new GetStaminaModelResult();
        $result->setItem(isset($data["item"]) ? StaminaModel::fromJson($data["item"]) : null);
        return $result;
    }
}