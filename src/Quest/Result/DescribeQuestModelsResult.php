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
use Gs2\Quest\Model\QuestModel;

/**
 * クエストモデルの一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeQuestModelsResult implements IResult {
	/** @var QuestModel[] Noneのリスト */
	private $items;

	/**
	 * Noneのリストを取得
	 *
	 * @return QuestModel[]|null クエストモデルの一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * Noneのリストを設定
	 *
	 * @param QuestModel[]|null $items クエストモデルの一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): DescribeQuestModelsResult {
        $result = new DescribeQuestModelsResult();
        $result->setItems(array_map(
                function ($v) {
                    return QuestModel::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}