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
 * 経験値・ランクアップ閾値モデルを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetExperienceModelResult implements IResult {
	/** @var ExperienceModel 経験値・ランクアップ閾値モデル */
	private $item;

	/**
	 * 経験値・ランクアップ閾値モデルを取得
	 *
	 * @return ExperienceModel|null 経験値・ランクアップ閾値モデルを取得
	 */
	public function getItem(): ?ExperienceModel {
		return $this->item;
	}

	/**
	 * 経験値・ランクアップ閾値モデルを設定
	 *
	 * @param ExperienceModel|null $item 経験値・ランクアップ閾値モデルを取得
	 */
	public function setItem(?ExperienceModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetExperienceModelResult {
        $result = new GetExperienceModelResult();
        $result->setItem(isset($data["item"]) ? ExperienceModel::fromJson($data["item"]) : null);
        return $result;
    }
}