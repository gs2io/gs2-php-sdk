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

namespace Gs2\Experience\Result;

use Gs2\Core\Model\IResult;
use Gs2\Experience\Model\ThresholdMaster;

/**
 * ランクアップ閾値マスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateThresholdMasterResult implements IResult {
	/** @var ThresholdMaster 更新したランクアップ閾値マスター */
	private $item;

	/**
	 * 更新したランクアップ閾値マスターを取得
	 *
	 * @return ThresholdMaster|null ランクアップ閾値マスターを更新
	 */
	public function getItem(): ?ThresholdMaster {
		return $this->item;
	}

	/**
	 * 更新したランクアップ閾値マスターを設定
	 *
	 * @param ThresholdMaster|null $item ランクアップ閾値マスターを更新
	 */
	public function setItem(?ThresholdMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateThresholdMasterResult {
        $result = new UpdateThresholdMasterResult();
        $result->setItem(isset($data["item"]) ? ThresholdMaster::fromJson($data["item"]) : null);
        return $result;
    }
}