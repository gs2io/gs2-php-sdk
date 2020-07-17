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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\SalesItemGroupMaster;

/**
 * 商品グループマスターを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteSalesItemGroupMasterResult implements IResult {
	/** @var SalesItemGroupMaster 削除した商品グループマスター */
	private $item;

	/**
	 * 削除した商品グループマスターを取得
	 *
	 * @return SalesItemGroupMaster|null 商品グループマスターを削除
	 */
	public function getItem(): ?SalesItemGroupMaster {
		return $this->item;
	}

	/**
	 * 削除した商品グループマスターを設定
	 *
	 * @param SalesItemGroupMaster|null $item 商品グループマスターを削除
	 */
	public function setItem(?SalesItemGroupMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteSalesItemGroupMasterResult {
        $result = new DeleteSalesItemGroupMasterResult();
        $result->setItem(isset($data["item"]) ? SalesItemGroupMaster::fromJson($data["item"]) : null);
        return $result;
    }
}