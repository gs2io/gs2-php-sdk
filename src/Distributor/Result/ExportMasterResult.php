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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;
use Gs2\Distributor\Model\CurrentDistributorMaster;

/**
 * 現在有効な配信設定のマスターデータをエクスポートします のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ExportMasterResult implements IResult {
	/** @var CurrentDistributorMaster 現在有効な配信設定 */
	private $item;

	/**
	 * 現在有効な配信設定を取得
	 *
	 * @return CurrentDistributorMaster|null 現在有効な配信設定のマスターデータをエクスポートします
	 */
	public function getItem(): ?CurrentDistributorMaster {
		return $this->item;
	}

	/**
	 * 現在有効な配信設定を設定
	 *
	 * @param CurrentDistributorMaster|null $item 現在有効な配信設定のマスターデータをエクスポートします
	 */
	public function setItem(?CurrentDistributorMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): ExportMasterResult {
        $result = new ExportMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentDistributorMaster::fromJson($data["item"]) : null);
        return $result;
    }
}