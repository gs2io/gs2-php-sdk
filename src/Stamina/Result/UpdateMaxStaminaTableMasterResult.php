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
use Gs2\Stamina\Model\MaxStaminaTableMaster;

/**
 * スタミナの最大値テーブルマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateMaxStaminaTableMasterResult implements IResult {
	/** @var MaxStaminaTableMaster 更新したスタミナの最大値テーブルマスター */
	private $item;

	/**
	 * 更新したスタミナの最大値テーブルマスターを取得
	 *
	 * @return MaxStaminaTableMaster|null スタミナの最大値テーブルマスターを更新
	 */
	public function getItem(): ?MaxStaminaTableMaster {
		return $this->item;
	}

	/**
	 * 更新したスタミナの最大値テーブルマスターを設定
	 *
	 * @param MaxStaminaTableMaster|null $item スタミナの最大値テーブルマスターを更新
	 */
	public function setItem(?MaxStaminaTableMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateMaxStaminaTableMasterResult {
        $result = new UpdateMaxStaminaTableMasterResult();
        $result->setItem(isset($data["item"]) ? MaxStaminaTableMaster::fromJson($data["item"]) : null);
        return $result;
    }
}