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

namespace Gs2\Experience\Result;

use Gs2\Core\Model\IResult;
use Gs2\Experience\Model\ExperienceModel;

/**
 * 経験値・ランクアップ閾値モデルの一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeExperienceModelsResult implements IResult {
	/** @var ExperienceModel[] 経験値・ランクアップ閾値モデルのリスト */
	private $items;

	/**
	 * 経験値・ランクアップ閾値モデルのリストを取得
	 *
	 * @return ExperienceModel[]|null 経験値・ランクアップ閾値モデルの一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 経験値・ランクアップ閾値モデルのリストを設定
	 *
	 * @param ExperienceModel[]|null $items 経験値・ランクアップ閾値モデルの一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): DescribeExperienceModelsResult {
        $result = new DescribeExperienceModelsResult();
        $result->setItems(array_map(
                function ($v) {
                    return ExperienceModel::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}