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
use Gs2\Inventory\Model\ItemModelMaster;

/**
 * アイテムモデルマスターを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateItemModelMasterResult implements IResult {
	/** @var ItemModelMaster 作成したアイテムモデルマスター */
	private $item;

	/**
	 * 作成したアイテムモデルマスターを取得
	 *
	 * @return ItemModelMaster|null アイテムモデルマスターを新規作成
	 */
	public function getItem(): ?ItemModelMaster {
		return $this->item;
	}

	/**
	 * 作成したアイテムモデルマスターを設定
	 *
	 * @param ItemModelMaster|null $item アイテムモデルマスターを新規作成
	 */
	public function setItem(?ItemModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateItemModelMasterResult {
        $result = new CreateItemModelMasterResult();
        $result->setItem(isset($data["item"]) ? ItemModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}