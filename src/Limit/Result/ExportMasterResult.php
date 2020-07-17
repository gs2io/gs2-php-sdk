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
use Gs2\Limit\Model\CurrentLimitMaster;

/**
 * 現在有効な回数制限設定のマスターデータをエクスポートします のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ExportMasterResult implements IResult {
	/** @var CurrentLimitMaster 現在有効な回数制限設定 */
	private $item;

	/**
	 * 現在有効な回数制限設定を取得
	 *
	 * @return CurrentLimitMaster|null 現在有効な回数制限設定のマスターデータをエクスポートします
	 */
	public function getItem(): ?CurrentLimitMaster {
		return $this->item;
	}

	/**
	 * 現在有効な回数制限設定を設定
	 *
	 * @param CurrentLimitMaster|null $item 現在有効な回数制限設定のマスターデータをエクスポートします
	 */
	public function setItem(?CurrentLimitMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): ExportMasterResult {
        $result = new ExportMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentLimitMaster::fromJson($data["item"]) : null);
        return $result;
    }
}