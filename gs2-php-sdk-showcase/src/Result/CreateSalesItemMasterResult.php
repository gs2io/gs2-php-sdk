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
use Gs2\Showcase\Model\SalesItemMaster;

/**
 * 商品マスターを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateSalesItemMasterResult implements IResult {
	/** @var SalesItemMaster 作成した商品マスター */
	private $item;

	/**
	 * 作成した商品マスターを取得
	 *
	 * @return SalesItemMaster|null 商品マスターを新規作成
	 */
	public function getItem(): ?SalesItemMaster {
		return $this->item;
	}

	/**
	 * 作成した商品マスターを設定
	 *
	 * @param SalesItemMaster|null $item 商品マスターを新規作成
	 */
	public function setItem(?SalesItemMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateSalesItemMasterResult {
        $result = new CreateSalesItemMasterResult();
        $result->setItem(isset($data["item"]) ? SalesItemMaster::fromJson($data["item"]) : null);
        return $result;
    }
}