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
 * ルームを作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateRoomResult implements IResult {
	/** @var Room 作成したルーム */
	private $item;

	/**
	 * 作成したルームを取得
	 *
	 * @return Room|null ルームを作成
	 */
	public function getItem(): ?Room {
		return $this->item;
	}

	/**
	 * 作成したルームを設定
	 *
	 * @param Room|null $item ルームを作成
	 */
	public function setItem(?Room $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateRoomResult {
        $result = new CreateRoomResult();
        $result->setItem(isset($data["item"]) ? Room::fromJson($data["item"]) : null);
        return $result;
    }
}