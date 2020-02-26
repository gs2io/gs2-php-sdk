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
use Gs2\Experience\Model\ExperienceModelMaster;

/**
 * 経験値の種類マスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateExperienceModelMasterResult implements IResult {
	/** @var ExperienceModelMaster 更新した経験値の種類マスター */
	private $item;

	/**
	 * 更新した経験値の種類マスターを取得
	 *
	 * @return ExperienceModelMaster|null 経験値の種類マスターを更新
	 */
	public function getItem(): ?ExperienceModelMaster {
		return $this->item;
	}

	/**
	 * 更新した経験値の種類マスターを設定
	 *
	 * @param ExperienceModelMaster|null $item 経験値の種類マスターを更新
	 */
	public function setItem(?ExperienceModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateExperienceModelMasterResult {
        $result = new UpdateExperienceModelMasterResult();
        $result->setItem(isset($data["item"]) ? ExperienceModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}