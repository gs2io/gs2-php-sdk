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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\RateModelMaster;

/**
 * 強化レートマスターを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRateModelMasterResult implements IResult {
	/** @var RateModelMaster 強化レートマスター */
	private $item;

	/**
	 * 強化レートマスターを取得
	 *
	 * @return RateModelMaster|null 強化レートマスターを取得
	 */
	public function getItem(): ?RateModelMaster {
		return $this->item;
	}

	/**
	 * 強化レートマスターを設定
	 *
	 * @param RateModelMaster|null $item 強化レートマスターを取得
	 */
	public function setItem(?RateModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetRateModelMasterResult {
        $result = new GetRateModelMasterResult();
        $result->setItem(isset($data["item"]) ? RateModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}