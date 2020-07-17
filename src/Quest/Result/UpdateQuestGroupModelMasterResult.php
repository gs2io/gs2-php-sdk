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
use Gs2\Quest\Model\QuestGroupModelMaster;

/**
 * クエストグループマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateQuestGroupModelMasterResult implements IResult {
	/** @var QuestGroupModelMaster 更新したクエストグループマスター */
	private $item;

	/**
	 * 更新したクエストグループマスターを取得
	 *
	 * @return QuestGroupModelMaster|null クエストグループマスターを更新
	 */
	public function getItem(): ?QuestGroupModelMaster {
		return $this->item;
	}

	/**
	 * 更新したクエストグループマスターを設定
	 *
	 * @param QuestGroupModelMaster|null $item クエストグループマスターを更新
	 */
	public function setItem(?QuestGroupModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateQuestGroupModelMasterResult {
        $result = new UpdateQuestGroupModelMasterResult();
        $result->setItem(isset($data["item"]) ? QuestGroupModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}