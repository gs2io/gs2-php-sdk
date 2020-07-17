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

namespace Gs2\Quest\Result;

use Gs2\Core\Model\IResult;
use Gs2\Quest\Model\CurrentQuestMaster;

/**
 * 現在有効なクエストマスターのマスターデータをエクスポートします のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ExportMasterResult implements IResult {
	/** @var CurrentQuestMaster 現在有効なクエストマスター */
	private $item;

	/**
	 * 現在有効なクエストマスターを取得
	 *
	 * @return CurrentQuestMaster|null 現在有効なクエストマスターのマスターデータをエクスポートします
	 */
	public function getItem(): ?CurrentQuestMaster {
		return $this->item;
	}

	/**
	 * 現在有効なクエストマスターを設定
	 *
	 * @param CurrentQuestMaster|null $item 現在有効なクエストマスターのマスターデータをエクスポートします
	 */
	public function setItem(?CurrentQuestMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): ExportMasterResult {
        $result = new ExportMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentQuestMaster::fromJson($data["item"]) : null);
        return $result;
    }
}