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
 * インベントリモデルマスターを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetInventoryModelMasterResult implements IResult {
	/** @var InventoryModelMaster インベントリモデルマスター */
	private $item;

	/**
	 * インベントリモデルマスターを取得
	 *
	 * @return InventoryModelMaster|null インベントリモデルマスターを取得
	 */
	public function getItem(): ?InventoryModelMaster {
		return $this->item;
	}

	/**
	 * インベントリモデルマスターを設定
	 *
	 * @param InventoryModelMaster|null $item インベントリモデルマスターを取得
	 */
	public function setItem(?InventoryModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetInventoryModelMasterResult {
        $result = new GetInventoryModelMasterResult();
        $result->setItem(isset($data["item"]) ? InventoryModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}