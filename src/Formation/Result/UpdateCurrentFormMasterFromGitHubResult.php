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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\CurrentFormMaster;

/**
 * 現在有効なフォーム設定を更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentFormMasterFromGitHubResult implements IResult {
	/** @var CurrentFormMaster 更新した現在有効なフォーム設定 */
	private $item;

	/**
	 * 更新した現在有効なフォーム設定を取得
	 *
	 * @return CurrentFormMaster|null 現在有効なフォーム設定を更新します
	 */
	public function getItem(): ?CurrentFormMaster {
		return $this->item;
	}

	/**
	 * 更新した現在有効なフォーム設定を設定
	 *
	 * @param CurrentFormMaster|null $item 現在有効なフォーム設定を更新します
	 */
	public function setItem(?CurrentFormMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateCurrentFormMasterFromGitHubResult {
        $result = new UpdateCurrentFormMasterFromGitHubResult();
        $result->setItem(isset($data["item"]) ? CurrentFormMaster::fromJson($data["item"]) : null);
        return $result;
    }
}