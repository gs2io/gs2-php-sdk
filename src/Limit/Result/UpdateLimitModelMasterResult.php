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

namespace Gs2\Limit\Result;

use Gs2\Core\Model\IResult;
use Gs2\Limit\Model\LimitModelMaster;

/**
 * 回数制限の種類マスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateLimitModelMasterResult implements IResult {
	/** @var LimitModelMaster 更新した回数制限の種類マスター */
	private $item;

	/**
	 * 更新した回数制限の種類マスターを取得
	 *
	 * @return LimitModelMaster|null 回数制限の種類マスターを更新
	 */
	public function getItem(): ?LimitModelMaster {
		return $this->item;
	}

	/**
	 * 更新した回数制限の種類マスターを設定
	 *
	 * @param LimitModelMaster|null $item 回数制限の種類マスターを更新
	 */
	public function setItem(?LimitModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateLimitModelMasterResult {
        $result = new UpdateLimitModelMasterResult();
        $result->setItem(isset($data["item"]) ? LimitModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}