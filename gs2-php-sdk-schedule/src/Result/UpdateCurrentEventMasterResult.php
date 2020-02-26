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

namespace Gs2\Schedule\Result;

use Gs2\Core\Model\IResult;
use Gs2\Schedule\Model\CurrentEventMaster;

/**
 * 現在有効なイベントスケジュールマスターを更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentEventMasterResult implements IResult {
	/** @var CurrentEventMaster 更新した現在有効なイベントスケジュールマスター */
	private $item;

	/**
	 * 更新した現在有効なイベントスケジュールマスターを取得
	 *
	 * @return CurrentEventMaster|null 現在有効なイベントスケジュールマスターを更新します
	 */
	public function getItem(): ?CurrentEventMaster {
		return $this->item;
	}

	/**
	 * 更新した現在有効なイベントスケジュールマスターを設定
	 *
	 * @param CurrentEventMaster|null $item 現在有効なイベントスケジュールマスターを更新します
	 */
	public function setItem(?CurrentEventMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateCurrentEventMasterResult {
        $result = new UpdateCurrentEventMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentEventMaster::fromJson($data["item"]) : null);
        return $result;
    }
}