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

namespace Gs2\Chat\Result;

use Gs2\Core\Model\IResult;
use Gs2\Chat\Model\Room;

/**
 * ルームを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteRoomFromBackendResult implements IResult {
	/** @var Room 削除したルーム */
	private $item;

	/**
	 * 削除したルームを取得
	 *
	 * @return Room|null ルームを削除
	 */
	public function getItem(): ?Room {
		return $this->item;
	}

	/**
	 * 削除したルームを設定
	 *
	 * @param Room|null $item ルームを削除
	 */
	public function setItem(?Room $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteRoomFromBackendResult {
        $result = new DeleteRoomFromBackendResult();
        $result->setItem(isset($data["item"]) ? Room::fromJson($data["item"]) : null);
        return $result;
    }
}