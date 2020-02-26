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
use Gs2\Inventory\Model\InventoryModel;

/**
 * インベントリモデルを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetInventoryModelResult implements IResult {
	/** @var InventoryModel インベントリモデル */
	private $item;

	/**
	 * インベントリモデルを取得
	 *
	 * @return InventoryModel|null インベントリモデルを取得
	 */
	public function getItem(): ?InventoryModel {
		return $this->item;
	}

	/**
	 * インベントリモデルを設定
	 *
	 * @param InventoryModel|null $item インベントリモデルを取得
	 */
	public function setItem(?InventoryModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetInventoryModelResult {
        $result = new GetInventoryModelResult();
        $result->setItem(isset($data["item"]) ? InventoryModel::fromJson($data["item"]) : null);
        return $result;
    }
}