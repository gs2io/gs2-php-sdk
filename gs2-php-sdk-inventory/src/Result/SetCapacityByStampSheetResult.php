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
use Gs2\Inventory\Model\Inventory;

/**
 * スタンプシートでキャパシティサイズを設定 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class SetCapacityByStampSheetResult implements IResult {
	/** @var Inventory 更新後のインベントリ */
	private $item;

	/**
	 * 更新後のインベントリを取得
	 *
	 * @return Inventory|null スタンプシートでキャパシティサイズを設定
	 */
	public function getItem(): ?Inventory {
		return $this->item;
	}

	/**
	 * 更新後のインベントリを設定
	 *
	 * @param Inventory|null $item スタンプシートでキャパシティサイズを設定
	 */
	public function setItem(?Inventory $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): SetCapacityByStampSheetResult {
        $result = new SetCapacityByStampSheetResult();
        $result->setItem(isset($data["item"]) ? Inventory::fromJson($data["item"]) : null);
        return $result;
    }
}