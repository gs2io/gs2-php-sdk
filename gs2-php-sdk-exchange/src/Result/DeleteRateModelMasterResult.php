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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\RateModelMaster;

/**
 * 交換レートマスターを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteRateModelMasterResult implements IResult {
	/** @var RateModelMaster 削除した交換レートマスター */
	private $item;

	/**
	 * 削除した交換レートマスターを取得
	 *
	 * @return RateModelMaster|null 交換レートマスターを削除
	 */
	public function getItem(): ?RateModelMaster {
		return $this->item;
	}

	/**
	 * 削除した交換レートマスターを設定
	 *
	 * @param RateModelMaster|null $item 交換レートマスターを削除
	 */
	public function setItem(?RateModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteRateModelMasterResult {
        $result = new DeleteRateModelMasterResult();
        $result->setItem(isset($data["item"]) ? RateModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}