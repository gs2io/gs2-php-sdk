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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\CurrentRateMaster;

/**
 * 現在有効な強化レート設定を更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentRateMasterFromGitHubResult implements IResult {
	/** @var CurrentRateMaster 更新した現在有効な強化レート設定 */
	private $item;

	/**
	 * 更新した現在有効な強化レート設定を取得
	 *
	 * @return CurrentRateMaster|null 現在有効な強化レート設定を更新します
	 */
	public function getItem(): ?CurrentRateMaster {
		return $this->item;
	}

	/**
	 * 更新した現在有効な強化レート設定を設定
	 *
	 * @param CurrentRateMaster|null $item 現在有効な強化レート設定を更新します
	 */
	public function setItem(?CurrentRateMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateCurrentRateMasterFromGitHubResult {
        $result = new UpdateCurrentRateMasterFromGitHubResult();
        $result->setItem(isset($data["item"]) ? CurrentRateMaster::fromJson($data["item"]) : null);
        return $result;
    }
}