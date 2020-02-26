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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\MissionTaskModel;

/**
 * ミッションタスクの一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeMissionTaskModelsResult implements IResult {
	/** @var MissionTaskModel[] ミッションタスクのリスト */
	private $items;

	/**
	 * ミッションタスクのリストを取得
	 *
	 * @return MissionTaskModel[]|null ミッションタスクの一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * ミッションタスクのリストを設定
	 *
	 * @param MissionTaskModel[]|null $items ミッションタスクの一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): DescribeMissionTaskModelsResult {
        $result = new DescribeMissionTaskModelsResult();
        $result->setItems(array_map(
                function ($v) {
                    return MissionTaskModel::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}