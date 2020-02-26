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
use Gs2\Stamina\Model\StaminaModelMaster;

/**
 * スタミナモデルマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateStaminaModelMasterResult implements IResult {
	/** @var StaminaModelMaster 更新したスタミナモデルマスター */
	private $item;

	/**
	 * 更新したスタミナモデルマスターを取得
	 *
	 * @return StaminaModelMaster|null スタミナモデルマスターを更新
	 */
	public function getItem(): ?StaminaModelMaster {
		return $this->item;
	}

	/**
	 * 更新したスタミナモデルマスターを設定
	 *
	 * @param StaminaModelMaster|null $item スタミナモデルマスターを更新
	 */
	public function setItem(?StaminaModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateStaminaModelMasterResult {
        $result = new UpdateStaminaModelMasterResult();
        $result->setItem(isset($data["item"]) ? StaminaModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}