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
use Gs2\Schedule\Model\EventMaster;

/**
 * イベントマスターを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteEventMasterResult implements IResult {
	/** @var EventMaster 削除したイベントマスター */
	private $item;

	/**
	 * 削除したイベントマスターを取得
	 *
	 * @return EventMaster|null イベントマスターを削除
	 */
	public function getItem(): ?EventMaster {
		return $this->item;
	}

	/**
	 * 削除したイベントマスターを設定
	 *
	 * @param EventMaster|null $item イベントマスターを削除
	 */
	public function setItem(?EventMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteEventMasterResult {
        $result = new DeleteEventMasterResult();
        $result->setItem(isset($data["item"]) ? EventMaster::fromJson($data["item"]) : null);
        return $result;
    }
}