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

namespace Gs2\Dictionary\Result;

use Gs2\Core\Model\IResult;
use Gs2\Dictionary\Model\CurrentEntryMaster;

/**
 * 現在有効なエントリー設定を更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentEntryMasterResult implements IResult {
	/** @var CurrentEntryMaster 更新した現在有効なエントリー設定 */
	private $item;

	/**
	 * 更新した現在有効なエントリー設定を取得
	 *
	 * @return CurrentEntryMaster|null 現在有効なエントリー設定を更新します
	 */
	public function getItem(): ?CurrentEntryMaster {
		return $this->item;
	}

	/**
	 * 更新した現在有効なエントリー設定を設定
	 *
	 * @param CurrentEntryMaster|null $item 現在有効なエントリー設定を更新します
	 */
	public function setItem(?CurrentEntryMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateCurrentEntryMasterResult {
        $result = new UpdateCurrentEntryMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentEntryMaster::fromJson($data["item"]) : null);
        return $result;
    }
}