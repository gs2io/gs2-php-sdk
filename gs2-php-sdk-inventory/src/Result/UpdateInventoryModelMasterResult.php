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

namespace Gs2\Inventory\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inventory\Model\InventoryModelMaster;

/**
 * インベントリモデルマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateInventoryModelMasterResult implements IResult {
	/** @var InventoryModelMaster 更新したインベントリモデルマスター */
	private $item;

	/**
	 * 更新したインベントリモデルマスターを取得
	 *
	 * @return InventoryModelMaster|null インベントリモデルマスターを更新
	 */
	public function getItem(): ?InventoryModelMaster {
		return $this->item;
	}

	/**
	 * 更新したインベントリモデルマスターを設定
	 *
	 * @param InventoryModelMaster|null $item インベントリモデルマスターを更新
	 */
	public function setItem(?InventoryModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateInventoryModelMasterResult {
        $result = new UpdateInventoryModelMasterResult();
        $result->setItem(isset($data["item"]) ? InventoryModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}