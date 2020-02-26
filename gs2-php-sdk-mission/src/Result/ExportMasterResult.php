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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\CurrentMissionMaster;

/**
 * 現在有効なミッションのマスターデータをエクスポートします のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ExportMasterResult implements IResult {
	/** @var CurrentMissionMaster 現在有効なミッション */
	private $item;

	/**
	 * 現在有効なミッションを取得
	 *
	 * @return CurrentMissionMaster|null 現在有効なミッションのマスターデータをエクスポートします
	 */
	public function getItem(): ?CurrentMissionMaster {
		return $this->item;
	}

	/**
	 * 現在有効なミッションを設定
	 *
	 * @param CurrentMissionMaster|null $item 現在有効なミッションのマスターデータをエクスポートします
	 */
	public function setItem(?CurrentMissionMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): ExportMasterResult {
        $result = new ExportMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentMissionMaster::fromJson($data["item"]) : null);
        return $result;
    }
}