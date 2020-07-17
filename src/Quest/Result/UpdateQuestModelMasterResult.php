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
use Gs2\Quest\Model\QuestModelMaster;

/**
 * クエストモデルマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateQuestModelMasterResult implements IResult {
	/** @var QuestModelMaster 更新したクエストモデルマスター */
	private $item;

	/**
	 * 更新したクエストモデルマスターを取得
	 *
	 * @return QuestModelMaster|null クエストモデルマスターを更新
	 */
	public function getItem(): ?QuestModelMaster {
		return $this->item;
	}

	/**
	 * 更新したクエストモデルマスターを設定
	 *
	 * @param QuestModelMaster|null $item クエストモデルマスターを更新
	 */
	public function setItem(?QuestModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateQuestModelMasterResult {
        $result = new UpdateQuestModelMasterResult();
        $result->setItem(isset($data["item"]) ? QuestModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}