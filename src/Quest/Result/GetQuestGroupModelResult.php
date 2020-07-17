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
use Gs2\Quest\Model\QuestGroupModel;

/**
 * クエストグループを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetQuestGroupModelResult implements IResult {
	/** @var QuestGroupModel クエストグループ */
	private $item;

	/**
	 * クエストグループを取得
	 *
	 * @return QuestGroupModel|null クエストグループを取得
	 */
	public function getItem(): ?QuestGroupModel {
		return $this->item;
	}

	/**
	 * クエストグループを設定
	 *
	 * @param QuestGroupModel|null $item クエストグループを取得
	 */
	public function setItem(?QuestGroupModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetQuestGroupModelResult {
        $result = new GetQuestGroupModelResult();
        $result->setItem(isset($data["item"]) ? QuestGroupModel::fromJson($data["item"]) : null);
        return $result;
    }
}