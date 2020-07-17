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
 * インベントリモデルマスターを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteInventoryModelMasterResult implements IResult {
	/** @var InventoryModelMaster 削除したインベントリモデルマスター */
	private $item;

	/**
	 * 削除したインベントリモデルマスターを取得
	 *
	 * @return InventoryModelMaster|null インベントリモデルマスターを削除
	 */
	public function getItem(): ?InventoryModelMaster {
		return $this->item;
	}

	/**
	 * 削除したインベントリモデルマスターを設定
	 *
	 * @param InventoryModelMaster|null $item インベントリモデルマスターを削除
	 */
	public function setItem(?InventoryModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteInventoryModelMasterResult {
        $result = new DeleteInventoryModelMasterResult();
        $result->setItem(isset($data["item"]) ? InventoryModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}